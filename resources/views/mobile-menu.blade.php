@php
    use App\Models\Order;
@endphp

<div class="w-full mobile-header">
    <div class="main-container row justify-between align-center gap-md">
        <button role="menu" title="open-menu" aria-label="Meniu" onclick="toggleSidebar()">
            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0.65" y1="1.35" x2="15.35" y2="1.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
                <line x1="0.65" y1="7.35" x2="11.35" y2="7.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
                <line x1="0.65" y1="13.35" x2="15.35" y2="13.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
            </svg>
        </button>
        <a href="{{ url('/') }}" title="Pagina principala" class="mobile-logo">
            <img src="{{ asset('resources/new_design/general/logo.png') }}" height="47.22" width="144" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim" class="logo">
        </a>

        <div class="row gap-lg w-full justify-end">
            <button id="open-search" title="open-search" role="button" class="cursor-pointer" onclick="toggleSearchLightbox()" aria-label="Cauta">
                <img src="{{ asset('resources/new_design/icons/search.svg') }}" width="16" height="16" alt="search-icon">
            </button>
            <a href="{{ url('/wishlist') }}" class="relative nav-icon" title="Favorite">
                <div class="flex align-center">
                    <img width="20" height="20" src="{{ asset('resources/new_design/icons/star.svg') }}" title="review-star" alt="review-star">
                </div>
                <div class="circle">
                    <span>
                        @php
                            $wishlist_products_count = Auth::check() ? App\Models\WishlistItem::where('user_id', Auth::id())->count() : 0;
                        @endphp
                        {{ app('App\Http\Controllers\WishlistController')->getWishlistCount() }}
                    </span>
                </div>
            </a>
            <a href="{{ url('/produse-adaugate') }}" class="relative nav-icon" title="Cos">
                <div class="flex align-center">
                    <img width="20" height="20" src="{{ asset('resources/new_design/icons/cart.svg') }}" alt="cart-icon">
                </div>
                <div class="circle">
                    <span>
                        @php
                            use App\Http\Controllers\OrdersController;
                            $preorder_count = (new OrdersController())->getCartProductVariationCount();
                        @endphp
                        {{ $preorder_count }}
                    </span>
                </div>
            </a>
        </div>

        <div id="search-lightbox" class="search-lightbox" style="display: none;">
            <form class="relative col justify-center align-center w-full h-full gap-xs" method="GET" action="{{ url('/search') }}">
                @csrfWithoutAutocomplete
                <div class="row w-full align-center">
                    <img src="{{ asset('resources/new_design/icons/search.svg') }}" id="search-icon" width="16" height="16">
                    <input id="search-input-mobile" type="text" name="zoom_query" class="form-control w-full" placeholder="Cauta dupa nume produs sau cod SKU">
                </div>
                <div class="btns">
                    <div role="button" onclick="toggleSearchLightbox()" tabindex="0">Anuleaza</div>
                    <input type="submit" role="button" value="Cauta">
                </div>
            </form>
        </div>
    </div>
</div>
