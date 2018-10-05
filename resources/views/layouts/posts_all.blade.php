<div class="flex flex-wrap w-full flex-col md:flex-row">
    @forelse($posts as $post)
        <a href="{{ $post->path }}" class="text-black hover:text-black hover:no-underline flex flex-col justify-between w-full md:w-1/3  p-3">
            <img src="{{ $post->image }}" alt="{{ $post->name }}">

           @if ($view)
                <h3 class="text-3xl my-3">
                    {{ $post->name }}
                </h3>

                <p>
                    {!!  $markdown->parse($post->description) !!}
                </p>

                <span class="text-right font-bold text-{{ $post->category->color }}-dark">
                      {{ $post->category->name }}
                  </span>
           @endif
        </a>
        @endforeach
</div>