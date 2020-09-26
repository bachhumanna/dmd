@if(permit(['booking.create']))
<a href="{{ route('booking.create') }}" class="btn btn-primary float-right" style="margin-left: 10px; "> New Booking </a>
<a href="{{ route('booking.quick-create') }}" class="btn btn-primary float-right" style="margin-left: 10px; "> Quick Booking </a>
@endif