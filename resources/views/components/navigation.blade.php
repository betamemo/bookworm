<nav class="bg-white" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">

                <!-- Logo -->
                <div class="flex-shrink-0 w-12 h-12">
                    <x-application-logo />
                </div>

                <!-- Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-white-900 text-white", Default: "text-white-300 hover:bg-green-500 hover:text-white" -->

                        @foreach($menu as $item)
                        <a href="{{ $item['url'] }}" class="text-green-500 rounded-full px-3 py-2 font-medium hover:bg-green-500 hover:text-white">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="flex flex-row justify-center gap-4">

                        @auth
                        <span class="px-3 py-2 font-medium">Hello! {{ auth()->user()->name }}</span>

                        <a href="{{route('dashboard')}}" class="text-green-500 rounded-full px-3 py-2 font-medium hover:bg-green-500 hover:text-white">My Books</a>

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="text-green-500 rounded-full px-3 py-2 font-medium hover:bg-green-500 hover:text-white">Logout</button>
                        </form>
                        @endauth

                        @guest
                        <a href="{{route('login')}}" class="text-green-500 hover:bg-green-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                        <a href="{{route('register')}}" class="text-green-500 hover:bg-green-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                        @endguest

                    </div>
                </div>
            </div>

            <div class="-mr-2 flex md:hidden">

                <!-- Mobile menu button -->
                <button @click="open = !open" type="button" class="relative inline-flex items-center justify-center rounded-md bg-white-800 p-2 text-white-400 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-white-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" @click.away="open=false">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">

            <!-- Current: "bg-white-900 text-white", Default: "text-white-300 hover:bg-green-500 hover:text-white" -->
            @foreach($menu as $item)
            <a href="{{$item['url']}}" class="text-white-300 hover:bg-green-500 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{$item['name']}}</a>
            @endforeach

        </div>
    </div>
</nav>