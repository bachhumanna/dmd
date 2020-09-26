@extends('layouts.application')
@section('title', $pages->meta_title )
@section('meta')
<meta property="og:title" content="{{ @$pages->meta_title }}" />
<meta property="og:description" content="{{ @$pages->meta_description }}" />
<meta name="description" content="{{ @$pages->meta_description }}"/>
<meta name="keywords" content="{{ @$pages->meta_keyword }}" />
@endsection
@section('content')
<div class="headershadow">
    <section class="aboutUsWrap paddtb">
        <div class="container flex">
            <div class="leftAboutCnt col">
                <?= $pages->description ?>

            </div>

            <div class="rightAboutImg">
                <figure><img src="{{ @$pages->pageAttribute->right_image }}" alt=""></figure>

            </div>
        </div>
    </section>

    <section class="aboutPera">
        <div class="container">
            <div class="peragraphWrap">
                <?= @$pages->pageAttribute->about_section_one ?>

            </div>
        </div>	
    </section>	
    <section class="aboutBlogs">
        <div class="container">
            <div class="aboutblogArea flex">

                <div class="col-3 col">
                    <div class="blogsAbout">
                        <a href="#">
                            <figure>
                                <img src="{{ @$pages->pageAttribute->about_first_image }}" alt="">
                            </figure></a>
                        <h4>{{ @$pages->pageAttribute->about_first_text }}</h4>

                    </div>
                </div>
                <div class="col-3 col">
                    <div class="blogsAbout">
                        <a href="#">
                            <figure>
                                <img src="{{ @$pages->pageAttribute->about_second_image }}" alt="">
                            </figure>
                        </a>
                        <h4>{{ @$pages->pageAttribute->about_second_text }}</h4>

                    </div>
                </div>

                <div class="col-3 col">
                    <div class="blogsAbout">
                        <a href="#">
                            <figure>
                                <img src="{{ @$pages->pageAttribute->about_third_image }}" alt="">
                            </figure></a>
                        <h4>{{ @$pages->pageAttribute->about_third_text }}</h4>

                    </div>
                </div>

                <div class="col-3 col">
                    <div class="blogsAbout">
                        <a href="#"><figure>
                                <img src="{{ @$pages->pageAttribute->about_fourth_image }}" alt="">
                            </figure></a>
                        <h4>{{ @$pages->pageAttribute->about_fourth_text }} </h4>

                    </div>
                </div>


            </div>
        </div>

    </section>
</div>


@endsection
