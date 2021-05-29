@extends('front.layouts.app')

@section('content')
<h1>Derniers produits</h1>
<section class="product row">
    @foreach($products as $product)
        <article>
            <a href="/product/{{$product->id}}">
                <img style="max-width:100%;max-height:100%;" src="{{asset('storage/images/'.$product->image) }}" alt="">
            </a>
            <div class="product-description" style="background:#F5F8FA;position:absolute;bottom:0;width:250px;height:70px;">
                <h2 class=" mt-3 mb-1 text-center" style="font-size:14px;">{{$product->name}}</h2>
                <p style="font-size:16px;font-weight:bold;" class=" mt-3 text-center">{{$product->price}} €</p>
            </div>
        </article>
    @endforeach
</section>
@stop
