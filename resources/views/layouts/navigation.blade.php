<nav class="ui borderless menu">
    <div class="ui container">
        <a class="brand item" href="/">
            <img src="{{ secure_asset('images/logo/logo-bk.png') }}"/>
        </a>
        <a class="item" href="{{ route('users') }}">Membres</a>
        <a class="item" href="{{ route('tutorials') }}">Tutoriels</a>
        <a class="item" href="{{ route('blog') }}">Blog</a>
        <div class="right menu">
            <a class="item" href="{{ route('login') }}"><i class="user icon"></i></a>
            <a class="item" href="{{ route('register') }}"><i class="user plus icon"></i></a>
            <a class="item" href="/atom.xml"><i class="feed icon"></i></a>
            <div class="item">
                <form action="https://www.google.com/search" class="ui form" method="get" target="_blank">
                    <input name="q" type="hidden" value="site:semantic-ui-forest.com"/>
                    <div class="ui left icon transparent input">
                        <input name="q" placeholder="Search..." type="text"/><i class="search icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>