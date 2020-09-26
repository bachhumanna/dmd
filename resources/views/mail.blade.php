<html>
    <body>
        <br>
        <b>This is just test message  </b>
        <br>
        Name : {{ $data['name'] }}
        <br>
        Email : {{ $data['email'] }}
        <br>
        

        <a href="{{ route('forgotpassword-link',array('id'=>$data['id'])) }}">Click Here</a>
    </body>
</html>
