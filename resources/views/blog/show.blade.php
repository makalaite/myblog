@extends('layouts.template')


@section('content')
    <h1>Your Post</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form>

            <div class="form-group">
                <label for="title"></label>
                <input name="title" type="text" class="form-control" value="{{$posts->title}}">


            </div>
        <br/>
            <div class="form-group">
                <label for="body"></label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{$posts->description}}"></textarea>

            </div>

            <a class="btn btn-default pull-right" href="{{ route('blog.allposts') }}">Go Back</a>
        </form>
    </div>
@endsection
© 2017