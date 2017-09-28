@extends('layouts.template')


@section('content')
    <h1>Your Post</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form>

            <div class="form-group">
                <label for="title">{{$title}}</label>
                <input name="title" type="text" class="form-control">


            </div>
        <br/>
            <div class="form-group">
                <label for="body">{{$description}}</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

            </div>

            <a class="btn btn-default pull-right" href="{{ route('blog.allposts') }}">Go Back</a>
        </form>
    </div>
@endsection
© 2017