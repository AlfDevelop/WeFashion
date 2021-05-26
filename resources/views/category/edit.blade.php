@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        {!! Form::open(['url' => '/home/categories']) !!}
            <div class="form-group">
                {!! Form::label('title', "Nom de la catégorie") !!}
                {!! Form::text('title', $category->title, ['class' => 'form-control']) !!}
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

            {!! Form::submit('update') !!}
        {!! Form::close() !!}
    </div>
@stop