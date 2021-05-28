@extends('layouts.app')

@section('content')

   <p>{{$product->name}}</p>
   
   <p>{{$product->category['title']}}</p>
@stop