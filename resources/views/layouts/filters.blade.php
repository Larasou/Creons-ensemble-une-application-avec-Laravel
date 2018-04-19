<div class="d-flex justify-content-between">
    <a href="{{  route('post.create') }}" class="ui violet button">Publier un article</a>
    <div class="ui labeled icon top right pointing dropdown button">
        <i class="filter icon"></i>
        <span class="text">Filter Posts</span>
        <div class="menu">
            <div class="ui search icon input">
                <i class="search icon"></i>
                <input type="text" name="search" placeholder="Search issues...">
            </div>
            <div class="divider"></div>
            <div class="header">
                <i class="tags icon"></i>
                Filter by tag
            </div>
            <div class="item">
                <div class="ui red empty circular label"></div>
                Important
            </div>
            <div class="item">
                <div class="ui blue empty circular label"></div>
                Announcement
            </div>
            <div class="item">
                <div class="ui black empty circular label"></div>
                Discussion
            </div>
            <div class="divider"></div>
            <div class="header">
                <i class="calendar icon"></i>
                Filter par catégorie
            </div>
            @forelse($categories as $category)
                <div class="item">
                    <a href="{{ url("blog/{$category->slug}") }}"
                       class="text-dark"
                       style="text-decoration: none"
                    >
                        <i class="{{ $category->icon }} {{ $category->color }}"></i>
                        {{ $category->name }}
                    </a>
                </div>
            @empty
                <div class="item">
                    <i class="olive circle icon"></i>
                    Pas de cétégorie
                </div>
            @endforelse
        </div>
    </div>
</div>
