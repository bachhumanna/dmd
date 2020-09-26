@extends('admin.home.template')
@section('body')

<h1 class="page-title">Company Information
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
                {!! Form::open(array('route' => 'companyinfo.store' ,'method'=>'POST','class'=>'form-horizontal')) !!}
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
                        <label class="col-md-3 control-label">Company Number</label>
                        <div class="col-md-9">
                            {!! Form::text('company_number', null, array('placeholder' => 'Company Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('company_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Registered Office</label>
                        <div class="col-md-9">
                            {!! Form::text('registered_office', null, array('placeholder' => 'Registered Office','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('registered_office'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Directors</label>
                        <div class="col-md-9">
                            {!! Form::text('directors', null, array('placeholder' => 'Directors','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('directors'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Accountants</label>
                        <div class="col-md-9">
                            {!! Form::text('accountants', null, array('placeholder' => 'Accountants','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('accountants'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lawyers</label>
                        <div class="col-md-9">
                            {!! Form::text('lawyers', null, array('placeholder' => 'Lawyers','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('lawyers'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phone_number', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Company Email</label>
                        <div class="col-md-9">
                            {!! Form::text('company_email', null, array('placeholder' => 'Company Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('company_email'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Working Hours</label>
                        <div class="col-md-9">
                            {!! Form::text('working_hours', null, array('placeholder' => 'Working Hours','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('working_hours'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Linkedin Url</label>
                        <div class="col-md-9">
                            {!! Form::text('linkedin', null, array('placeholder' => 'Linkedin','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('linkedin'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Instagram Url</label>
                        <div class="col-md-9">
                            {!! Form::text('instagram', null, array('placeholder' => 'Instagram','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('instagram'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Facebook Url</label>
                        <div class="col-md-9">
                            {!! Form::text('facebook', null, array('placeholder' => 'Facebook','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('facebook'); ?></span>
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
 

 
@endsection
