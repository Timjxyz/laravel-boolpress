@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>{{$post->title}}</h1>
                <div><strong>Titolo: </strong> {{$post->title}}</div>
                <div><strong>Contenuto: </strong> {!! $post->content !!}</div>
                <div><strong>Slug: </strong> {{$post->slug}}</div>
                <div><strong>Categoria: </strong> {{isset($post->category)?$post->category->name:'Altro'}}</div>
                <div><strong>Il post è stato scritto: </strong> {{$diffInDays}} giorni fa</div>
                <div>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-primary">{{$tag->name}}</span>
                    @endforeach
                </div>

                <a href="{{url()->previous()}}" class="btn btn-primary">Torna in dietro</a>
            </div>
        </div>
    </div>
@endsection
