<nav class="" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 right-0 flex items-center md:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open = true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-between sm:items-stretch sm:justify-between">
                <!-- logotipo -->
                <a href="/" class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/logo.png') }}" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="{{ asset('img/logo.png') }}">
                </a>
                <div class="hidden md:block md:ml-6">
                    <div class="flex space-x-4 w-full">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <!-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a> -->
                        <a href="/" class="hover:bg-gray-700 hover:text-white flex justify-center text-white px-3 py-2 rounded-md text-sm font-medium nav-options"  aria-current="page">Inicio</a>
                        @foreach ($categories as $category)
                        <a href="{{route('posts.category',$category)}}" class="hover:bg-gray-700 hover:text-white flex justify-center text-white px-3 py-2 rounded-md text-sm font-medium nav-options"  aria-current="page">{{$category->name}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
            @auth
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                
                <div class="ml-3 relative " x-data="{ open: false }">
                    <div>
                        <button x-on:click="open = true" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="{{auth()->user()->profile_photo_url }}" alt="">
                        </button>
                    </div>

                    <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                        {{-- <a href="{{ route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tu Perfil</a> --}}
                        <a href="{{ route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                        </form>

                    </div>
                </div>
            </div>
            @else
            @endauth
        </div>
    </div>


    <div class="sm:hidden" x-show="open" x-on:click.away="open = false">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <!-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a> -->
            @foreach ($categories as $category)
            <a href="{{route('posts.category',$category)}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
</nav>