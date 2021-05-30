@extends('admin.layouts.app')

@section('content')
    <section class="admin-header">
        <h2>Ajouter une catégorie</h2>
    </section>

    <div class="admin-form container" >
        {!! Form::open(['url' => '/home/categories']) !!}
            <div class="form-group">
                {!! Form::label('title', "Nom de la catégorie") !!}
                {!! Form::text('title', "", ['class' => 'form-control']) !!}
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
                {!! Form::text('description', "", ['class' => 'form-control']) !!}
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
           
            {!! Form::submit('Ajouter', ['class' => 'create-btn']) !!}
        {!! Form::close() !!}
    </div>
@stop