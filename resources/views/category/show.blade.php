@extends('layouts.app')

@section('content')
    <p>{{$category->title}}</p>

    <ul>
        @foreach($cat_child as $cat)
            <li>{{$cat->title}}</li>
        @endforeach
    </ul>
    <table width=100%>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cat_child as $category)
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