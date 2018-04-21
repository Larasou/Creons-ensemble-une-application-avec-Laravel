@extends('templates.default')

@section('meta-title', $title = $post->name)
@section('meta-description', $description  = str_limit($post->body, 35))

@section('content')
    <post :post="{{ $post }}" :categories="{{ $categories }}" inline-template>
     <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                @{{ name }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>

            <div class="d-flex justify-content-end mb-3">
                <button v-if="! editing" @click="isEditing" class="ui mr-3 olive button icon">
                    <i class="edit icon"></i>
                    Editer
                </button>
                <button v-else @click="isEditing" class="ui mr-3 orange button icon">
                    <i class="close icon text-white"></i>
                    Annuler
                </button>

                <form action="{{ url("{$post->path()}") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ui red button icon">
                        <i class="trash icon"></i>
                       Supprimer
                    </button>
                </form>
            </div>

            <form v-show="editing" @submit.prevent="update" method="POST" class="ui form mt-5">
                <div class="two fields">
                    <div class="field">
                        <input type="text" v-model="name" name="name" placeholder="Nom de l'article">
                    </div>
                    <div class="field">
                        <select v-model="category_id" name="category_id" class="ui dropdown">
                            <option v-for="category in categories"
                                    :value="category.id"
                                    v-text="category.name"
                            >
                            </option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <textarea v-model="body" name="body" placeholder="Votre article" rows="10"></textarea>
                </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="ui violet button icon">
                      <i class="check icon"></i>
                      Mettre à jour
                  </button>
                  <button @click="isEditing" type="button" class="ui orange button icon">
                      <i class="close icon text-white"></i>
                      Annuler
                  </button>
              </div>
            </form>

            <div v-if="! editing" v-text="body"></div>

           <comments></comments>

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