<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use App\Models\Review;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

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
}
