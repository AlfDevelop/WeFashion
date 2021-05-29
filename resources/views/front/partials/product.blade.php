@extends('front.layouts.app')
@section('content')
   
    <section class="product row">
        <article class="col-md-5 col-sm-12 col-xs-12">
            <img src="{{  asset('storage/images/'.$product->image) }}" alt="">
            @if($product->status == 'sale')
                <div class="ribbon ribbon-top-left"><span>Promotions</span></div>
            @endif
        </article>
        <article class="col-md-7 col-sm-12 col-xs-12">
            <h1 class="product-name mt-0">{{$product->name}}<span class="product-reference">&nbsp;(Réf : {{$product->reference}})</span></h1>
            
            <hr class="product-hr">
            <section class="product-box-info">
                <p class="product-price text-center">{{$product->price}} €</p>
                <form>
                    <div class="form-group">
                        <label class="text-center d-block w-100" for="size">Choisissez une taille !</label>
                        <select class="form-control w-50 m-auto" id="size">
                            @foreach($sizes as $size)
                                <option value="{{$size}}">{{$size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="add-to-cart d-block m-auto"><i class="fas fa-shopping-cart"></i><span>Ajouter au panier</span></button>
                </form>
            </section>
        </article>
    </section>
    <hr class="product-hr">
    <section class="product-page-description row">
        <article class="col-md-12">
            <h2 class="text-center">Description</h2>
            <p class="text-center">{{$product->description}}</p>
        </article>
    </section>
@stop