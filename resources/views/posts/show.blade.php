@extends('templates.default')

@section('meta-title', $title = $post->name)
@section('meta-description', $post->description)
@section('meta-image', $post->image)
@section('meta-created_at', $post->created_at)
@section('meta-updated_at', $post->updated_at)
@section('meta-url', request()->fullUrl())

@section('content')
    <post :post="{{ $post }}" :categories="{{ $categories }}" inline-template>
        <div class="ui vertical segment">
            <div class="ui container">
                <h2 class="ui huge header">
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
                       <like :post="post"></like>
                        <div>
                            <a href="javascript:void(0)" class="text-4xl p-2 text-grey-darkest hover:text-grey-darkest">
                                <i class="entypo-bell"></i>
                            </a>
                        </div>
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