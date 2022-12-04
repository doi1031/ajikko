<header class="relative bg-white">
    <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
            <div class="flex h-16 items-center">
                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                <button type="button" class="rounded-md bg-white p-2 text-gray-400 lg:hidden">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/bars-3 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Logo -->
                <div class="ml-4 flex lg:ml-0">
                    <a href="#">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>

                <!-- Flyout menus -->
                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="flex h-full space-x-8">
                        <div class="flex">
                            <div class="relative flex">
                                <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                                <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false"><a href="/">{{ config('app.name') }}</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>
