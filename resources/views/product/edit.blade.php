@extends('layouts.app')

@section('content')
<section class="admin-header">
    <h2>Modifier {{$product->name}}</h2>
</section>

    <div class="admin-form container">
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom du produit") !!}
                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', "Description") !!}
                {!! Form::text('description', $product->description, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reference', "Référence") !!}
                {!! Form::text('reference', $product->reference, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', "Prix") !!}
                {!! Form::number('price', $product->price, ['class' => 'form-control', 'step' => 'any'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('active', "Actif") !!}
                <select name="active" class="form-control">
                    <option value="1">Oui</option>
                    <option value="0" @if($active != 1) selected @endif>Non</option>
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('status', "Etat") !!}
                <select name="status" class="form-control">
                    <option value="new">Nouveau</option>
                    <option value="used">Occasion</option>
                    <option value="sale">Promotion</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block;">Tailles disponibles pour ce produit</label>

                <div class="form-check form-switch">
                    {!! Form::checkbox('size[]', 'XS', in_array('XS', $array) ? true : false) !!}
                    {!! Form::label('size', "XS") !!}
                </div>
                
                <div class="form-check">
                    {!! Form::checkbox('size[]', 'S', in_array('S', $array) ? true : false) !!}
                    {!! Form::label('size', "S") !!}
                </div>

                <div class="form-check">
                    {!! Form::checkbox('size[]', 'M', in_array('M', $array) ? true : false) !!}
                    {!! Form::label('size', "M") !!}
                </div>

                <div class="form-check">
                    {!! Form::checkbox('size[]', 'L' , in_array('L', $array) ? true : false) !!}
                    {!! Form::label('size', "L") !!}
                </div>

                <div class="form-check">
                    {!! Form::checkbox('size[]', 'XL' , in_array('XL', $array) ? true : false) !!}
                    {!! Form::label('size', "XL") !!}
                </div>

                
            </div>
            <img style="width:250px;" src="{{asset('storage/images/'.$product->image) }}" alt="">
            @if(empty($product->image))
            <div class="form-group">
                {!! Form::label('image', "Image") !!}
                {!! Form::file('image',  ['class' => 'form-control']) !!}
            </div>
            @endif
           
            <div class="form-group">
                {!! Form::label('category_id', "Categorie :") !!}
                <select name="category_id" class="form-control">
                    <option value="0"></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category_id == $category->id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            {!! Form::submit('Modifier',  ['class' => 'edit-btn']) !!}
        {!! Form::close() !!}
    </div>
@stop