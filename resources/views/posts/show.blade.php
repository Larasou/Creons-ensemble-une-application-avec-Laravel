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

            <div class="flex justify-between">
                <div class="">

                </div>

                <div class="">

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