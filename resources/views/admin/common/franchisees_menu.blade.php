
<li class="nav-item start {{ menuActiveClass(['admin'],true) }}">
    <a href="{{ route('admin') }}" class="nav-link nav-toggle">
        <i class="fa fa-area-chart"></i>
        <span class="title">Insight</span>
        <span class="selected"></span>

    </a>

</li>
@if(permit(['faq.index']) || permit(['companyinfo']) || permit(['business-details']) || permit(['teams.index']) || permit(['faq.index']) )
<li class="nav-item  {{ menuActiveClass(['faq','role','franchisee','franchisees-price','companyinfo','teams','companyinfo','companyinfo-edit','business-details'],true) }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-briefcase"></i>
        <span class="title">Information</span>
        <span class="arrow {{ menuActiveClass(['role','general-setting','teams.index','franchisee','companyinfo','companyinfo-edit','business-details'],true) }}"></span>
    </a>
    <ul class="sub-menu">


        @if(permit(['companyinfo']))
        <li class="nav-item {{ menuActiveClass(['companyinfo','companyinfo-edit'],true) }} ">
            <a href="{{ route('companyinfo') }}" class="nav-link ">
                <span class="title">Company Details </span>
            </a>
        </li>
        @endif
        @if(permit(['business-details']))
        <li class="nav-item {{ menuActiveClass(['business-details'],true) }} ">
            <a href="{{ route('business-details') }}" class="nav-link ">
                <span class="title">Pricing Structure</span>
            </a>
        </li>
        @endif

        @if(permit(['teams.index']))
        <li class="nav-item  {{ menuActiveClass(['teams'],true) }}">
            <a href="{{ route('teams.index') }}" class="nav-link ">
                <span class="title">UK Team</span>                
            </a>
        </li>
        @endif      
        @if(permit(['faq.index']))
        <li class="nav-item  {{ menuActiveClass(['faq'],true) }}">
            <a href="{{ route('faq.index') }}" class="nav-link ">
                <span class="title">FAQ and Help</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(permit(['staff.index']))
<li class="nav-item  {{ menuActiveClass(['users','franchisee-user','franchisor','driver','drivers-vehicles','companion','staff'],true) }} ">
    <a href="{{ route('staff.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span class="title">Staff</span>
        <span class="  {{ menuActiveClass(['users','franchisee-user','franchisor','driver','drivers-vehicles','companion','staff'],true) }}"></span>
    </a>
    <!--    <ul class="sub-menu">  
            
            <li class="nav-item {{ menuActiveClass(['staff'],true) }} ">
                <a href="{{ route('staff.index') }}" class="nav-link ">
                    <span class="title">All Staff</span>
                </a>
            </li>
            
    <?php /*
      <li class="nav-item {{ menuActiveClass(['all-staff'],true) }} ">
      <a href="{{ route('all-staff') }}" class="nav-link ">
      <span class="title">All Staff</span>
      </a>
      </li>
     */ ?>
            @if(permit(['franchisee-user.index']))
            <li class="nav-item {{ menuActiveClass(['franchisee-user'],true) }} ">
                <a href="{{ route('franchisee-user.index') }}" class="nav-link ">
                    <span class="title">Staff</span>
                </a>
            </li>
            @endif
            
            @if(permit(['driver.index']))
            <li class="nav-item {{ menuActiveClass(['driver'],true) }} ">
                <a href="{{ route('driver.index') }}" class="nav-link ">
                    <span class="title">Companion Drivers</span>
                </a>
            </li>
            @endif
            
            @if(permit(['companion.index']))
            <li class="nav-item {{ menuActiveClass(['companion'],true) }} ">
                <a href="{{ route('companion.index') }}" class="nav-link ">
    
                    <span class="title">Companion</span>
                </a>
            </li>
            @endif
           
        </ul>-->
</li>
@endif


@if(permit(['booking.index']) || permit(['booking.completed']) || permit(['booking.cancelled']) || permit(['quotes.index']))
<li class="nav-item  {{ menuActiveClass(['booking','enquiry','completed','cancelled','quotes'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-tag" aria-hidden="true"></i>
        <span class="title">Bookings</span>
        <span class="arrow {{ menuActiveClass(['booking','enquiry'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        @if(permit(['booking.index']))
        <li class="nav-item  {{ menuActiveClass(['booking'],true) }}">
            <a href="{{ route('booking.index') }}" class="nav-link ">
                <!--<span class="title">Open</span>-->
                <span class="title">Manage Bookings</span>
            </a>
        </li>
        @endif
        @if(permit(['booking.completed']))
        <li class="nav-item  {{ menuActiveClass(['completed'],true) }}">
            <a href="{{ route('booking.completed') }}" class="nav-link ">
                <span class="title">Completed</span>
            </a>
        </li>
        @endif
        @if(permit(['booking.cancelled']))
        <li class="nav-item  {{ menuActiveClass(['cancelled'],true) }}">
            <a href="{{ route('booking.cancelled') }}" class="nav-link ">
                <!--<span class="title">Cancelled</span>-->
                <span class="title">Cancelled Bookings</span>
            </a>
        </li>
        @endif
        @if(permit(['quotes.index']))
        <li class="nav-item  {{ menuActiveClass(['quotes'],true) }}">
            <a href="{{ route('quotes.index') }}" class="nav-link ">            
                <span class="title">Quotes</span>
            </a>
        </li>
        @endif
    </ul>
