@extends('admin.layouts.app')
@section('content')

    <section class="admin-header">
        <h2>Catégories</h2>
        <article>
            <a class="admin-add" href="/admin/categories/create">
                <i class="fas fa-plus-circle"></i>
                <p>Ajouter une catégorie</p>
            </a>
        </article>
    </section>

    <section class="admin-stats">
        <article>
            <i class="far fa-bookmark"></i>
            <div>
                <h3>Nombre de catégories</h3>
                <span class="admin-stats-count">{{$countCategories}}</span>
            </div>
            
        </article>
        <article>
            <i class="fas fa-check-circle"></i>
            <div>
                <h3> Catégories activées</h3>
                <span class="admin-stats-count-active">{{$countActiveCategories}}</span>
            </div>
        </article>
        <article>
            <i class="fas fa-times-circle"></i>
            <div>
                <h3>Catégories désactivées</h3>
                <span class="admin-stats-count-unactive">{{$countInactiveCategories}}</span>
            </div>
        </article>
    </section>
    <section class="container-fluid p-0">
        @if(Session::has('success')) 
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            {{Session::put('success', null)}}
        @endif
    </section>
    @if($categories->isNotEmpty())
        <table class="admin-tab categories">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td width=5% >{{$category->id}}</td>
                        <td width=15%>{{$category->title}}</td>
                        <td width=30%>{{$category->description}}</td>
                        <td> 
                            @if($category->active == 1)
                                <i class="fas fa-check"></i>
                            @else 
                                <i class="fas fa-times"></i>
                            @endif
                        </td>
                        <td width=5%>
                            <div class="admin-tab-action">
                                <a href="/admin/categories/{{$category->id}}">
                                    <i class="fas fa-search-plus"></i>Afficher
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="admin-edit" class="dropdown-item" href="/admin/categories/{{$category->id}}/edit"><i class="fas fa-edit"></i>Modifier</a>
                                        <form action="/admin/categories/{{$category->id}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="delete" />
                                            <button type="submit" class="admin-delete dropdown-item"><i class="fas fa-trash-alt"></i>Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            
                @endforeach
            </tbody>
        </table>
    @else 
    <div class="container nocategories">
        <h3>Il n'existe encore aucune catégorie !</h3>
        <p>Vous pouvez en créer une en cliquant <a href="/admin/categories/create">ici</a> !</p>
    </div>
    @endif
   
@stop