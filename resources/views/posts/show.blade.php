@extends('templates.default')

@section('meta-title', $title = $post->name)
@section('meta-description', $description  = str_limit($post->body, 35))

@section('content')
    <post :post="{{ $post }}" :categories="{{ $categories }}" inline-template>
        <div class="ui vertical segment">
            <div class="ui container">
                <h2 class="ui huge header">
                    @{{ form.name }}
                    <div class="sub header">
                        {{ $description }}
                    </div>
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

                <div class="text-4xl mt-5 flex flex-col md:flex-row justify-between">
                    <div class="flex">
                        <div>
                            <a href="javascript:void(0)" class="p-2 text-grey-darkest hover:text-grey-darkest">
                                <i class="entypo-heart"></i>
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="p-2 text-grey-darkest hover:text-grey-darkest">
                                <i class="entypo-bell"></i>
                            </a>
                        </div>
                    </div>

                    <div class="flex">
                        <div>
                            <a href="javascript:void(0)"
                               class="p-2 text-grey-dark hover:text-grey-darkest">
                                <i class="fa-google"></i>
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)"
                               class="p-2 text-grey-dark hover:text-grey-darkest">
                                <i class="entypo-facebook"></i>
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)"
                               class="p-2 text-grey-dark hover:text-grey-darkest">
                                <i class="entypo-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <comments :post="post"></comments>

        </div>
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