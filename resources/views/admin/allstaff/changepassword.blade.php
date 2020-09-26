
<div class="changepasswordPopup">
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Change Password
                </div>
            </div>
            <div class="portlet-body form">

                <form id="changepassword" action="javascript:void(0)" class='form-horizontal'>
                    {{ csrf_field() }}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-8">
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                <span class="bg-danger validation_error error_password"><?= $errors->first('password'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Retype Password</label>
                            <div class="col-md-8">
                                {!! Form::password('re_password',  array('placeholder' => 'Re Enter Password','class' => 'form-control date-picker')) !!}
                                <span class="bg-danger validation_error error_re_password"><?= $errors->first('re_password'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions textRight">
                        <button type="submit" class="btn green" onclick="changePass()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
</div>
<script>
    function changePass() {

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "{{ route('staff-changepassword',$id) }}",
            data: $('#changepassword').serialize(),
            success: function (response) {
                if (response.response == 0) {
                    $.each(response.errors, function (key, value) {
                        key = key.replace(".", "_");
                        $(".error_" + key).html(value);
                    });
                } else if (response.response == 1) {
                    $.fancybox.close();
                    swal("Success!", response.message);
                } else {
                    alert(response.message);
                }

            },
        });
        return false;

    }
</script>
