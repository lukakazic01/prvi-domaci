<nav class="w-full bg-white border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            <div class="flex items-center gap-8">
                <span class="text-xl font-bold text-slate-800 tracking-tight">
                    OnlineShop
                </span>

                <ul class="flex items-center gap-1">
                    <li>
                        <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                :href="route('home')" :active="request()->routeIs('home')"
                                active-class="text-blue-600 bg-blue-50">
                            Home
                        </x-link>
                    </li>
                    <li>
                        <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                :href="route('shop')" :active="request()->routeIs('shop')"
                                active-class="text-blue-600 bg-blue-50">
                            Shop
                        </x-link>
                    </li>
                    <li>
                        <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                :href="route('about')" :active="request()->routeIs('about')"
                                active-class="text-blue-600 bg-blue-50">
                            About
                        </x-link>
                    </li>
                    <li>
                        <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                :href="route('contact')" :active="request()->routeIs('contact')"
                                active-class="text-blue-600 bg-blue-50">
                            Contact
                        </x-link>
                    </li>

                    @if (auth()->user()?->role === 'admin')
                        <li class="pl-3 ml-2 border-l border-slate-200">
                            <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                    :href="route('admin.contacts.all')" :active="request()->routeIs('admin.contacts.all')"
                                    active-class="text-blue-600 bg-blue-50">
                                All Contacts
                            </x-link>
                        </li>
                        <li>
                            <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                                    :href="route('admin.products.all')" :active="request()->routeIs('admin.products.all')"
                                    active-class="text-blue-600 bg-blue-50">
                                All Products
                            </x-link>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="flex items-center gap-3">
                <x-link active-class="text-blue-200" class="relative" :href="route('cart.all')" :active="request()->routeIs('cart.all')">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="absolute size-4 flex items-center justify-center text-[10px] -top-2 -right-2 bg-red-500 text-white rounded-full">
                            {{ count(session()->get('products', [])) }}
                        </span>
                </x-link>
                @guest
                    <x-link class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors"
                            :href="route('login')" :active="request()->routeIs('login')">
                        Login
                    </x-link>
                    <x-link class="px-4 py-2 rounded-md text-sm font-medium bg-blue-600 text-white hover:bg-blue-700 transition-colors"
                            :href="route('register')" :active="request()->routeIs('register')">
                        Register
                    </x-link>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-base.button type="submit"
                                       class="px-4 py-2 rounded-md text-sm font-medium text-slate-600 hover:text-red-600 hover:bg-red-50 transition-colors">
                            Logout
                        </x-base.button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
