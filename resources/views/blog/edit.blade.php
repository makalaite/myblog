
@extends('layouts.template')

@section('title', 'Add New Blog Post')

@section('content')
    <h1>Add New Blog Post</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form action="{{ route('app.posts.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control" {{$post->title}}>
            </div>

            <div class="form-group">
                <label for="body">Description:</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" {{$post->description}}></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-default pull-right" href="{{ route('app.posts.index') }}">Go Back</a>
        </form>
    </div>
@endsection