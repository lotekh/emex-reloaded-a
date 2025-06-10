<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use App\Models\Review;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

    protected function handleRecordCreation(array $data): Review
    {
        for($i = 0; $i < $data['count']; $i++) {
            $review = Review::create([
                'product_id' => $data['product_id'],
                'rating' => $data['rating'],
                'review' => $data['review'],
                'approved' => $data['approved'],
                'user_id' => $data['user_id'],
            ]);
        }

        return $review;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('create');
    }

}
