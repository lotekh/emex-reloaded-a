@if(isset($text))
<span class="text-center blue cursor-pointer"
    onclick="openImageLightbox(this)"
    data-lightbox-src="{{ $lightboxSrc }}"
    data-lightbox-alt="{{ $alt ?? '' }}"
    data-lightbox-title="{{ $title ?? '' }}">{{ $text }}</span>
@else
<div class="cursor-pointer">
    <img
        class="{{ $class }}"
        @if(isset($width)) width="{{ $width }}" @endif
        @if(isset($height)) height="{{ $height }}" @endif
        @if(isset($alt)) alt="{{ $alt }}" @endif
        @if(isset($title)) title="{{ $title }}" @endif
        src="{{ $url }}"
        data-lightbox-src="{{ $lightboxSrc }}"
        data-lightbox-alt="{{ $alt ?? '' }}"
        data-lightbox-title="{{ $title ?? '' }}"
        onclick="openImageLightbox(this)" />
</div>
@endif


<div id="{{ $id }}" style="display:none;">
    <div class="ligthbox_container" role="button" tabindex="0" onclick="document.getElementById('{{ $id }}').style.display='none'">
        <div class="content-container">
            <img
                class="image"
                @if(isset($lightboxWidth)) width="{{ $lightboxWidth }}" @endif
                @if(isset($lightboxHeight)) height="{{ $lightboxHeight }}" @endif
                @if(isset($alt)) alt="{{ $alt }}" @endif
                @if(isset($title)) title="{{ $title }}" @endif
                src="{{ $lightboxSrc }}" />
            <div class="close-button" style="background-image: url('{{ asset('resources/images/sprite.png') }}');" role="button" tabindex="0" onclick="document.getElementById('{{ $id }}').style.display='none'"></div>
        </div>
    </div>
</div>