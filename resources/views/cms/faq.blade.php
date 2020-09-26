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

    <div class="container accordianWrap">
        <?php foreach ($faqs as $faq) { ?>
            <div class="faqList">
                <span class="title">{{ $faq->question }}</span>
                <div class="faqDesc">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    $('.faqList .title').click(function () {
        $(this).toggleClass('active');
        $(this).next('.faqDesc').slideToggle(200);
        $(this).parent('.faqList').nextAll('.faqList').children('.faqDesc').slideUp(200);
        $(this).parent('.faqList').prevAll('.faqList').children('.faqDesc').slideUp(200);
        $(this).parent('.faqList').nextAll('.faqList').children('.title').removeClass('active');
        $(this).parent('.faqList').prevAll('.faqList').children('.title').removeClass('active');
    });
    $('.faqList:first-child .title').addClass('active');
    $('.faqList:first-child .faqDesc').show(0);

</script>
@endsection
