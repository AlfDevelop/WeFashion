@extends('layouts.app')

@section('content')
<section class="admin-header">
    <h2>Produits</h2>
    <article>
        <a class="admin-add" href="/home/products/create">
            <i class="fas fa-plus-circle"></i>
            <p>Ajouter un produit</p>
        </a>
    </article>
</section>

<section class="admin-stats">
    <article>
        <i class="far fa-bookmark"></i>
        <div>
            <h3>Nombre de produits</h3>
            <span class="admin-stats-count">{{$countProduct}}</span>
        </div>
        
    </article>
    <article>
        <i class="fas fa-check-circle"></i>
        <div>
            <h3>Produits actifs</h3>
            <span class="admin-stats-count-active">{{$countActiveProduct}}</span>
        </div>
    </article>
    <article>
        <i class="fas fa-times-circle"></i>
        <div>
            <h3>Produits inactifs</h3>
            <span class="admin-stats-count-unactive">{{$countInactiveProduct}}</span>
        </div>
    </article>
</section>

    <table class="admin-tab">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Référence</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Etat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td width=5%>{{$product->id}}</td>
                <td width=10%>{{$product->name}}</td>
                <td width=10%>{{$product->reference}}</td>
                <td width=30%>{{$product->description}}</td>
                <td width=20%>{{$product->category['title']}}</td>
                <td width=20%>{{$product->price}}</td>
                <td>{{$product->active}}</td>
                <td width=5%>
                    <div class="admin-tab-action">
                        <a href="/home/products/{{$product->id}}">
                            <i class="fas fa-search-plus"></i>Afficher
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="admin-edit" class="dropdown-item" href="/home/products/{{$product->id}}/edit"><i class="fas fa-edit"></i>Modifier</a>
                              <a class="admin-delete" class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Supprimer</a>
                            </div>
                          </div>
                    </div>
                </td>
                
            </tr>
       
            @endforeach
        </tbody>
    </table>
@stop