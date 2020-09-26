@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Client
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
                {!! Form::open(array('route' => 'client.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
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
                        <label class="col-md-3 control-label">Client Name</label>
                        <div class="col-md-9">
                            {!! Form::text('firstname', null, array('placeholder' => 'Client Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('firstname'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Surname</label>
                        <div class="col-md-9">
                            {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('surname'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', null, array('placeholder' => 'Client Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Mobile Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Client Mobile Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Home Number</label>
                        <div class="col-md-9">
                            {!! Form::text('home_number', null, array('placeholder' => 'Client Home Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('home_number'); ?></span>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Home Address</label>
                        <div class="col-md-9">
                            {!! Form::text('house_number', null, array('placeholder' => 'Client Home Address','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('house_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control ','id' => 'street',  'onblur'=>"distanceCalculator(4)" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('street'); ?></span>
                            
<!--                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('street'); ?></span>-->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('city'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Health Notes</label>
                        <div class="col-md-9">
                            {!! Form::text('client_health_notes', null, array('placeholder' => 'Client Health_notes','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('client_health_notes'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Level of mobility</label>
                        <div class="col-md-9">
                            {!! Form::select('mobility_level', mobilityLevel() ,null, array('placeholder' => 'Level of mobility','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('mobility_level'); ?></span>
                        </div>
                    </div>
                    
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






<div class="container-fluid">

    
<form class="form-horizontal" role="form">
    <fieldset class="address">
        <legend>Address</legend>
        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                Address
            </label>
            <div class="col-sm-6 col-md-4">
                <input class="form-control places-autocomplete" type="text" id="Street" name="Street" placeholder="" value="" autocomplete="address-line1">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                Apt/Suite #
            </label>
            <div class="col-sm-6 col-md-4">
                <input class="form-control" type="text" id="Street2" name="Street2" value="" autocomplete="address-line2">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                Postal/Zip Code
            </label>
            <div class="col-sm-2 col-md-2">
                <input class="form-control places-autocomplete" type="text" id="PostalCode" name="PostalCode" placeholder="" value="" autocomplete="postal-code">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                City
            </label>
            <div class="col-sm-4 col-md-3">
                <input class="form-control" type="text" id="City" name="City" value="" autocomplete="address-level2">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                Country
            </label>
            <div class="col-sm-4 col-md-3">
                <input class="form-control" type="text" id="Country" name="Country" value="" autocomplete="country">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-md-3">
                State/Territory
            </label>
            <div class="col-sm-4 col-md-3">
                <input class="form-control" type="text" id="State" name="State" value="" autocomplete="address-level1">
            </div>
        </div>
    </fieldset>
</form>
    
</div>







<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw"></script>-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw&libraries=places"></script>

<!--<script>
        google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            //types: ['(cities)'],
            componentRestrictions: {country: "IN"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('street'), options);
        google.maps.event.addListener(dropAutocomplete, 'place_changed', function () {
            //distanceCalculator(4);
        });
        
    });
</script>-->


<script>
var GoogleMapsDemo = GoogleMapsDemo || {};

GoogleMapsDemo.Utilities = (function () {
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

GoogleMapsDemo.Application = (function () {
    var _geocoder;
    
    var _init = function () {
        _geocoder = new google.maps.Geocoder;
        
        GoogleMapsDemo.Utilities.GetUserLocation(function (position) {
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
                // Prevent form submit when selecting from autocomplete dropdown with enter key
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
            radius: 40233.6, // 25 mi radius
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

GoogleMapsDemo.Application.Init();

</script>




<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
    });


</script>

@endsection
