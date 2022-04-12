@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Modifica post:  {{$post->title}}</h1>

                <form method="POST" action={{route('admin.posts.update', $post->id)}}>

                    @csrf
                    @method('PUT')
                    {{-- Sezione delle varie categorie di alimenti --}}
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" id="category_id" name="category_id">

                            <option value="">Altro</option>

                            @foreach ($categories as $category)
                                <option {{(old('category_id', $post->category_id) == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    {{-- Sezione in cui andrà inserito il titolo --}}
                    <div class="form-group">
                      <label for="title">Titolo</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
                    </div>

                    {{-- Contenuto/descrizione del post --}}
                    <div class="form-group">
                        <label for="content">Contenuto del post</label>
                        <textarea class="form-control" id="content" rows="10" name="content">{{old('content', $post->content)}}</textarea>
                    </div>

                    {{-- Lista dei tag --}}
                    @foreach ($tags as $tag)

                        @if ($errors->any())
                            <div class="custom-control custom-checkbox">
                                <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array($tag->id, old('tags'))?'checked':''}}>
                                <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                            </div>
                        @else
                            <div class="custom-control custom-checkbox">
                                <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{$post->tags->contains($tag->id)?'checked':''}}  >
                                <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                            </div>
                        @endif

                    @endforeach


                    <button type="submit" class="btn btn-success">Salva le modifiche</button>


                </form>
                <a href="{{url()->previous()}}" class="btn btn-primary mt-3">Torna alla lista dei prodotti</a>
            </div>
        </div>
    </div>
@endsection
