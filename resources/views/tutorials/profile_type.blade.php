@if ($activity->type === 'post')
    <div class="py-3">
        <h4>
            <a class="font-bold text-indigo-dark hover:text-indigo-dark hover:no-underline">
                {{ $activity->subject->user->name }}
            </a>
            vient de poster un article -
            <a href="{{ $activity->subject->path }}" class="font-bold text-red-dark hover:text-red-dark hover:no-underline">
                {{ $activity->subject->name }}
            </a>
        </h4>
        <p class="text-lg my-2">
            {!! $markdown->parse($activity->subject->description) !!}
        </p>
        <span class="text-sm font-bold text-grey-dark">
            {{ ucwords($activity->created_at->formatLocalized('%a, %d %b %G')) }}
        </span>
    </div>
@endif

@if ($activity->type === 'comment')
    <div class="py-3">
        <h4>
            <a class="font-bold text-indigo-dark hover:text-indigo-dark hover:no-underline">
                {{ $activity->subject->user->name }}
            </a>
            vient de commenter l'article -
            <a href="{{ $activity->subject->commentable->path }}" class="font-bold text-red-dark hover:text-red-dark hover:no-underline">
                {{ $activity->subject->commentable->name }}
            </a>
        </h4>
        <p class="text-lg my-2">
            {!! $markdown->parse($activity->subject->body) !!}
        </p>
        <span class="text-sm font-bold text-grey-dark">
            {{ ucwords($activity->created_at->formatLocalized('%a, %d %b %G')) }}
        </span>
    </div>
@endif