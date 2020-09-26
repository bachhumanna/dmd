@extends('admin.home.template')
@section('title')
Franchisor | Create
@endsection
@section('body')
<h1 class="page-title">Franchisee User
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Create
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'franchisee-user.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal', 'autocomplete'=>"off")) !!}
                <div class="form-body">






                    <?php if (!session()->get('selectedFranchisees')){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-9">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('password'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">DOB</label>
                        <div class="col-md-9">
                            {!! Form::text('dob', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date Of Birth','class' => 'form-control date-picker', 'autocomplete'=>"off")) !!}
                            <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>

                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">
                            {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'postcode','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>

                    <fieldset class="address">

                    

                     <div class="form-group">
                        <label class="col-md-3 control-label">Full Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Full Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>

<!--                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('street'); ?></span>-->
                        </div>
                    </div>
                        
                    <?php /* ?>    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Further Details</label>
                        <div class="col-md-9">

                            {!! Form::text('locality', null, array('placeholder' => 'Further Details','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>    

                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">

                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control','id' => 'City','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">

                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','id' => 'Country','autocomplete'=>"country" )) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>


<!--                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">

                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control places-autocomplete','id' => 'PostalCode','autocomplete'=>"postal-code")) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <?php */?>

                    </fieldset>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>








                    @if(franchiseeUser(true))
                    <div class="form-group">
                        <label class="col-md-3 control-label">Super Admin</label>
                        <div class="col-md-9">
                            {!! Form::select('is_super',[0=>"No",1=>'Yes'], null ,array('class' => 'form-control','id' => 'test')) !!}
                            <span class="error"><?= $errors->first('is_super'); ?></span>
                        </div>
                    </div>
<!--                    <div class="form-group"  id="hidden_div" >
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <fieldset class="scheduler-border">
                                <legend  class="scheduler-border label label-sm label-success">Role</legend>
                                <?php foreach ($allrole as $key => $role) {
                                    ?>
                                    <div class="col-md-4">
                                        <label>
                                            {{ Form::checkbox('role_id[]',$role->id,null,["class"=>"icheck checkSingle",  "data-checkbox"=>"icheckbox_square-blue"]) }}
                                            <?= $role->name ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </fieldset>
                            <span class="error"><?= $errors->first('role_id'); ?></span>
                        </div>
                    </div>  -->
                    @endif







                </div>


                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

@endsection
@section('pagescript')

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
    });
//    document.getElementById('test').addEventListener('change', function () {
//    var style = this.value == 0 ? 'block' : 'none';
//        document.getElementById('hidden_div').style.display = style;
//    });


</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
<script>
     google.maps.event.addDomListener(window, 'load', function () {
        var options = {
          //  componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);

    });
</script>

<!--
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw"></script>
<script>
var AutocompleteAddress = AutocompleteAddress || {

};

AutocompleteAddress.Utilities = (function () {
    var _getUserLocation = function (successCallback, failureCallback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                successCallback(position);
            }, function () {
                failureCallback(true);
            });
         } else {
             failureCallback(false);
         }
    };

    return {
        GetUserLocation: _getUserLocation
    }
})();

AutocompleteAddress.Application = (function () {
    var _geocoder;

    var _init = function () {
        _geocoder = new google.maps.Geocoder;

        AutocompleteAddress.Utilities.GetUserLocation(function (position) {
            var latLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            _autofillFromUserLocation(latLng);
            _initAutocompletes(latLng);
        }, function (browserHasGeolocation) {
            _initAutocompletes();
        });
    };

    var _initAutocompletes = function (latLng) {
        $('.places-autocomplete').each(function () {
            var input = this;
            var isPostalCode = $(input).is('[id$=PostalCode]');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: [isPostalCode ? '(regions)' : 'address']
            });
            if (latLng) {
                _setBoundsFromLatLng(autocomplete, latLng);
            }

            autocomplete.addListener('place_changed', function () {
                _placeChanged(autocomplete, input);
            });

            $(input).on('keydown', function (e) {
                if (e.keyCode === 13 && $('.pac-container:visible').length > 0) {
                    e.preventDefault();
                }
            });
        });
    }

    var _autofillFromUserLocation = function (latLng) {
        _reverseGeocode(latLng, function (result) {
            $('.address').each(function (i, fieldset) {
                _updateAddress({
                    fieldset: fieldset,
                    address_components: result.address_components
                });
            });
        });
    };

    var _reverseGeocode = function (latLng, successCallback, failureCallback) {
        _geocoder.geocode({ 'location': latLng }, function(results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    successCallback(results[1]);
                } else {
                    if (failureCallback)
                        failureCallback(status);
                }
            } else {
                if (failureCallback)
                    failureCallback(status);
            }
        });
    }

    var _setBoundsFromLatLng = function (autocomplete, latLng) {
        var circle = new google.maps.Circle({
            radius: 40233785441.622222, // 25 mi radius
            center: latLng
        });
        autocomplete.setBounds(circle.getBounds());
    }

    var _placeChanged = function (autocomplete, input) {
        var place = autocomplete.getPlace();
        _updateAddress({
            input: input,
            address_components: place.address_components
        });
    }

    var _updateAddress = function (args) {
        var $fieldset;
        var isPostalCode = false;
        if (args.input) {
            $fieldset = $(args.input).closest('fieldset');
            isPostalCode = $(args.input).is('[id$=PostalCode]');
            console.log(isPostalCode);
        } else {
            $fieldset = $(args.fieldset);
        }

        var $street = $fieldset.find('[id$=Street]');
        var $street2 = $fieldset.find('[id$=Street2]');
        var $postalCode = $fieldset.find('[id$=PostalCode]');
        var $city = $fieldset.find('[id$=City]');
        var $country = $fieldset.find('[id$=Country]');
        var $state = $fieldset.find('[id$=State]');

        if (!isPostalCode) {
            $street.val('');
            $street2.val('');
        }
        $postalCode.val('');
        $city.val('');
        $country.val('');
        $state.val('');

        var streetNumber = '';
        var route = '';

        for (var i = 0; i < args.address_components.length; i++) {
            var component = args.address_components[i];
            var addressType = component.types[0];

            switch (addressType) {
                case 'street_number':
                    streetNumber = component.long_name;
                    break;
                case 'route':
                    route = component.short_name;
                    break;
                case 'locality':
                    $city.val(component.long_name);
                    break;
                case 'administrative_area_level_1':
                    $state.val(component.long_name);
                    break;
                case 'postal_code':
                    $postalCode.val(component.long_name);
                    break;
                case 'country':
                    $country.val(component.long_name);
                    break;
            }
        }

        if (route) {
            $street.val(streetNumber && route
                        ? streetNumber + ' ' + route
                        : route);
        }
    }

    return {
        Init: _init
    }
})();

AutocompleteAddress.Application.Init();

</script> -->
@endsection