</li>
 @endif

@if(permit(['events.index']) || permit(['calender']) || permit(['driver-calender']))
<li class="nav-item  {{ menuActiveClass(['events','calender','driver-calender'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
        <span class="title">Calendars</span>
        <span class="arrow {{ menuActiveClass(['events','calender','driver-calender'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        @if(permit(['events.index']))
        <!-- <li class="nav-item  {{ menuActiveClass(['events'],true) }}">
            <a href="{{ route('events.index') }}" class="nav-link ">
                <span class="title">Agenda</span>
            </a>
        </li> -->
        @endif

        @if(permit(['calender']))
        <li class="nav-item  {{ menuActiveClass(['calender'],true) }}">
            <a href="{{ route('calender-hasib') }}" class="nav-link ">            
                <span class="title">Hasib</span>
            </a>
        </li>
        @endif

        @if(permit(['calender']))
        <li class="nav-item  {{ menuActiveClass(['calender'],true) }}">
            <a href="{{ route('calender') }}" class="nav-link ">            
                <span class="title">Bookings</span>
            </a>
        </li>
        @endif
        @if(permit(['driver-calender']))
        <li class="nav-item  {{ menuActiveClass(['driver-calender'],true) }}">
            <a href="{{ route('driver-calender') }}" class="nav-link ">            
                <span class="title">Companion Drivers</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if( permit(['invoice.index']) || permit(['invoice.uninvoiced']) || permit(['invoice.paid']) || permit(['invoice.aged-debtors']) )
<li class="nav-item  {{ menuActiveClass(['invoice','uninvoiced','paid', 'aged-debtors'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-gbp"></i>
        <span class="title">Invoicing</span>
        <span class="arrow {{ menuActiveClass(['invoice'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        
        {{--@if(permit(['invoice.uninvoiced']))
        <li class="nav-item   ">
            <a href="{{ route('invoice.uninvoiced') }}" class="nav-link nav-toggle">
                <!--<span class="title">Uninvoiced</span>-->
                <span class="title">Processing</span>
            </a>            
        </li>
        @endif --}}

        @if(permit(['invoice.uninvoiced']))
        <li class="nav-item  {{ menuActiveClass(['uninvoiced'],true) }}">
            <a href="{{ route('invoice.uninvoiced') }}" class="nav-link ">               
                <span class="title">Processing</span>
            </a>
        </li>
        @endif

        {{--@if(permit(['invoice.index']))
        <li class="nav-item    ">
            <a href="{{ route('invoice.index') }}" class="nav-link nav-toggle">                
                <span class="title">Debtors</span>
            </a>            
        </li>
        @endif --}}

        @if(permit(['invoice.index']))
        <li class="nav-item  {{ menuActiveClass(['invoice'],true) }}">
            <a href="{{ route('invoice.index') }}" class="nav-link ">               
                <span class="title">Debtors</span>
            </a>
        </li>
        @endif

        @if(permit(['invoice.aged-debtors']))
        <li class="nav-item  {{ menuActiveClass(['aged-debtors'],true) }}">
            <a href="{{ route('invoice.aged-debtors') }}" class="nav-link ">               
                <span class="title">Aged Debtors</span>
            </a>
        </li>
        @endif

        {{--@if(permit(['invoice.paid']))
        <li class="nav-item    ">
            <a href="{{ route('invoice.paid') }}" class="nav-link nav-toggle">
                <!--<span class="title">Paid invoices</span>-->
                <span class="title">Paid</span>
            </a>            
        </li>
        @endif --}}

        @if(permit(['invoice.paid']))
        <li class="nav-item  {{ menuActiveClass(['paid'],true) }}">
            <a href="{{ route('invoice.paid') }}" class="nav-link ">               
                <span class="title">Paid</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(permit(['client.index']))
<li class="nav-item {{ menuActiveClass(['client'],true) }} ">
    <a href="{{ route('client.index') }}" class="nav-link ">
        <i class="fa fa-user"></i>
        <span class="title">Clients</span>
    </a>
</li>
@endif

@if(permit(['vehicles.index']))
<li class="nav-item  {{ menuActiveClass(['vehicles'],true) }} ">
    <a href="{{ route('vehicles.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-taxi" aria-hidden="true"></i>
        <span class="title">Vehicles</span>
    </a>            
</li>
@endif
 
@if(permit(['vehicles-tracking']))
<li class="nav-item  {{ menuActiveClass(['vehicles-tracking'],true) }} ">
    <a href="{{ route('vehicles-tracking') }}" class="nav-link nav-toggle">
        <i class="fa fa-crosshairs"></i>
        <span class="title">Tracking</span>

    </a>            
</li>
@endif

@if(permit(['import-index']))
<li class="nav-item  {{ menuActiveClass(['import-index'],true) }} ">
    <a href="{{ route('import-index') }}" class="nav-link nav-toggle">
        <i class="fa fa-download"></i>
        <span class="title">Import Data</span>
    </a>            
</li>
@endif