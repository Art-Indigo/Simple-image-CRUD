@extends('layouts.app')

@section('content')
    <a class="btn btn-secondary" href="{{ url()->previous() }}">Go Back</a>
    <hr>
    <h1>{{$image->name}}</h1><br>
    <div class="row">
        <span class="pull-left"><img class="thumbnail" style="max-width: 100%" src="/storage/images/{{$image->category_id}}/{{$image->path }}" alt="{{$image->name}} "></span>
            <div class="col-sm">
                <p>Description: {{$image->description ? : 'No description'}}</p>
                <p>Username: {{$image->user->name}}</p>
                <p>Category: {{$image->category->name}}</p>
                <p>Created at: {{$image->created_at}}</p>
                <form method="POST" class="pull-left" action="{{route('images.destroy', $image->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>
@endsection
