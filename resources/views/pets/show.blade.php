@extends('layouts.layout')

@section('content')

<article class="container center" style="padding-bottom: 10px; width: 40vw; margin-top: 5vh; margin-bottom: 5vh; border: 2px solid white; border-radius: 5px;">
    <div class="">
        <header class="container-fluid space-between">
            <div class="date">
                <span class="text-secondary">{{ $pet->updated_at->format('Y M d') }}</span>
            </div>
        </header>
    </div>

</article>



@stop