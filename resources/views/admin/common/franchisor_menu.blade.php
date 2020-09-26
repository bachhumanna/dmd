
<li class="nav-item start {{ menuActiveClass(['admin'],true) }}">
    <a href="{{ route('admin') }}" class="nav-link nav-toggle">
        <i class="fa fa-area-chart "></i>
        <span class="title">Insight</span>
        <span class="selected"></span>

    </a>

</li>
<li class="nav-item  {{ menuActiveClass(['faq','role','email-template','general-setting','subscription-plan','franchisees-price','companyinfo','teams','companyinfo','companyinfo-edit'],true) }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-briefcase"></i>
        <span class="title">Company Information</span>
        <span class="arrow {{ menuActiveClass(['role','email-template','general-setting','teams.index','companyinfo','companyinfo-edit'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        @if(isSuperAdmin())
        <li class="nav-item  {{ menuActiveClass(['companyinfo','companyinfo-edit'],true) }}">
            <a href="{{ route('companyinfo') }}" class="nav-link ">
                <span class="title">Company Details</span>
            </a>
        </li>
        @endif 
        <li class="nav-item  {{ menuActiveClass(['teams'],true) }}">
            <a href="{{ route('teams.index') }}" class="nav-link ">
                <span class="title">UK Team</span>
            </a>
        </li>
        @if(permit(['faq.index']))
        <li class="nav-item  {{ menuActiveClass(['faq'],true) }}">
            <a href="{{ route('faq.index') }}" class="nav-link ">
                <span class="title">FAQ</span>
            </a>
        </li>
        @endif                
        @if(permit(['role.index']))
        <li style="" class="nav-item  {{ menuActiveClass(['role'],true) }}">
            <a href="{{ route('role.index') }}" class="nav-link ">
                <span class="title">Role</span>
            </a>
        </li>
        @endif 


        @if(permit(['email-template.index']))
        <li class="nav-item  {{ menuActiveClass(['email-template'],true) }}" style="display: none">
            <a href="{{ route('email-template.index') }}" class="nav-link ">
                <span class="title">Email Template</span>
            </a>
        </li>
        @endif 
    </ul>
</li>
<li class="nav-item  {{ menuActiveClass(['franchisor-invoiceprice','franchisor-invoice'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa fa-gbp"></i>
        <span class="title">Invoicing</span>
        <span class="arrow {{ menuActiveClass(['franchisor-invoiceprice','franchisor-invoice'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item  {{ menuActiveClass(['franchisor-invoiceprice'],true) }} ">
            <a href="{{ route('franchisor-invoiceprice.index') }}" class="nav-link nav-toggle">
                <span class="title">Fees</span>
            </a>            
        </li>
        <li class="nav-item  {{ menuActiveClass(['franchisor-invoice'],true) }} ">
            <a href="{{ route('franchisor-invoice.index') }}" class="nav-link nav-toggle">
                <span class="title">Invoices</span>
            </a>            
        </li>
    </ul>
</li>


<li class="nav-item  {{ menuActiveClass(['franchisor','franchisee','franchisees-price','client','booking','enquiry','driver','quotes','vehicles','companion'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa  fa-sitemap" aria-hidden="true"></i>
        <span class="title">Franchisees</span>
        <span class="arrow {{ menuActiveClass(['franchisor','franchisee','companion','franchisees-price','booking','enquiry','quotes','driver','vehicles','companion'],true) }}"></span>
    </a>
    <ul class="sub-menu">
        @if(permit(['franchisee.index']))
        <li class="nav-item  {{ menuActiveClass(['franchisee'],true) }} ">
            <a href="{{ route('franchisee.index') }}" class="nav-link nav-toggle">
                <span class="title">Franchisees</span>
            </a>            
        </li>
        @endif
        @if(permit(['client.index']))
        <li class="nav-item {{ menuActiveClass(['client'],true) }} ">
            <a href="{{ route('client.index') }}" class="nav-link ">
                <span class="title">Clients</span>
            </a>
        </li>
        @endif
        @if(permit(['booking.index']))
        <li class="nav-item  {{ menuActiveClass(['booking'],true) }}">
            <a href="{{ route('booking.index') }}" class="nav-link ">
                <span class="title">Bookings</span>
            </a>
        </li>
        @endif
        
<!--        @if(permit(['enquiry.index']))
        <li class="nav-item  {{ menuActiveClass(['enquiry'],true) }}">
            <a href="{{ route('enquiry.index') }}" class="nav-link ">            
                <span class="title">Quotes</span>
            </a>
        </li>
        @endif-->
        
        @if(permit(['quotes.index']))
        <li class="nav-item  {{ menuActiveClass(['quotes'],true) }}">
            <a href="{{ route('quotes.index') }}" class="nav-link ">            
                <span class="title">Quotes</span>
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

        @if(permit(['franchisor.index']))
        <li class="nav-item {{ menuActiveClass(['franchisor'],true) }} ">
            <a href="{{ route('franchisor.index') }}" class="nav-link ">
                <span class="title">Staff</span>
            </a>
        </li>
        @endif



        @if(permit(['vehicles.index']))
        <li class="nav-item  {{ menuActiveClass(['vehicles'],true) }} ">
            <a href="{{ route('vehicles.index') }}" class="nav-link nav-toggle">
                <span class="title">Vehicles</span>

            </a>            
        </li>
        @endif
        @if(permit(['franchisees-price.index']))
        <li style="" class="nav-item  {{ menuActiveClass(['franchisees-price'],true) }}">
            <a href="{{ route('franchisees-price.index') }}" class="nav-link ">
                <span class="title">Pricing</span>
            </a>
        </li>                
        @endif 
    </ul>
</li>









<li class="nav-item  {{ menuActiveClass(['events','calender','driver-calender'],true) }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-calendar-plus-o"></i>
        <span class="title">Calendars</span>
        <span class="arrow {{ menuActiveClass(['events','calender','driver-calender'],true) }}"></span>
    </a>
    <ul class="sub-menu">



        @if(permit(['events.index']))
        <li class="nav-item  {{ menuActiveClass(['events'],true) }}">
            <a href="{{ route('events.index') }}" class="nav-link ">

                <span class="title">UK Agenda</span>
            </a>
        </li>
        @endif
        @if(permit(['calender']))
        <li class="nav-item  {{ menuActiveClass(['calender'],true) }} ">
            <a href="{{ route('calender') }}" class="nav-link nav-toggle">
                <span class="title">Agenda Calender</span>

            </a>            
        </li>
        @endif

        @if(permit(['driver-calender']))
<!--        <li class="nav-item  {{ menuActiveClass(['driver-calender'],true) }} ">
            <a href="{{ route('driver-calender') }}" class="nav-link nav-toggle">
                <span class="title">Driver Calender</span>

            </a>            
        </li>-->
        @endif
    </ul>
</li>












 
 

@if(permit(['vehicles-tracking']))
<li class="nav-item  {{ menuActiveClass(['vehicles-tracking'],true) }} ">
    <a href="{{ route('vehicles-tracking') }}" class="nav-link nav-toggle">
        <i class="fa fa-car"></i>
        <span class="title">Vehicles Tracking</span>

    </a>            
</li>
@endif
