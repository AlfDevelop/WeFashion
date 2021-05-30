@extends('front.layouts.app')

@section('content')

<h1 class="main-title text-center">Tous nos produits</h1>

<section class="d-flex justify-content-between">
    <article>
        {{$products->links()}}
    </article>
    <article class="count-products">
        <p>{{$countProducts}} produits</p>
    </article>
</section>
<section class="product-list row">
    @foreach($products as $product)
        <article>
           
            <a href="/product/{{$product->id}}">
                @if($product->status == 'sale')
                <div class="ribbon ribbon-top-left"><span>Promotions</span></div>
                @endif
                <img src="{{asset('storage/images/'.$product->image) }}" alt="">
           
                <div class="product-description">
                    <h2 class="product-name mt-3 mb-1 text-center">{{$product->name}}</h2>
                    <p class="description text-center mb-0">{{substr($product->description, 0, 75) . '...'}}</p>
                    <p class="product-price  mt-2 text-center">{{$product->price}} €</p>
                </div>
            </a>
        </article>
    @endforeach
    {{$products->links()}}
</section>
@stop
