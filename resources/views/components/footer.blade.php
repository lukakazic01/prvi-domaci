<footer class="fixed p-4 bottom-0 items-center gap-4 flex flex-col w-full bg-gray-200 text-gray-700">
    <ul class="flex items-center gap-5">
        <li>
            <x-link :href="route('home')" active="{{ request()->routeIs('home') }}" active-class="underline">Home</x-link>
        </li>
        <li>
            <x-link :href="route('shop')" active="{{ request()->routeIs('shop') }}" active-class="underline">Shop</x-link>
        </li>
        <li>
            <x-link :href="route('about')" active="{{ request()->routeIs('about') }}" active-class="underline">About</x-link>
        </li>
        <li>
            <x-link :href="route('contact')" active="{{ request()->routeIs('contact') }}" active-class="underline">Contact</x-link>
        </li>
    </ul>
    &copy; Sva prava zadrzana
</footer>
