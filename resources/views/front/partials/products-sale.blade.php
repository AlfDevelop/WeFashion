@extends('front.layouts.app')

@section('content')
<h1>Derniers produits</h1>
<section class="row" style="display:flex;justify-content:flex-start;flex-wrap:wrap;">
    @foreach($products as $product)
        <article style="width:250px;margin:0 10px;box-shadow:2px 2px 8px 0 rgb(0 0 0 / 20%);position:relative;height:320px;">
            <a href="/product/{{$product->id}}">
                <img style="position:absolute;top:0;left:0;" src="https://via.placeholder.com/250" alt="">
            </a>
            <div class="product-description" style="position:absolute;bottom:0;width:250px;height:70px;">
                <h2 class=" mt-3 mb-1 text-center" style="font-size:14px;">{{$product->name}}</h2>
                <p style="font-size:16px;font-weight:bold;" class=" mt-3 text-center">{{$product->price}} €</p>
            </div>
        </article>
    @endforeach
</section>
@stop
