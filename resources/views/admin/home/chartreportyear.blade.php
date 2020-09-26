@extends('admin.users.template')

@section('body')

<h1 class="page-title">LAST 12 MONTHS</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>LAST 12 MONTHS</div>
            </div>
            <div class="table-scrollable">
                <table class="table table-bordered table-striped table-condensed flip-content newBorder">
                    <thead class="flip-content">
                        <tr>
                            <th class="borderRight"></th>
                            <?php foreach ($yearMonth as $month) { ?>
                            <th colspan="2" class="border"><a href="{{ route('month-report',$month) }}">{{ $month }}</a></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <thead class="flip-content">
                        <tr>
                            <th class="border-right">Franchise</th>
                            <?php foreach ($yearMonth as $month) { ?>
                            <th>Revenue</th>
                            <th class="border-right">Bookings</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt) { 
                                
                            ?>
                            <tr>
                                <td class="border-right">{{ $dt['name'] }}</td>

                                <td>{{ showGraphData($yearMonth,$dt['data'],0) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],0,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],1) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],1,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],2) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],2,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],3) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],3,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],4) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],4,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],5) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],5,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],6) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],6,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],7) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],7,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],8) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],8,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],9) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],9,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],10) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],10,1) }}</td>
                                <td>{{ showGraphData($yearMonth,$dt['data'],11) }}</td>
                                <td class="border-right">{{ showGraphData($yearMonth,$dt['data'],11,1) }}</td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<style>
	table.newBorder th.border{
		border: 1px solid #32c5d2 !important;
		border-right-width:0px !important;
                text-align: center;
	}
	table.newBorder th.borderRight{
		border-right: 1px solid #32c5d2 !important;
	}
	table.newBorder th.border:last-child{
		border-right-width:1px !important;
	}
	table.newBorder th.border-right,
	table.newBorder td.border-right{
		border-right: 1px solid #32c5d2 !important;
	}
	.table-bordered,
	.table-bordered>tbody>tr>td,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>td,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>thead>tr>th{
		border: 1px solid #cccccc;
	}
	/*.table-scrollable>.table.newBorder{
		border-bottom: 10px solid transparent;
	}*/
	table.newBorder tbody tr:last-child td,
	table.newBorder tbody tr:last-child th{
		border-bottom: 1px solid #32c5d2 !important;
	}
		
</style>
@endsection
