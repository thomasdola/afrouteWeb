@extends('master')


@section('content')

	<div class="container">
            <h1 class="page-title">Press Center</h1>
        </div>




        <div class="container">
            <!-- START BLOG POST -->
            @foreach ($posts as $post)
                <div class="article post">
                    @if ($post -> article_images -> count() == 1)

                        <header class="post-header">
                            <a class="hover-img" href="#">
                                <img src="{{ asset('$post -> article_images[0]->path') }}" alt="Image Alternative text" title="196_365" /><i class="fa fa-link box-icon-# hover-icon round"></i>
                            </a>
                        </header>
                    @endif
                    
                    <div class="post-inner">
                        <h4 class="post-title"><a class="text-darken" href="#">{{ $post->title }}</a></h4>
                        <ul class="post-meta">
                            <li><i class="fa fa-calendar"></i><a href="#">{{ $post->published_at }}</a>
                            </li>
                        </ul>
                        {{-- <p class="post-desciption">Ut luctus rhoncus proin mattis aenean cubilia molestie velit tincidunt hac vehicula nisl mi metus dictum fames ullamcorper eget velit interdum mauris nam malesuada purus fames consectetur mi per quam volutpat erat ad semper risus integer cubilia vitae natoque dignissim tempus dignissim venenatis fringilla nec varius ante aptent augue dictumst</p> --}}<a class="btn btn-small btn-primary" href="{{ route('post', ['slug'=>$post->slug]) }}">Read</a>
                    </div>
                </div>
            @endforeach
            <!-- END BLOG POST -->
            {{-- <ul class="pagination">
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li><a href="#">6</a>
                </li>
                <li><a href="#">7</a>
                </li>
                <li class="dots">...</li>
                <li><a href="#">43</a>
                </li>
                <li class="next"><a href="#">Next Page</a>
                </li>
            </ul> --}}
        </div>		

@endsection