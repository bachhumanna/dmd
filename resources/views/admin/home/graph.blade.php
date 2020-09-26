
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<?php $chartReportDataYear = chartReportYear(); ?>
<?php if (count($chartReportDataYear['labels'])) { ?>

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 12 Months</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <a href="{{ route('chart-report-year') }}">
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="year_sale" style="height:100px;" ></canvas>
                    </div>
                </a>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>






    <script>
        var ctx = document.getElementById("year_sale");
        var barChart = new Chart(ctx, {
        type: 'bar',
                data: {
                labels: <?= json_encode($chartReportDataYear['labels']) ?>,
                        datasets: <?= json_encode($chartReportDataYear['data']) ?>,
                },
                options: {
                legend: {
                display: false
                },
                        tooltips: {
                        enabled: true,
                                mode: 'single',
                                callbacks: {
                                label: function (tooltipItems, data) {
                                return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                                }
                                }
                        },
                        scales: {
                        yAxes: [{
                        ticks: {
                        beginAtZero: true
                        }
                        }]
                        }
                }
        });</script>
<?php } ?>


    <?php $weeklypricebookingData = weeklyPriceBooking(); ?>
    
<?php if (count($weeklypricebookingData['labels'])) { ?>


    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Weekly Booking</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
<!--                <a href="{{route('chart-report-month')}}">-->
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="barChartf" style="height:100px;" ></canvas>
                    </div>
<!--                </a>-->
            </div>
        </div>
        <!-- END PORTLET-->
    </div>


    <script>
        var ctx = document.getElementById("barChartf");
        var barChart = new Chart(ctx, {
        type: 'bar',
                data: {
                labels: <?= json_encode($weeklypricebookingData['labels']) ?>,
                        datasets: <?= json_encode($weeklypricebookingData['data']) ?>,
                },
                options: {

                legend: {
                display: false
                },
                        tooltips: {
                        enabled: true,
                                mode: 'single',
                                callbacks: {
                                label: function (tooltipItems, data) {
                                return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                                }
                                }
                        },
                        scales: {
                        yAxes: [{
                        ticks: {
                        beginAtZero: true,
                        }
                        }]
                        }
                }
        });</script>
<?php } ?> 
    
    
<?php $chartReportData = chartReport(); ?>
<?php if (count($chartReportData['labels'])) { ?>


    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 30 days </span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <a href="{{route('chart-report-month')}}">
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="barChart" style="height:100px;" ></canvas>
                    </div>
                </a>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>


    <script>
        var ctx = document.getElementById("barChart");
        var barChart = new Chart(ctx, {
        type: 'bar',
                data: {
                labels: <?= json_encode($chartReportData['labels']) ?>,
                        datasets: <?= json_encode($chartReportData['data']) ?>,
                },
                options: {

                legend: {
                display: false
                },
                        tooltips: {
                        enabled: true,
                                mode: 'single',
                                callbacks: {
                                label: function (tooltipItems, data) {
                                return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                                }
                                }
                        },
                        scales: {
                        yAxes: [{
                        ticks: {
                        beginAtZero: true,
                        }
                        }]
                        }
                }
        });</script>
<?php } ?>
    
    
<?php /* $weeklypricebookingData = weeklyPriceBooking(); ?>
    
<?php if (count($weeklypricebookingData['labels'])) { ?>


    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Weekly Booking</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
<!--                <a href="{{route('chart-report-month')}}">-->
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="barChartf" style="height:100px;" ></canvas>
                    </div>
<!--                </a>-->
            </div>
        </div>
        <!-- END PORTLET-->
    </div>


    <script>
        var ctx = document.getElementById("barChartf");
        var barChart = new Chart(ctx, {
        type: 'bar',
                data: {
                labels: <?= json_encode($weeklypricebookingData['labels']) ?>,
                        datasets: <?= json_encode($weeklypricebookingData['data']) ?>,
                },
                options: {

                legend: {
                display: false
                },
                        tooltips: {
                        enabled: true,
                                mode: 'single',
                                callbacks: {
                                label: function (tooltipItems, data) {
                                return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                                }
                                }
                        },
                        scales: {
                        yAxes: [{
                        ticks: {
                        beginAtZero: true,
                        }
                        }]
                        }
                }
        });</script>
<?php } 
*/
?>    
    
    



