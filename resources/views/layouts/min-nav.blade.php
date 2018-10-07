<div class="mb-3 max-w-3xl mx-auto flex items-center flex-col-reverse md:flex-row justify-between text-3xl">
    <div class="w-full flex">
        <input type="search" name="q" placeholder="Rechercher..." class="w-full rounded-lg p-2 bg-grey-dark focus:bg-grey-light">
    </div>
    <div class="w-full md:w-1/5  text-center md:text-right">
        @guest
            <a href="" data-toggle="modal" data-target="#login"
               class="text-indigo-darker hover:text-indigo-darker p-3">
                <i class="entypo-user"></i>
            </a>
            <a href="" data-toggle="modal" data-target="#register"
               class="text-yellow-darker hover:text-yellow-darker p-3">
                <i class="entypo-user-add"></i>
            </a>
        @else
            <a href="/account" class="hover:text-green-darker text-green-darker p-3">
                <i class="entypo-user"></i>
            </a>
            <a href="{{ route('logout') }}" class="hover:text-red-darker text-red-darker p-3">
                <i class="entypo-login"></i>
            </a>
        @endguest
    </div>
</div>