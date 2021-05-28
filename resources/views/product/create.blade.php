@extends('layouts.app')

@section('content')
<section class="admin-header">
    <h2>Ajouter un produit</h2>
</section>

    <div class="admin-form container">
        {!! Form::open(['url' => '/home/products']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom du produit") !!}
                {!! Form::text('name', "", ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', "Description") !!}
                {!! Form::text('description', "", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reference', "Référence") !!}
                {!! Form::text('reference', "", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', "Prix") !!}
                <input type="number" name="price" step="any" class="form-control"/>
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
                {!! Form::text('image', "", ['class' => 'form-control']) !!}
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

            {!! Form::submit('Ajouter',  ['class' => 'create-btn']) !!}
        {!! Form::close() !!}
    </div>
@stop