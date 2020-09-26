<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>Driving Miss Daisy</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body style="background: #fff;">
        <table width="900px" cellpadding="0" cellspacing="0" style="width: 900px; margin: 0 auto; font-family: 'Lucida Sans Unicode', sans-serif; max-width: 100%; background: #fafafa;">
            <!--*-->
            <thead>
                <tr>
                    <td style="background: #999797; padding: 16px 0px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style=" text-align: center;">
                                    <a href="#" style="border: none; outline: none;">
                                        <img src="{{  asset('images/logo.png') }}" alt="" style=" margin: auto; display: block; border: none; outline: none; width: 100px;">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>
            <!--*-->

            <!--*-->
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f1d5;">
                            
                            
                            
                            
                        <thead class="flip-content">
                            <tr>                                   
                                <th>Booking#</th>
                                <th>Booking&nbsp;Time</th>
                                <th>Total&nbsp;Pice</th>
                                <th>Total&nbsp;Time</th>

                                <th>Base </th>
                                <th>Pickup</th>
                                <th>Name</th>
                                <th>Mobile </th>
                                <th>Destination</th>  
                                <th>Pickup&nbsp;1</th>
                                <th>Pickup&nbsp;2</th>
                                <th>Pickup&nbsp;3</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            
                            @foreach ($models as $model)
                            <tr>
                                               
                            <td>{{ $model->order_id }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                            <td>{{ $model->total_duration }} Min</td>

                            <td>{{ $model->base_location}}</td>
                            <td><?= $model->pickup ?></td>
                            <td>{{ $model->client->name }}</td>
                            <td>{{ $model->client->phone }}</td>
                            <td>{{ @$model->dropLocation->location_name}}</td>
                            <?php foreach ($model->pickupLocation as $key => $pickupLocation) { ?>                            
                                <td>{{ $pickupLocation->location_name }}</td>                           
                            <?php } ?>
                            </tr>
                            @endforeach
                            
                            
                            
                        </tbody>
                    
                            
                            
                            
                            
                            
                        </table>
                    </td>
                </tr>
                

            </tbody>
            <!--*-->

            <!--*-->
        
            <!--*-->
        </table>
    </body>
</html>
