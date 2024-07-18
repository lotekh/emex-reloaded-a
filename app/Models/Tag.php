<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(BlogArticle::class);
    }

    public static function form(): array
    {
        return [
                TextInput::make('name')
                    ->columnSpanFull()
                    ->label('Name')
                    ->required()
                    ->unique('tags', 'name')
                    ->placeholder('Enter the name of the tag'),
            ];
    }
}
