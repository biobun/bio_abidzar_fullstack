<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="mb-3">
                    {{ __('Article') }}
                </h2>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row-reverse">
                    <a class="btn btn-primary mt-2 text-right" href="{{ route('article.create') }}">
                        {{ __('Create Article') }}
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="container-fluid overflow-hidden">
        <x-alert />
    </div>
    <div class="card">
        <div class="card-body my-3">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('script')
    {{ $dataTable->scripts() }}
    @endpush
</x-app-layout>
