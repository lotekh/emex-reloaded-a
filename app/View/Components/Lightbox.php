<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Lightbox extends Component
{
    public $id;
    public $url;
    public $class;
    public $alt;
    public $title;
    public $width;
    public $height;
    public $layout;
    public $lightboxSrc;
    public $lightboxWidth;
    public $lightboxHeight;
    public $text;

    public function __construct($id, $url, $class = '', $alt = '', $title = '', $width = '600', $height = '450', $layout = '', $lightboxSrc = null, $lightboxWidth = null, $lightboxHeight = null, $text = null)
    {
        $this->id = $id;
        $this->url = $url;
        $this->class = $class;
        $this->alt = $alt;
        $this->title = $title;
        $this->width = $width;
        $this->height = $height;
        $this->layout = $layout;
        $this->lightboxSrc = $lightboxSrc ?? $url;
        $this->lightboxWidth = $lightboxWidth ?? $width;
        $this->lightboxHeight = $lightboxHeight ?? $height;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.lightbox');
    }
}
