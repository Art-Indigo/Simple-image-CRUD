@extends('layouts.app')

@section('content')
    <a class="btn btn-secondary" href="{{ route('categories.index') }}">Go To Categories</a>
    <hr>
    {!! form($form) !!}
@endsection
