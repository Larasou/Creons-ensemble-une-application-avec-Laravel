
<nav class="mb-3 bg-navigation shadow-md">
    <div class="container mx-auto flex flex-col md:flex-row items-center md:justify-between px-4 py-6">
        <div class="mb-2 md:mb-0">
            <a href="/" class="text-white no-underline text-3xl">
                <svg class="fill-current text-3xl h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
                <span class="font-semibold text-3xl tracking-tight">
                    Larablog
                </span>
            </a>
        </div>
        <div class="text-lg">
            <a href="/users" class="no-underline text-white hover:text-grey">
                Memnres
            </a>
            <a href="/blog" class="ml-2 no-underline text-white hover:text-grey">
                Blog
            </a>
            <a href="/contact" class="ml-2 no-underline text-white hover:text-grey">
                Contact
            </a>
        </div>
    </div>
</nav>

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