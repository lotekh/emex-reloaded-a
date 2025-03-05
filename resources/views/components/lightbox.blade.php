@if(isset($text))
    <span class="text-center blue cursor-pointer"
        onclick="openLightbox(this)"
        data-lightbox-src="{{ $lightboxSrc }}"
        data-lightbox-alt="{{ $alt ?? '' }}"
        data-lightbox-title="{{ $title ?? '' }}"
        data-lightbox-type="{{ pathinfo($lightboxSrc, PATHINFO_EXTENSION) }}">{{ $text }}</span>
@else
    <div class="cursor-pointer">
        @php $fileExtension = pathinfo($lightboxSrc, PATHINFO_EXTENSION); @endphp

        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
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
                data-lightbox-type="image"
                onclick="openLightbox(this)" />
        @elseif($fileExtension == 'mp4')
            <a href="#" class="cursor-pointer"
                onclick="openLightbox(this)"
                data-lightbox-src="{{ $lightboxSrc }}"
                data-lightbox-title="{{ $title ?? '' }}"
                data-lightbox-type="video">
                ▶ Video
            </a>
        @endif
    </div>
@endif

<div id="lightbox-container" style="display:none;">
    <div class="lightbox_container" role="button" tabindex="0" onclick="document.getElementById('lightbox-container').style.display='none'">
        <div class="content-container">
            <div id="lightbox-content"></div>
            <div class="close-button" style="background-image: url('{{ asset('resources/images/sprite.png') }}');" role="button" tabindex="0" onclick="document.getElementById('lightbox-container').style.display='none'"></div>
        </div>
    </div>
</div>
