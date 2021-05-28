@extends('layouts.app')

@section('content')

        <div style="margin-left:210px;">
            <div class="container-fluid">
                <h1>Bienvenue  {{ Auth::user()->name }}</h1>
            </div>
        </div>
 
@endsection
