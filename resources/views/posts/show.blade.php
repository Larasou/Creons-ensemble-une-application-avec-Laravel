@extends('templates.default')

@section('meta-title', $title = $post->name)
@section('meta-description', $post->description)
@section('meta-image', $post->image)
@section('meta-created_at', $post->created_at)
@section('meta-updated_at', $post->updated_at)
@section('meta-url', request()->fullUrl())

@section('content')
    @include('layouts.min-nav')

    <post :post="{{ $post }}" :categories="{{ $categories }}" inline-template>
        <div class="">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold">
                    @{{ form.name }}
                </h2>


                <div class="flex justify-end text-3xl">
                    <a href="{{ $post->path }}/edit" class="p-3 no-underline text-blue">
                        <i class="entypo-pencil"></i>
                    </a>

                    <form action="{{ $post->pat }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="p-3 no-underline text-red">
                            <i class="entypo-trash"></i>
                        </button>
                    </form>
                </div>

                <div v-html="form.body"></div>

                <div class="mt-5 flex flex-col md:flex-row justify-between">
                    <div class="flex">
                        <div class="flex flex-col items-center">
                            <a href="javascript:void(0)"
                               class="text-4xl px-2 text-blue-dark hover:text-blue-dark">
                                <i class="entypo-eye"></i>
                            </a>
                            <span class="-mt-5 font-bold text-2xl">
                                {{ visits($post)->count() }}
                            </span>
                        </div>

                       <like :post="post"></like>

                        <subscribe :post="post"></subscribe>
                    </div>

                    <div class="flex">
                        <social-sharing url="{{ request()->fullUrl() }}"
                                         :title="post.name"
                                        :description="post.description"
                                         :quote="post.description"
                                        hashtags=""
                                        twitter-user="Larasouu"
                                        inline-template>
                            <div>
                                <network network="googleplus">
                                    <a href="javascript:void(0)"
                                       class="p-2 text-grey-dark hover:text-grey-darkest">
                                        <i class="fa-google"></i>
                                    </a>
                                </network>
                                <network network="facebook">
                                    <a href="javascript:void(0)"
                                       class="p-2 text-grey-dark hover:text-grey-darkest">
                                        <i class="entypo-facebook"></i>
                                    </a>
                                </network>
                                <network network="twitter">
                                    <a href="javascript:void(0)"
                                       class="p-2 text-grey-dark hover:text-grey-darkest">
                                        <i class="entypo-twitter"></i>
                                    </a>
                                </network>
                            </div>
                        </social-sharing>
                    </div>
                </div>

                <div class="flex mt-3">
                   @foreach($post->load('tagged')->tags as $tag)
                        <a href="{{ route('blog', "tags=$tag->slug") }}"
                           class="mx-2 py-1 px-3 font-bold hover:no-underline text-grey-lighter hover:text-grey-lighter rounded-full bg-grey-darker">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>

            </div>

            <comments :post="post"></comments>

        </div>
    </post>
@endsection
@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection