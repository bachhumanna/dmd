@extends('admin.users.template')
@section('body')

    <h1 class="page-title">Agenda
        <small></small>
        @include('common.newBooking')
        @if(permit(['events.create']))
        <a href="{{ route('events.create') }}" class="btn btn-primary float-right"> Create </a>
        @endif
    </h1>
    <div class="row">
        <div class="col-md-12">



            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Agenda
                    </div>
                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>@sortablelink('title','Title')</th>
                                <th>@sortablelink('description','Description')</th>
<!--                                <th>Message</th>-->
                                <th>@sortablelink('posted_date','Date')</th>
                                <th class="align-center" style="width: 160px">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>

                                <td>{{ $model->title }}</td>
                                <td>{{strip_tags( str_limit($model->description,100,"..")) }}</td>
                                <td>{{ showDate($model->posted_date) }}</td>
<!--                                <td>{{ $model->created_at }}</td>-->
<!--                                <td>< ?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>-->

                                <td  class="align-center actionIcon">
                                    <ul>
                                        <!--
                                        <li>
                                            @if(permit(['events.show']))
                                            <a class="btn btn-success btn-xs" href="{{ route('events.show',$model->id) }}" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </li>
                                        -->

                                        <li>
                                            @if(permit(['events.edit']))
                                            <a class="btn btn-info btn-xs purple" href="{{ route('events.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </li>

                                        <?php /* <li>
                                            @if(permit(['events.destroy']))
                                                {!! Form::open(['method' => 'DELETE','route' => ['events.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                                {!! Form::submit('', ['class' => 'btn btn-danger btn-xs','title'=>'Cancel']) !!}
                                                <span class="btnIcon red" title="">
                                                    <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                                </span>
                                                {!! Form::close() !!}
                                            @endif
                                        </li> */?>
                                        <li>
                                            @if(permit(['events.destroy']))
                                                <a class="btn btn-info btn-xs purple del" data-id="<?php echo $model->id ?>" data-token="{{ csrf_token() }}" title="Cancel">
                                                    <span class="btnIcon red" title="Cancel">
                                                        <i class="fa fa-close"  aria-hidden="true"></i>
                                                    </span>
                                                </a> 
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $models->appends(Input::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".del").click(function () {

        swal({
            title: "Are you sure?",
            //text: "After click submit button this data is parmanently deleted!",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            buttons: true,

        }).then((willDelete) => {

            if (willDelete) {

                var recordID = $(this).data('id');
                var token = $(this).data("token");
                eventURL = "<?= route('events.index'); ?>/" + recordID;

                $.ajax({
                    url: eventURL,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (data)
                    {
                        console.log(data);
                        window.location.reload();

                    }
                });

            }

        });

    });
    </script>
@endsection
