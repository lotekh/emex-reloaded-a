<?php

namespace App\Filament\Resources\BlogArticleResource\Pages;

use App\Filament\Resources\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ListBlogArticles extends ListRecords
{
    protected static string $resource = BlogArticleResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function reorderTable(array $order): void
    {
        if (! $this->getTable()->isReorderable()) {
            return;
        }

        $orderColumn = (string) str($this->getTable()->getReorderColumn())->afterLast('.');

        \App\Models\BlogArticle::withoutTimestamps(function () use ($order, $orderColumn) {
            DB::transaction(function () use ($order, $orderColumn) {
                if (
                    (($relationship = $this->getTable()->getRelationship()) instanceof BelongsToMany) &&
                    in_array($orderColumn, $relationship->getPivotColumns())
                ) {
                    foreach ($order as $index => $recordKey) {
                        $this->getTableRecord($recordKey)->{$relationship->getPivotAccessor()}->update([
                            $orderColumn => $index + 1,
                        ]);
                    }

                    return;
                }

                $model = app($this->getTable()->getModel());
                $modelKeyName = $model->getKeyName();

                $model
                    ->newModelQuery()
                    ->whereIn($modelKeyName, array_values($order))
                    ->update([
                        $orderColumn => DB::raw(
                            'case ' . collect($order)
                                ->map(fn ($recordKey, int $recordIndex): string => 'when ' . $modelKeyName . ' = ' . DB::getPdo()->quote($recordKey) . ' then ' . ($recordIndex + 1))
                                ->implode(' ') . ' end'
                        ),
                    ]);
            });
        });
    }


}
