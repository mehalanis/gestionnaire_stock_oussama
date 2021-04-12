@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('message')) 
    <div class="alert alert-{{Session::get('Mode')}}">
        {{ Session::get('message') }}
    </div>
@endif