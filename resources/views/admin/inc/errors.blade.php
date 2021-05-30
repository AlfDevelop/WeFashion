{{Session::put('error', null)}}
<section class="container p-0">
    @if(Session::has('error')) 
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
</section>