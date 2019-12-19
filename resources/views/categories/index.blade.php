@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a class="btn btn-secondary" href="{{ route('images.index') }}">Go To All Images</a>
                    <span class="pull-right"><a href="{{route('categories.create')}}" class="btn btn-success btn-xs">Add Category</a></span>
                    <hr>
                    <h3>All Categories </h3>
                    @if(count($categories))
                        <table class="table table-striped">
                            <tr>
                                <th>Category</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td><h5><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></h5></td>
                                    <td><a class="pull-right btn btn-primary" href="{{route('categories.edit', $category->id)}}">Edit</a></td>
                                    <td>
                                        <form method="POST" class="pull-left" action="{{route('categories.destroy', $category->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
