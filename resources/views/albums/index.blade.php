@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">All Albums</h1>
                    <a href="{{ route('album.create') }}" class="btn btn-success">Create Album</a>
                </div>
            </div>
        </div>
        @if ($albums->count() > 0)
            @foreach ($albums as $item)
                @php
                    $active = 1;
                @endphp
                <div class="row d-flex justify-content-center p-3">
                    <div id="carouselExampleControls{{ $item->album_name }}" class="carousel slide" data-bs-ride="carousel" style="width:500px">
                        <div class="carousel-inner">
                            @foreach ($medias as $media)
                                @if ($media->album_id == $item->id)
                                    <div class="carousel-item @if ($active) active @endif">
                                        <img src="{{ URL::asset($media->photo_name) }}" alt="{{ $media->photo_name }}"
                                            class="img-thumbnail">
                                    </div>
                                    @php
                                        $active = 0;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls{{ $item->album_name }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls{{ $item->album_name }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="p-2">{{ $item->album_name }}</div>
                    <div class="p-2"><a class="btn btn-danger" href="{{ route('album.destroy', ['id' => $item->id]) }}">Delete Album</a></div>
                    
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    No Albums
                </div>
            </div>
        @endif
    </div>
@endsection
