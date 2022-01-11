<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
<!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        <style>
            body{
                font-family: 'Outfit', sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            h1, h2, h3, h4, h5, h6, p{
                line-height: 1.5;
            }
        </style>
    </head>
    <body class="bg-white">
        @include('layouts.navigation')
        <div class="container">

            <!-- Page Heading -->
            <header>
                <div class="mt-3 mb-4">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white border-bottom-0">
                            <h5 class="modal-title" id="delete-modal-title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Batal
                            </button>
                            <form id="delete-modal-form" method="post" action="">
                                @method('DELETE')
                                @csrf
                                <button id="delete-modal-button" class="btn btn-danger">
                                    <strong></strong>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset(mix('js/manifest.js')) }}"></script>
        <script src="{{ asset(mix('js/vendor.js')) }}"></script>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        <script>
            $('#delete-modal').on('show.bs.modal', function(e) {
                $('#delete-modal-title').text('Hapus ' + e.relatedTarget.dataset.model + ' ' + e.relatedTarget.dataset.name + '?')
                $('#delete-modal-button > strong').text('Hapus ' + e.relatedTarget.dataset.model)
                $('#delete-modal-form').attr('action', e.relatedTarget.href)
            });
        </script>
        @stack('script')
    </body>
</html>
