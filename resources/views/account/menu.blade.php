<div class="max-w-3xl mx-auto mt-3 px-2 flex items-center justify-center">
    <div class="px-4 flex flex-wrap w-full md:w-4/5 lg:w-2/3 justify-between border-2 border-grey-darkest rounded-lg">
        @include('account.menu-link', [
            'icon' => 'icon home',
            'active' => request()->is('account'),
            'route' => route('account')
        ])

        @include('account.menu-link', [
            'icon' => 'icon at',
            'active' => request()->is('account/email'),
            'route' => route('account.email')
        ])

        @include('account.menu-link', [
            'icon' => 'icon user',
            'active' => request()->is('account/username'),
            'route' => route('account.username')
        ])

        @include('account.menu-link', [
            'icon' => 'icon image',
            'active' => request()->is('account/avatar'),
            'route' => route('account.avatar')
        ])

        @include('account.menu-link', [
            'icon' => 'icon lock',
            'active' => request()->is('account/password'),
            'route' => route('account.password')
        ])

    </div>
</div>