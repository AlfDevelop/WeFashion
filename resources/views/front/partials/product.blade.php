@extends('front.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="https://via.placeholder.com/450" alt="">
    </div>
    <div class="col-md-6">
        <h1 class="mt-0">{{$product->name}}<span>&nbsp;({{$product->reference}})</span></h1>
        <p>{{$product->price}} €</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2>Description</h2>
        <p>{{$product->description}}</p>
    </div>
</div>
@stop