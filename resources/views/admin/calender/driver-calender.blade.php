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
                    <div class="col-md-3">
                        {!! Form::select('driver_id',$allDriver, null ,array('class' => 'form-control all_driver','placeholder'=>"All Driver",'onchange'=>'driverChange(this.value)')) !!}
                    </div>
                </div>

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<div class="element"></div>

@endsection
@section('pagescript')
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src='{{ asset("admin/fullcalender/moment.min.js") }}'></script>
<script src='{{ asset("admin/fullcalender/fullcalendar.min.js") }}'></script>
<script src='{{ asset("admin/fullcalender/scheduler.min.js") }}'></script>

<script>

    function driverChange(_value) {
        url = '{{ route("driver-calender",["driver_id"=>""]) }}';
        window.location = url + _value;
    }

    $(function () { // document ready

        $('#calendar').fullCalendar({
            eventClick: function (calEvent, jsEvent, view) {
                $(this).css('border-color', 'red');
                url = '{{ route("boking-details", 'XXX') }}'.replace('XXX', calEvent.id);
                $.fancybox.destroy();
                element = '<a id="openFancybox"  data-type="ajax" data-src="' + url + '" href="javascript:;"></a>'
                $(".element").html(element);
                $("#openFancybox").fancybox();
                $("#openFancybox").click();
            },

            eventDrop: function (event, delta, revertFunc) {


                if (confirm("Are you sure about this change?"+ " was dropped on " + event.start.format())) {
                    changeBooking(event, delta, revertFunc);
                }

            },
            //  now: '2018-11-07',
            editable: true, // enable draggable events
            aspectRatio: 2.5,
            scrollTime: '10:00', // undo default 6am scrollTime
            header: {
                left: 'today, prev,next',
                center: 'title',
                right: 'timelineMonth,timelineWeek,timelineDay'
            },
            defaultView: 'timelineMonth',
            views: {
                timelineThreeDays: {
                    type: 'timeline',
                    duration: {days: 3}
                }
            },
            resourceLabelText: 'Drivers',
//            resources: [
//                {id: 'a', title: 'Auditorium A'},
//                {id: 'b', title: 'Auditorium B'},
//                {id: 'c', title: 'Auditorium C'},
//            ],
//            events: [
//                {resourceId: 'a', start: '2018-11-16T02:00:00', end: '2018-11-16T07:00:00', title: 'event 1'},
//            ]
            resources: <?= json_encode($resources) ?>,
            events: <?= json_encode($events) ?>
        });
    });


    function changeBooking(event, delta, revertFunc) {
        console.log(event)
        $.ajax({
            dataType: "json",
            //method: "POST",
            url: '{{ route("update-booking") }}',
            data: {type: event.type ,bookingId: event.id,resourceId: event.resourceId, booking_time: event.start.format()},
            success: function (result) {
                console.log(result);
                if (result.status == 1) {
                    swal("Success!", "", "success");
                }else{
                    revertFunc();
                    swal(result.message)

                }
            },
        });

    }

    setInterval(function(){$(".fc-license-message").hide()}, 1000);
    $( document ).ready(function() {

      setInterval(function(){ $(".fc-resource-area").css("width","150px"); }, 300);


        $('#datepicker').datepicker({
            inline: true,
            onSelect: function(dateText, inst) {
                var d = new Date(dateText);
                $('#calendar').fullCalendar('gotoDate', d);
            }
        });
    });
</script>



@endsection

@section('pagestyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
<link href='{{ asset("admin/fullcalender/fullcalendar.min.css") }}' rel='stylesheet' />
<link href='{{ asset("admin/fullcalender/fullcalendar.print.min.css") }}' rel='stylesheet' media='print' />
<link href='{{ asset("admin/fullcalender/scheduler.min.css") }}' rel='stylesheet' />
@endsection
