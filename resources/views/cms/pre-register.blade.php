@extends('layouts.application')
@section('title', $pages->meta_title )
@section('meta')
<meta property="og:title" content="{{ @$pages->meta_title }}" />
<meta property="og:description" content="{{ @$pages->meta_description }}" />
<meta name="description" content="{{ @$pages->meta_description }}"/>
<meta name="keywords" content="{{ @$pages->meta_keyword }}" />
@endsection
@section('content')

<div class="headershadow paddtb">
    <section class="privacyWrap">
        <div class="container">
            <div class="heading">
                <h2><?= $pages->title ?></h2>
            </div>
            <?= $pages->description ?>
        </div>
    </section>


    <section class="aboutBlogs blogsWrap">
        <div class="hasib-load-more">
            <a href="{{ route('signup') }}" class="btn ">Register</a>
        </div>
    </section>
</div>


@endsection
