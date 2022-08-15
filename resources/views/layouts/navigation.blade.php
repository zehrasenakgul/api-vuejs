<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item ml-3 active">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Anasayfa') }}
                    </x-nav-link>
                </li>
                <li class="nav-item ml-3">
                    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')">
                        {{ __('Kategoriler') }}
                    </x-nav-link>
                </li>
                <li class="nav-item ml-3 ">
                    <x-nav-link :href="route('expenses')" :active="request()->routeIs('expenses')">
                        {{ __('Harcamalar') }}
                    </x-nav-link>
                </li>
                <li class="nav-item ml-3">
                    <form method="POST" class="d-block d-sm-none" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                </li>
            </ul>
        </div>

        <ul class="dropdown d-none d-md-block d-lg-block">
            <div class="dropdown ">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{-- {{ Auth::user()->name }} --}} </button>
                <ul class="dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</nav>
