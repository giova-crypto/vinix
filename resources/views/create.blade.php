@extends('layouts.layout')

@section('content')

<div class="container center bg-white" style="padding-bottom: 10px; width: 40vw; margin-top: 5vh; margin-bottom: 5vh; border: 8px solid white; border-radius: 10px;">
    <form method="POST" action="{{ route('/pet/store') }}" class=" g-1 bg-white">
        {{ csrf_field() }}
        <h1>Create Pet</h1>
        <div class="mb-3 {{ $errors->has('name')?'has-error':'' }}">
            <label for="name" class="form-label">Pet name</label>
            <input type="text" class="form-control bg-white" name="name" value={{ old('name') }}>
            {!! $errors->first('name','<span class="help-block text-info">:message</span>') !!}
            
        </div>
        <div class="mb-3 form-group {{ $errors->has('name')?'has-error':'' }}">
            <label for="photoUrl" class="form-label ">Photo url</label>
            <input type="text" class="form-control bg-white" name="photoUrl" value={{ old('photoUrl') }}>
            {!! $errors->first('photoUrl','<span class="help-block text-info">:message</span>') !!}
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select bg-white">
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ old('category')== $cat->id ? 'selected' : '' }}
                >{{ $cat->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select bg-white">
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tagsSelect" class="form-label">Tags</label>
            <select id="tagsSelect" class="form-control bg-white" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option style="background-color: blue" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>        
        <script>
            $('#tagsSelect').select2({
                width: '100%',
                placeholder: "Select tags",
                allowClear: true,
            });
        </script>
    </form>
</div>


@stop