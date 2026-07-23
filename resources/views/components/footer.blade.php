<footer class="fixed bottom-0 left-0 w-full bg-slate-900/90 backdrop-blur-md border-t border-white/10 text-slate-300 py-4 z-40">
    <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-3">
        <p class="text-xs text-slate-400 order-2 sm:order-1">
            &copy; {{ date('Y') }} <span class="text-white font-semibold">OnlineShop</span> — Sva prava zadržana
        </p>
        <ul class="flex items-center gap-1 order-1 sm:order-2">
            <li>
                <x-link class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 transition-colors"
                        :href="route('home')" :active="request()->routeIs('home')"
                        active-class="text-blue-400 bg-white/5">
                    Home
                </x-link>
            </li>
            <li>
                <x-link class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 transition-colors"
                        :href="route('shop')" :active="request()->routeIs('shop')"
                        active-class="text-blue-400 bg-white/5">
                    Shop
                </x-link>
            </li>
            <li>
                <x-link class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 transition-colors"
                        :href="route('about')" :active="request()->routeIs('about')"
                        active-class="text-blue-400 bg-white/5">
                    About
                </x-link>
            </li>
            <li>
                <x-link class="px-3 py-1.5 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 transition-colors"
                        :href="route('contact')" :active="request()->routeIs('contact')"
                        active-class="text-blue-400 bg-white/5">
                    Contact
                </x-link>
            </li>
        </ul>
    </div>
</footer>
