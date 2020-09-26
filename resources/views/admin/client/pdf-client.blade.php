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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address 1</th>
                                <th>Address 2</th>   
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            
                            @foreach ($models as $model)
                            <tr>
                                               
                               <td>{{ $model->firstname }} {{ $model->surname }}</td>
                                <td>{{ $model->email}}</td>
                                <td>{{ $model->phone}}</td>                                                                
                                <td>{{ $model->address }}</td>
                                <td>{{ $model->house_number}}</td>

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
