@extends('layouts.layout')

@section('content')

<h1>Vinix Pets</h1>
<div class="row row-cols-1 row-cols-md-5 g-3" style="padding-bottom: 5vh;">
@foreach ( $pets as $pet)
<div class="col">
    <div class="card h-100">
        <img src="{{ $pet->urlPhoto }}" class="card-img-top" alt="{{ $pet->name}}-{{ $pet->category_id}}">
        <div class="card-body">
            <h3 class="card-title">{{ $pet->name }}</h3>
            <h5 class="card-text text-secondary">Category:  {{ $pet->category->name }}</h5>
            <h5 class="card-text text-secondary">Status:  {{ $pet->status }}</h5>
            <div class="tags container-flex">
                @foreach ($pet->tags as $tag)
                    <span class="text-warning">#{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <a href="pets/{{ $pet->id }}" class="btn btn-secondary text-uppercase">View pet</a>
        </div>
    </div>
</div>
@endforeach
</div>

@stop