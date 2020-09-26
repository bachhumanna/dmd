@extends('admin.calender.template')
@section('body')
<h1 class="page-title">
    <small></small>
    @include('common.newBooking')

</h1>
<h1 class="page-title">Calender</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box ">
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group input-medium date date-picker">
                            <input type="text" class="form-control"  id="datepicker">
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
               <?php //pr($calendar->getId());exit; ?>
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>
    </div>
</div>
<div class="element">

</div>
<!--<a id="openFancybox"  data-type="ajax" data-src="" href="javascript:;">
	AJAX content
</a>-->

@endsection
@section('pagescript')
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script>

function openEventPopup(event){
    if(event.type ==1){
        url = '{{ route('boking-details', 'XXX') }}'.replace('XXX', event.id);
    }else if(event.type ==2){
        url = '{{ route('event-details', 'XXX') }}'.replace('XXX', event.id);
    }

    $.fancybox.destroy();

    element = '<a id="openFancybox"  data-type="ajax" data-src="'+url+'" href="javascript:;"></a>'
    $(".element").html(element);
    $("#openFancybox").fancybox();
    $("#openFancybox").click();

}

   // $.fancybox.destroy();

     $( document ).ready(function() {
       $('#datepicker').datepicker({
            inline: true,
            onSelect: function(dateText, inst) {
                var d = new Date(dateText);
                $('#calendar-{{ $calendar->getId() }}').fullCalendar('gotoDate', d);
            }
        });
    });
</script>
@endsection

@section('pagestyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@endsection
