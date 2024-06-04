@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            {{ $article->title }}
                        </div>
                    </div>
                    <img src="{{ asset('image/article.jpg') }}" style="max-height: 300px; max-width: 400px" class="card-img-top align-self-lg-center" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $article->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
