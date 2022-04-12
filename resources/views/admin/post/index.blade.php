@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea un nuovo post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Titolo del post</th>
                        <th scope="col">Contenuto del post</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{substr($post->content, 0, 30)}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{isset($post->category)?$post->category->name:'N.D.'}}</td>
                                <td class="d-flex justify-content-between flex-wrap">
                                    {{-- Pulsante per visualizzare elemento --}}
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary ">Visualizza il post</a>

                                    {{-- Pulsante per modificare elemento --}}
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning ">Modifica Post</a>

                                    {{-- Pulsante per eliminare elemento --}}
                                    <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-1">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <h2>Alla fine del mese mancano: {{$diffInDays}} giorni</h2>
    </div>
@endsection