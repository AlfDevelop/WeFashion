@extends('layouts.app')

@section('content')
<section class="admin-header">
    <h2>Modifier {{$product->name}}</h2>
</section>

    <div class="admin-form container">
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
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
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
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
                {!! Form::label('image', "Image") !!}
                {!! Form::text('image', $product->image, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', "Categorie :") !!}
                <select name="category_id" class="form-control">
                    <option value="0"></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            {!! Form::submit('Modifier',  ['class' => 'edit-btn']) !!}
        {!! Form::close() !!}
    </div>
@stop