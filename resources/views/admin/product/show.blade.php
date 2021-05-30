@extends('admin.layouts.app')

@section('content')

   <section class="admin-product-page container" >
      <div class="row">
         <div class="col-md-4 col-sm-12 col-xs-12">
            <h2>{{$product->name}} <span>(Réf : {{$product->reference}})</span></h2>
            <img style="width:250px;display:block;" src="{{asset('storage/images/'.$product->image) }}" alt="">
            
         </div>
         <div class="col-md-6 col-sm-12 col-xs-12">
            <h2>Description</h2>
            <p>{{$product->description}}</p>
            <p>Catégorie : {{$product->category['title']}}</p>
            <div class="date-info">
               <p> Créé le {{$product->created_at}}</p>
               <p> Modifié le {{$product->updated_at}}</p>
            </div>
            <div class="admin-product-action">
               <a class="admin-edit" class="dropdown-item" href="/admin/products/{{$product->id}}/edit"><i class="fas fa-edit"></i>Modifier</a>
               <form action="/admin/products/{{$product->id}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="delete" />
                  <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
               </form>
            </div>
         </div>
         
      </div>
     
   </section>
@stop