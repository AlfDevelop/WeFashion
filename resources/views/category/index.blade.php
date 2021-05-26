@extends('layouts.app')
@section('content')

<h2 style="padding:5px 20px;border:1px solid gray;border-radius:5px;background:#FFF;">Liste des catégories</h2>

<table width=100%>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr style="border:1px solid red;">
                <td width=5% align="center" style="padding:5px;border-right:1px solid blue;">{{$category->id}}</td>
                <td width=15% style="padding:5px;border-right:1px solid blue;">{{$category->title}}</td>
                <td width=30% style="padding:5px;">{{$category->description}}</td>
                <td width=5%><a href="/home/categories/{{$category->id}}">Afficher</a></td>
                <td width=5%><a href="/home/categories/{{$category->id}}/edit">Editer</a></td>
            </tr>
       
        @endforeach
    </tbody>
</table>
   
@stop