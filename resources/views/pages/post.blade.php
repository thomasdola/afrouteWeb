@extends('master')


@section('content')

	<div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('posts') }}">All Posts</a>
            </li>
            <li class="active">Post Title</li>
        </ul>

            <h1 class="page-title" style="color: #ed8323;">Press Centre</h1>
        </div>




        <div class="container">
            <article class="post">
                @if ($article->article_images)
                    <header class="post-header">
                        @if ($article -> article_images -> count() == 1)
                            <img src="{{ asset('img/1200x500.png') }}" alt="Image Alternative text"/>
                        @else
                            <div class="fotorama" data-allowfullscreen="true">
                                @foreach ($article -> article_images as $e)
                                        <img src="{{ asset('img/1200x500.png') }}" alt="Image Alternative text"/>
                                @endforeach
                            </div>
                        @endif
                    </header>
                @endif
                <div class="post-inner">
                    <h4 class="post-title text-darken">{{ $article->title }}</h4>
                    <ul class="post-meta">
                        <li><i class="fa fa-calendar"></i><a href="#">{{ $article->published_at }}</a>
                        </li>
                    </ul>
                    {!! $article -> body !!}
                </div>
            </article>
        </div>

@endsection