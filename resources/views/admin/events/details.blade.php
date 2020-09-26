<div class="portlet-body flip-scroll" style="width:800px">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Agenda Details
                
            </div>
            <div class="caption pull-right">
                <a href="{{ route('events.edit',$model->id) }}" title="Edit" class="event-edit pull-right"><i class="fa fa-edit"></i></a>

                 <a class="event-edit pull-right del" data-id="<?php echo $model->id ?>" data-token="{{ csrf_token() }}" title="Cancel"><i class="fa fa-close"  aria-hidden="true"></i></a>    
            </div>


        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>

                    <tr>
                        <th>Title</th>
                        <td>{{ $model->title }}</td>
                    </tr>
                    <tr>
                        <th>Agenda Date </th>
                        <td>{{ $model->posted_date }}</td>
                    </tr>
                    <tr>
                        <th>Description </th>
                        <td><?=  $model->description ?></td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(".del").click(function () {

                var recordID = $(this).data('id');
                var token = $(this).data("token");
                agendaURL = "<?= route('events.index'); ?>/" + recordID;

                $.ajax({
                    url: agendaURL,
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
            
    });
</script>