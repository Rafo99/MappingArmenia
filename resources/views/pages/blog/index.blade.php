@extends('pages.layout.app')

@section('title', 'About Armenia | Blog')

@section('content')

    <div class="content">
        <div class="content-heading">
            <h2>@lang('navigation.about_armenia')</h2>
        </div>
        <div class="blogs-content">
            @foreach($blogs as $blog)
                <div class="blog">
                    <div class="blog-image">
                        <img src="{{ asset('img/blogs/'.$blog->picture) }}" alt="" style="width: 100%;">
                    </div>
                    <div class="blog-title">
                        <h3>{{ $blog->getTranslation()->title }}</h3>
                    </div>
                    <div class="blog-desc">
                        <p>{!! $blog->getTranslation()->text !!} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection