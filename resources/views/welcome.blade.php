@extends('layouts.layout')

@section('content')

<h1>Bienvenido</h1>
<div class="row row-cols-1 row-cols-md-4 g-4">
@for ($i=0;$i<7;$i++)
<div class="col">
    <div class="card h-100">
        <img src="http://deanimalia.com/images/full/perros/mastintibetano5.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card. #{{ $i }}</p>
        </div>
    </div>
</div>
@endfor
</div>

@stop