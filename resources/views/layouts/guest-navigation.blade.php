<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <x-application-logo width=30 />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-4">
                    <x-responsive-nav-link :href="route('guest.home')" :active="request()->routeIs('guest.home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                </li>
                <li class="nav-item px-4">
                    <x-responsive-nav-link :href="route('guest.article.all')" :active="request()->routeIs('guest.article.all')">
                        {{ __('Article') }}
                    </x-responsive-nav-link>
                </li>
                <li class="nav-item px-4">
                    <a class="btn btn-danger rounded" href="{{ route('register') }}">
                        {{ __('Sign Up') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
