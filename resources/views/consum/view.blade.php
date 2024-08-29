@extends('layouts.app')

@section('content')
<div class="main-container" id="consum-page">
    <div class="w-full flex justify-center mb-8">
        <h2 class="text-center dark-blue">CALCULATOR CONSUM {{ $product->name }}</h2>
    </div>

    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
    <input type="hidden" name="suprafata_type_name" id="suprafata_type_name" value="{{ $product->consumption_json['suprafata_type_name'] ?? '' }}">
    <input type="hidden" name="suprafata_name" id="suprafata_name" value="{{ $product->consumption_json['suprafata_name'] ?? '' }}">

    <div class="grid grid-3 consum-container">
        <!-- Image Section -->
        <div>
            <div class="consum-product-image mb-16">
                <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->getImageAlt('featured') }}" title="{{ $product->getImageTitle('featured') }}" class="product-img img-responsive bordered m-16">
            </div>

            <!-- Additional Badges -->
            <div class="w-full" id="pwgw">
                <!-- Your badges content here -->
                <div class="badge">
                    <img src="{{ asset('resources/images/Fabricat-in-Romania.png') }}" alt="Produs fabricat in Romania" title="Produs de fabricatie romaneasca" />
                </div>
                <!-- More badges as needed -->
            </div>

            <!-- Disclaimer -->
            <div class="hidden-xs mt-16 grey text-center bbdo btdo p-8 font-sm">
                Imaginile prezentate pe site au doar caracter orientativ si nu atrag nici o obligativitate.
                Acestea pot fi modificate in functie de legislatie, sau necesitatea imbunatatirii designului.
            </div>
        </div>

        <!-- Steps Section -->
        <div>
            <input type="hidden" id="base_url" value="{{ url('/') }}">
            <div class="steps_content">
                <form action="#" id="consum_form">
                    <input type="hidden" name="calculate" value="1">
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                    <!-- Step 1: Tip Produs -->
                    <div class="consum_content_step consum_content_step_active">
                        <div class="consum_form_group">
                            <label for='product_select' id="step1_title">Tip Produs*</label>
                            <select class="form-control mb-16" id="product_select">
                                @foreach ($productCategories as $productCategory)
                                    @if ($productCategory->product->consum_link)
                                        <option value="{{ route('consum.show', $productCategory->product->slug) }}" {{ $productCategory->product->id == $product->id ? 'selected' : '' }}>
                                            {{ $productCategory->product->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="consum_wizard_next_div">
                            <button type="button" class="btn btn-blue rounded-sm mb-16">INAINTE
                                <img src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                            </button>
                        </div>
                    </div>

                    <!-- Other Steps as needed -->
                    <!-- Step 2, Step 3 etc. -->

                </form>
            </div>

            <!-- Result Section -->
            <div id="cr">
                @if(!empty($result))
                    {!! $result !!}
                @endif
                <!-- Additional Content -->
            </div>
        </div>

        <!-- Footer Section -->
        <div class="text-center pad">Calculul este informativ si se refera la consumuri obtinute in conditii experimentale. Pregatirea suportului influenteaza semnificativ aceste consumuri. Nu sunt luate in considerare eventuale pierderi tehnologice sau accidentale, din timpul aplicarii.</div>
    </div>
</div>
@endsection
