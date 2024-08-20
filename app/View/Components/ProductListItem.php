<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductListItem extends Component
{
    public $product;
    public $key;
    public $hideRating;

    public function __construct($product, $key, $hideRating = false)
    {
        $this->product = $product;
        $this->key = $key;
        $this->hideRating = $hideRating;
    }

    public function render()
    {
        return view('components.product-list-item');
    }
}
