<li>
    <x-nav-link :href="route('index.bolsa_trabajo')" :active="request()->routeIs('index.bolsa_trabajo')">
        {{ __('Bolsa de Trabajo') }}
    </x-nav-link>
</li>
@auth
<li class="btn-trial">
    <x-nav-link :href="route('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
</li>
@else
<li class="btn-trial">
    <x-nav-link :href="route('login')">
        {{ __('Ingresa') }}
    </x-nav-link>
</li>
@endauth



