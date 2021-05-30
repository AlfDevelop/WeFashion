@extends('admin.layouts.app')

@section('content')
<section class="admin-header">
    <h2>Produits</h2>
    <article>
        <a class="admin-add" href="/admin/products/create">
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
<section class="container-fluid p-0">
    @if(Session::has('success')) 
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::put('success', null)}}
    @endif
</section>
<div class="container-fluid">
    
    {{$products->links()}}
</div>
@if($products->isNotEmpty())
    <table class="admin-tab products">
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
                <td width=40%>{{$product->description}}</td>
                <td width=15%>
                    @if(!empty($product->category['title'])) 
                        <a href="/admin/categories/{{$product->category['id']}}">{{$product->category['title']}}</a>
                    @else
                    Aucune catégorie
                    @endif
                </td>
                <td width=5%>{{number_format($product->price,2)}} €</td>
                <td width=10%>
                    @if($product->active == 1)
                        <i class="fas fa-check"></i>
                    @else 
                        <i class="fas fa-times"></i>
                    @endif
                </td>
                <td width=10%>
                    <div class="admin-tab-action">
                        <a href="/admin/products/{{$product->id}}">
                            <i class="fas fa-search-plus"></i>Afficher
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="admin-edit" class="dropdown-item" href="/admin/products/{{$product->id}}/edit"><i class="fas fa-edit"></i>Modifier</a>
                              <form action="/admin/products/{{$product->id}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
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
        <h3>Il n'existe encore aucun produit!</h3>
        <p>Vous pouvez en créer un en cliquant <a href="/admin/products/create">ici</a> !</p>
    </div>
    @endif
    <div class="container-fluid">
        {{$products->links()}}
    </div>
@stop