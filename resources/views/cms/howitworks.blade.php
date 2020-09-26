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
    <section class="howWorkWrap paddtb">
        <div class="container">
            <div class="wrapArea">
                <?= $pages->description ?>
            </div>
            <div class="howItWorkList">
                
                <?php foreach($howitworks as $works){ ?>
                    <div class="col-6 col">
                    <div class="listWrap">
                        <figure><img src="{{ asset('images/howitworks/'.$works->image) }}" alt=""></figure>
                        <div class="howCnt">
                            <div class="iocnhow">
                                
                                <?php if ($works->video_link) { ?>
                                <a data-fancybox data-type="iframe" data-src="{{ $works->video_link }}?autoplay=1" href="javascript:;">
                                    <i class="{{ $works->icon }}"></i>
                                </a>
                                <?php }else{ ?>
                    
                                
                                <i class="{{ $works->icon }}"></i>
                                <?php } ?>
                            </div>
                            <div class="howContent">
                                <p class="maintext">{{ str_limit(strip_tags($works->content), $limit = 120, $end = '...') }}
                                    <a data-fancybox data-type="ajax" data-src="{{ route('popup-howitwork',['slug'=>encrypt($works->id)]) }}" href="javascript:void(0);" class="readMore"><samp>...read more</samp></a>
                                </p>
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                

            </div>
        </div>
    </section>

</div>




@endsection

@section('pagecss')
<link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css') }}">
@endsection

@section('pagescript')
<script src="{{asset('js/jquery.mCustomScrollbar.js') }}" data-rel-js></script>
<script>
     $(".howContent").mCustomScrollbar();
</script>
@endsection