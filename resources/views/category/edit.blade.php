@extends('layouts.app')

@section('content')
<section class="admin-header">
    <h2>Modifier {{$category->title}}</h2>
</section>

    <div class="admin-form container">
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('title', "Nom de la catégorie") !!}
                {!! Form::text('title', $category->title, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('active', "Actif") !!}
                <select name="active" class="form-control">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('description', "Description") !!}
                {!! Form::text('description', $category->description, ['class' => 'form-control']) !!}
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

            {!! Form::submit('Modifier', ['class' => 'edit-btn']) !!}
        {!! Form::close() !!}
    </div>
@stop