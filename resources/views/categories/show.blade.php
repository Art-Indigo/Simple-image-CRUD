@extends('layouts.app')

@section('content')
    <a class="btn btn-secondary" href="{{ route('categories.index') }}">Go To Categories</a>
    <a class="btn btn-success" href="{{route('images.create')}}">Upload Photo</a>
    <hr>
    <h1>{{$category->name}}</h1>
    <p>{{$category->description ? : ''}}</p>
    @if(count($images) > 0)
        <?php
        $colcount = count($images);
        $i = 1;
        ?>
        <div id="images">
            <div class="row text-center">
                @foreach($images as $image)
                    @if($i == $colcount)
                        <div class='col-sm end'>
                            <a href="{{ route('images.show', $image->id) }}">
                                <img class="img-responsive thumbnail" style="max-width: 100%" src="/storage/images/{{$image->category_id}}/{{$image->path }}" alt="{{$image->name}} ">
                            </a>
                            <br>
                            <h4>{{$image->title}}</h4>
                            @else
                                <div class='col-sm'>
                                    <a href="{{ route('images.show', $image->id) }}">
                                        <img class="img-responsive thumbnail" style="max-width: 100%" src="/storage/images/{{$image->category_id}}/{{$image->path}}" alt="{{$image->name}}  ">
                                    </a>
                                    <br>
                                    <h4>{{$image->name}}</h4>
                                    @endif

                                    @if($i % 3 == 0)
                                </div></div><div class="row text-center">
                            @else
                        </div>
                    @endif

                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No Photos To Display</p>
    @endif
@endsection
