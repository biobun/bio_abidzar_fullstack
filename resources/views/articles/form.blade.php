@php
    $title = $article->exists ? "Edit article {$article->title}" : "Create article";
    $buttonText = $article->exists ? "Update article" : "Create article"
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="mb-3">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
        </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ request()->routeIs('article.create') ? route('article.store') : route('article.update', [$article]) }}" enctype="multipart/form-data">
                            @csrf
                            @if (request()->routeIs('article.edit'))
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="mb-1" for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title ?? '') }}">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="4">{{ old('content', $article->content ?? '') }}</textarea>
                                        @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label">Image</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="image" name="image">
                                            <label class="input-group-text" for="image">Upload</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ $buttonText }}</button>
                            <a class="btn btn-link mt-3" href="{{ route('article.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
