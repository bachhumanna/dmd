@extends('admin.users.template')

@section('body')

<h1 class="page-title">LAST 30 DAYS</h1>
<div class="row">
    <div class="col-md-12">



        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>LAST 30 DAYS</div>
            </div>
            <div class="table-scrollable">
                <table class="table table-bordered table-striped table-condensed flip-content newBorder">
                    <thead class="flip-content">
                        <tr>
                            <th class="borderRight"></th>
                            <?php foreach ($allDays as $month) { ?>
                                <th colspan="2" class="border">
                                    <a href="{{ route('day-report',$month) }}">    {{ $month }} </a>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <thead class="flip-content">
                        <tr>
                            <th class="border-right">Franchise</th>
                            <?php foreach ($allDays as $month) { ?>
                            <th>Revenue</th>
                            <th class="border-right">Bookings</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt) { ?>
                            <tr>
                                <td class="border-right">{{ $dt['name'] }}</td>

                                <td>{{ showGraphData($allDays,$dt['data'],0) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],0,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],1) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],1,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],2) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],2,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],3) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],3,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],4) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],4,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],5) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],5,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],6) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],6,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],7) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],7,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],8) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],8,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],9) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],9,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],10) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],10,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],11) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],11,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],12) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],12,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],13) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],13,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],14) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],14,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],15) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],15,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],16) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],16,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],17) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],17,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],18) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],18,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],19) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],19,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],20) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],20,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],21) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],21,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],22) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],22,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],23) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],23,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],24) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],24,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],25) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],25,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],26) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],26,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],27) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],27,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],28) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],28,1) }}</td>
                                <td>{{ showGraphData($allDays,$dt['data'],29) }}</td>
                                <td class="border-right">{{ showGraphData($allDays,$dt['data'],29,1) }}</td>


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
