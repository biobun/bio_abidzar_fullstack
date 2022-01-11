<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('guest.article.show', [$articles->first()]) }}"><h3 class="fw-bold">{{ $articles->first()->title }}</h3></a>
                            <div>{{ $articles->first()->content }}</div>
                        </div>
                        <div class="col-6">
                            <img src="{{ $articles->first()->image_url }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="container py-5">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ route('guest.article.show', [$article]) }}"><h3 class="fw-bold">{{ $article->title }}</h3></a>
                        <div>{{ $article->content }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer class="container-fluid bg-dark py-4 text-white">
        <div class="container">
            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6 text-end">
                    <span>
                        Copyright 2022 @Nova
                    </span>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>
