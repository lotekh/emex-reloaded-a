<div class="{{ $class }} cursor-pointer">
    <img
        @if(isset($width)) width="{{ $width }}" @endif
        @if(isset($height)) height="{{ $height }}" @endif
        @if(isset($alt)) alt="{{ $alt }}" @endif
        @if(isset($title)) title="{{ $title }}" @endif
        src="{{ $url }}"
        onclick="document.getElementById('{{ $id }}').style.display='block'"
    />
</div>

<div id="{{ $id }}" class="lightbox" style="display:none;">
    <div class="lightbox-content">
        <span class="close" onclick="document.getElementById('{{ $id }}').style.display='none'">&times;</span>
        <img
            @if(isset($lightboxWidth)) width="{{ $lightboxWidth }}" @endif
            @if(isset($lightboxHeight)) height="{{ $lightboxHeight }}" @endif
            @if(isset($alt)) alt="{{ $alt }}" @endif
            @if(isset($title)) title="{{ $title }}" @endif
            src="{{ $lightboxSrc }}"
        />
    </div>
</div>


