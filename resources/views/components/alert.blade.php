@props(['for' => null])

@if (request()->session()->get('alert-for') === $for)
    @if (request()->session()->has('alert-success'))
        <div {{ $attributes->merge(['class' => 'alert alert-success alert-dismissible mb-4 fade show']) }}
            role="alert">
            {{ request()->session()->get('alert-success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div {{ $attributes->merge(['class' => 'alert alert-danger alert-dismissible mt-3 fade show']) }} role="alert">
            <strong>Terdapat Kesalahan</strong>
            {{ request()->session()->get('alert-error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endif
