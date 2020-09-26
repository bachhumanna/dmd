<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        @if(isFranchisor())
        <li class="sidebar-search-wrapper">
            {!! Form::select('selectedFranchisees', getFranchisees() ,session()->get('selectedFranchisees'), array('class' => 'form-control franchisees_select' ,"onchange"=>'changeEvent(this.value)')) !!}
        </li>
        @endif
        
        <?php if(selectedFranchisees()){ ?>
            @include('admin.common.franchisees_menu')
        <?php }else{ ?>
            @include('admin.common.franchisor_menu')
        <?php } ?>
       

         
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<script>
    function changeEvent(id) {
        url = '{{ route("change-franchisees", 'XXX') }}'.replace('XXX', id);
        //alert(url);
        window.location = url
    }
</script>