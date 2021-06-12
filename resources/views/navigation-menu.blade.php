<header class="header">
    <div class="logo_main" style="color:white;">
        <a href="{{ url('teacher_dashboard') }}">Attendance Project</a>
        
    </div>
    <div class="ml-3 relative" style="    position:absolute !important;
    top: 7px !important;
    right: 7px !important;">
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-100 hover:text-gray-200 focus:outline-none transition">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                @endif

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
        </x-jet-dropdown>
    </div>
</header> 

<nav class="nav">
    <div class="nav__links">
        <a href="{{ url('teacher_dashboard') }}" class="nav__link">
            <i class="material-icons">home</i>
            Home
        </a>
        <a class="nav__link" href="{{ url('teacher_dashboard/export/') }}">
            <i class="material-icons">file_download</i>
            Export Data
        </a>
        <a class="nav__link" href="#">
            <i class="material-icons">contact_support</i>
            About
        </a>
        <a class="nav__link" href="#">
            <i class="material-icons">contact_page</i>
            Contact page
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-dropdown-link style="position: absolute; bottom: 20px; width: 100%!important;" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                            this.closest('form').submit();">
                    <div class="nav__link" >
                        <i class="material-icons">logout</i>
                        Logout</div>
            </x-jet-dropdown-link>
        </form>
        
    </div>
</nav>
