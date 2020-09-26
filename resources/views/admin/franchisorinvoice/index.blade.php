@extends('admin.users.template')

@section('body')

<h1 class="page-title">Franchisee Invoicing
    <small></small>
    <a href="{{ route('franchisor-invoice.createbulk') }}" class="btn btn-primary float-right" style="margin-left: 10px">  Bulk Invoice</a>
    @if(permit(['franchisor-invoice.create']))
<!--    <a href="{{ route('franchisor-invoice.create') }}" class="btn btn-primary float-right"> Create </a>-->
    @endif
</h1>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Franchisee Invoicing</div>
            </div>
            
            <?php if($monthView){ ?>
                <?php 
                    $showEdit = 0;
                    foreach($models as $model){
                       if(count($model->invoiceDetailsCustom)){
                           $showEdit = 1;
                       }
                    }
                
                ?>
            
                <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Franchisee</th>
                            <th>Date</th>
                            <th>Turnover</th>
                            <th>Franchise Fee</th>
                            <?php foreach($allFees as $f){ ?>
                            <th>{{ $f }}</th>
                            <?php } ?>
<!--                            <th>Comment</th>-->
                            <?php if($showEdit){ ?>
                            <th>Edit</th>
                            <?php } ?>
                            <th>VAT</th>
                            <th>Total Amount</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <th>{{ $model->franchisees->name }}</th>                            
                            <td>{{ date("F", mktime(0, 0, 0,$model->invoice_for_month, 10)) }}  {{ $model->invoice_for_year}}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ number_format($model->turnover,2) }}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ number_format($model->standard_fee + $model->commission,2) }}</td>
                            <?php foreach($allFees as $key =>$f){ ?>
                                <td>{{env('CURRENCY_SYM')}}{{ getFeeFromData($model->invoiceDetails, $key) }}</td>
                            <?php } ?>

<!--                            <td>{{ $model->comment }}</td>-->
                                <?php if($showEdit){ ?>
                            <td>
                                <?php 
                                    $value = 0;
                                    if(count($model->invoiceDetailsCustom)){
                                        foreach($model->invoiceDetailsCustom as $custom){
                                            $value +=  $custom->amount;
                                        }
                                        echo env('CURRENCY_SYM').$value ;
                                    }else{
                                        echo "Do Not";
                                    }
                                ?>
                                
                            
                            </td>
                                <?php } ?>
                            <td>
                                <?php 
                                if($model->VAT){
                                   echo env('CURRENCY_SYM'). number_format($model->VAT,2);
                                }else{
                                    echo "Do Not";
                                }
                                
                                ?>
                            </td>
                            <td>{{env('CURRENCY_SYM')}}{{ number_format($model->amount,2)}}</td>
                            
                            <td  class="align-center actionIcon">
                                
                                <ul>

                                    
                                    <?php if($model->finalised == 0){ ?>
                                    <li>    
                                        <a class="btn btn-primary btn-xs" href="{{ route('franchisor-invoice.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>    
                                        <a class="btn btn-primary btn-xs" href="{{ route('franchisor-invoice-pdf',$model->id) }}"title="Invoice"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </a>
                                    </li>


                                    <!-- <li>
                                        
                                            {!! Form::open(['method' => 'DELETE','route' => ['franchisor-invoice.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                            {!! Form::submit('', ['class' => 'btn btn-danger btn-xs','title'=>'Delete']) !!}
                                            <span class="btnIcon red" title="">
                                                <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                            {!! Form::close() !!}
                                        
                                    </li>-->

                                </ul>
                                
                             </td>
                      
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <h1 class="page-title">&nbsp;
                        <small></small>
                         <?php  if($models->count()){ ?>
                        
                        <div class="float-right">
                            {!! Form::open(['method' => 'post','route' => ['franchisor-invoice.finalised'],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                            {!! Form::hidden('invoice_for_month', $_GET['month'], array('class' => 'form-control')) !!}
                            {!! Form::hidden('invoice_for_year',  $_GET['year'], array('class' => 'form-control')) !!}
                            {!! Form::submit('Finalised', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </div>
                         <?php } ?>
                        
                    </h1>
                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
            <?php }else{ ?>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            
                            <th>Invoice For</th>
                            <th>Number of invoices</th>
                            <th>Total Amount</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($models as $model)
                        <tr>                          
                            <td>
                                <a href="{{ route('franchisor-invoice.index',['month'=>$model->invoice_for_month,'year'=>$model->invoice_for_year]) }}">
                                {{ date("F", mktime(0, 0, 0,$model->invoice_for_month, 10)) }}  {{ $model->invoice_for_year }}
                                </a>
                            </td>
                            <td>{{ $model->count }}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ number_format($model->amount,2)}}</td>
                            
                                
                                       
                             <td>
                                 <?php 
                                    if($model->finalised == $model->count){
                                 ?>
                                 
                                 <a href="<?= route('generate',['month'=>$model->invoice_for_month,'year'=>$model->invoice_for_year]) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> |
                                 <a href="<?= route('generate-email',['month'=>$model->invoice_for_month,'year'=>$model->invoice_for_year]) ?>""><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                 <a href="{{ route('franchisor-invoice.index',['month'=>$model->invoice_for_month,'year'=>$model->invoice_for_year]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <?php } ?>
                             </td>
                                
                           
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
            
            <?php } ?>
        </div>
    </div>
</div>



@endsection