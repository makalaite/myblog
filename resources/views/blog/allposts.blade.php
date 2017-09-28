@extends('layouts.template')

@section('title', 'Blog Admin Panel')

@section('content')
    <h1>Posts</h1>
    <a class="btn btn-primary pull-right" href="{{ route('app.posts.create') }}">Add New Blog Post</a>
    <br>
    <br>
    <br>

    <table class="table">
        <thead>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>edit</th>
        <th>delete</th>
        </thead>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td><a href="{{route('app.posts.show', $post['id'])}}" class="btn btn-default">Show</a></td>
                <td><a href="{{route('app.posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a></td>
                <td><a class="btn btn-danger btn-sm" onclick="return confirm('Ar you sure?')" href="{{route('post.delete', $post->id)}}">Delete</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection