<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#pablo"> Dashboard </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">


            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">

                    <x-dropdown-link class="nav-link" :href="route('profile.edit')">
                        {{ Auth::user()->name }}
                    </x-dropdown-link>

                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link  class="nav-link" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                           <i class="fa fs-5 fa-sign-out"></i>{{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                </li>

            </ul>

        </div>
    </div>
</nav>
