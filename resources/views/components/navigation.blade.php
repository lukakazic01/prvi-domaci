<nav class="w-full p-2 bg-blue-300 text-white">
    <ul class="flex items-center gap-2">
        <li>
            <x-link class="p-2 hover:bg-blue-400" href="/" :active="request()->routeIs('home')" active-class="bg-blue-500">
                Home
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" href="/shop" :active="request()->routeIs('shop')" active-class="bg-blue-500">
                Shop
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" href="/about" :active="request()->routeIs('about')" active-class="bg-blue-500">
                About
            </x-link>
        </li>
        <li>
            <x-link class="p-2 hover:bg-blue-400" href="/contact" :active="request()->routeIs('contact')" active-class="bg-blue-500">
                Contact
            </x-link>
        </li>
    </ul>
</nav>
