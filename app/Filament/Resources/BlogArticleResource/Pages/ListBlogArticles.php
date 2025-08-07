<?php

namespace App\Filament\Resources\BlogArticleResource\Pages;

use App\Filament\Resources\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $orderColumn = 'sort_order';

        DB::transaction(function () use ($order, $orderColumn) {
            DB::table('blog_articles')
                ->whereIn('id', array_keys($order))
                ->update([$orderColumn => null]); 

            foreach ($order as $recordId => $sortOrder) {
                DB::table('blog_articles')
                    ->where('id', $recordId)
                    ->update([
                        $orderColumn => $sortOrder,
                    ]);
            }
        });
    }
}
