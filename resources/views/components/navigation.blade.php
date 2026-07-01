<nav class="w-full p-2 bg-blue-300 text-white flex justify-between items-center">
    <ul class="flex items-center gap-2">
        <li>
            <x-link class="p-2 hover:bg-blue-400" :href="route('home')" :active="request()->routeIs('home')"
                    active-class="bg-blue-500">
                Home
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" :href="route('shop')" :active="request()->routeIs('shop')"
                    active-class="bg-blue-500">
                Shop
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" :href="route('about')" :active="request()->routeIs('about')"
                    active-class="bg-blue-500">
                About
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" :href="route('contact')" :active="request()->routeIs('contact')"
                    active-class="bg-blue-500">
                Contact
            </x-link>
        </li>
    </ul>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <x-base.button type="submit">Logout</x-base.button>
    </form>
</nav>