<?php $chartReportDriverData = chartReportDriver(); ?>
<?php if (count($chartReportDriverData['labels'])) { ?>

    <?php
    $totalprice = json_encode($chartReportDriverData['data']); 
    $totaltime = json_encode($chartReportDriverData['pickuplocation']);    
    ?>


<div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 30 days (Drivers) </span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
<!--                <a href="{{route('chart-report-month')}}">-->
                           
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="driverlast30daysChart" width="600" height="400"></canvas>
                    </div>
                      
<!--                </a>-->
            </div>
        </div>
        <!-- END PORTLET-->
</div>
    
    
    <script>       
        var driverCanvas = document.getElementById("driverlast30daysChart");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        
        var totalpriceData = {
        label: 'Total Price',
                data: {{ $totalprice }},
                backgroundColor: 'rgba(0, 99, 132, 0.6)',
                borderWidth: 0,
                yAxisID: "y-axis-price"
        };
        var totaltimeData = {
        label: 'Total Time',
                data: {{ $totaltime }},
                backgroundColor: 'rgba(99, 132, 0, 0.6)',
                borderWidth: 0,
                yAxisID: "y-axis-time"
        };
        var planetData = {
        labels: <?= json_encode($chartReportDriverData['labels']) ?>,
                datasets: [totalpriceData, totaltimeData]
        };
        var chartOptions = {
        scales: {
        xAxes: [{
        barPercentage: 1,
                categoryPercentage: 0.6
        }],
                yAxes: [{
                display: false,        
                id: "y-axis-price"
                }, {
                id: "y-axis-time",
                
//                ticks: {
//                    // Include a dollar sign in the ticks
//                    callback: function(value, index, values) {
//                        return '' + value;
//                    }
//                }
                
                }]
        }
        };
        var barChart = new Chart(driverCanvas, {
        type: 'bar',
                data: planetData,
                options: chartOptions
        });

    </script>
<?php } ?>

    
    
    
<?php $chartReportcompanionData = chartReportCompanion(); ?>
<?php if (count($chartReportcompanionData['labels'])) { ?>

    <?php
    $totalprice = json_encode($chartReportcompanionData['data']); 
    $totaltime = json_encode($chartReportcompanionData['pickuplocation']);    
    ?>

<div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 30 days (Companion) </span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
<!--                <a href="{{route('chart-report-month')}}">-->
                    <div id="site_statistics_content" style="" class="">
                        <canvas id="companionlast30daysChart" width="600" height="400"></canvas>
                    </div>
<!--                </a>-->
            </div>
        </div>
        <!-- END PORTLET-->
</div>
    
    
    <script>       
        var companionCanvas = document.getElementById("companionlast30daysChart");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        var totalpriceData = {
        label: 'Total Price',
                data: {{ $totalprice }},
                backgroundColor: 'rgba(0, 99, 132, 0.6)',
                //borderWidth: 0,
                yAxisID: "y-axis-price"
        };
        var totaltimeData = {
        label: 'Total Time',
                data: {{ $totaltime }},
                backgroundColor: 'rgba(99, 132, 0, 0.6)',
                //borderWidth: 0,
                yAxisID: "y-axis-time"
        };
        var planetData = {
        labels: <?= json_encode($chartReportcompanionData['labels']) ?>,
                datasets: [totalpriceData, totaltimeData]
        };
        
        
        var chartOptions = {
        scales: {            
            xAxes: [{                  
            barPercentage: 1,
            categoryPercentage: 0.6,           
            }],
           yAxes: [{
            display: false,
            id: "y-axis-price"
            }, {
           // display: false,
            id: "y-axis-time"
            }]            
        }
                
        };
        var barChart = new Chart(companionCanvas, {
                
                type: 'bar',
                data: planetData,
                options: chartOptions
        });

    </script>
<?php } ?>    
    
