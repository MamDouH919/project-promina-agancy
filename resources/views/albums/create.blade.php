@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach
    @endif
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Create Album</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('album.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Album Name</label>
                        <input type="text" class="form-control" name="albumName" placeholder="Album Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input class="form-control" type="file" name="filename[]" id="formFileMultiple" multiple>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Create Album</button>
                        <a href="{{ route('albums') }}" class="btn btn-success">All Albums</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
