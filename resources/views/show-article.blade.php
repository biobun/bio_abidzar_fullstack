<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <img src="{{ $article->image_url }}" alt="" class="img-fluid border-1 rounded">
            </div>
        </div>
    </x-slot>
    {{-- SECTION 1 --}}
    <div class="container py-5">
        <h3 class="fw-bold">{{ $article->title }}</h3>
        <div>{{ $article->content }}</div>
    </div>
    <footer class="container-fluid bg-dark py-4 text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">

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
