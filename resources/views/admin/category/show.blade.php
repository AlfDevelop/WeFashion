@extends('admin.layouts.app')

@section('content')
<section class="admin-header">
    <h2>Catégorie {{$category->title}}</h2>
</section>
    @if($cat_child->isNotEmpty())
        <table class="admin-tab" style="margin-top:50px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            
                    @foreach($cat_child as $cat)
                        <tr>
                            <td width=5%>{{$cat->id}}</td>
                            <td width=15%>{{$cat->title}}</td>
                            <td width=30%>{{$cat->description}}</td>
                            <td width=5%>
                                <section class="last-category">
                                    <a class="admin-edit admin-tab-action" class="dropdown-item" href="/home/categories/{{$cat->id}}/edit"><i class="fas fa-edit"></i>Modifier</a>
                                    <form action="/home/categories/{{$cat->id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete" />
                                        <button type="submit" class="admin-tab-action admin-delete dropdown-item"><i class="fas fa-trash-alt"></i>Supprimer</button>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    @endforeach
            
            </tbody>
        </table>
    @else
        <div class="container nocategories">
            <h3>Il n'y a aucune catégorie présente dans {{$category->title}}</h3>
            <p>Vous serez redirigé vers la liste des catégories dans quelques secondes</p>
        </div>
        <script>
            setTimeout(function(){ 
                window.location = "/home/categories"; 
            }, 5000);
        </script>
    @endif

@stop