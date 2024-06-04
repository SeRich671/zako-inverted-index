@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($articles->items() as $article)
                <div class="col-lg-3 mt-2">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="card-title">
                                {{ $article->title }}

                            </div>
                        </div>
                        <img src="{{ asset('image/article.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ substr($article->content, 0, 20) }}</p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('article.show', $article->slug) }}" class="btn btn-primary">Więcej</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{ $articles->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
