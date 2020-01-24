@extends('layouts.app')

@section('content')



<div class="row mt-4">

        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            @foreach ($images as $image)
                <img class="img-thumbnail" src="{{ asset($image->url) }}" alt="">
            @endforeach

            @foreach ($videos as $video)
                <img class="img-thumbnail" src="{{ $video->url }}" alt="">
            @endforeach
        </div>

</div>


@endsection
