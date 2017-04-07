<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ForeverWeLove</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ["Montserrat", "Montserrat-Medium", "Montserrat-Light"]
                }
            });
        </script>
    </head>
    <body>
        <div class="container-wrapper">
           
            @yield('content')
        </div>
        <!-- jQuery -->
        <script src="{{url('js/jquery-1.11.1.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
         <script src="{{url('js/jquery.validate.js')}}"></script>
        <script src="{{url('js/custom.js')}}"></script>
        <script src="{{url('js/script.js')}}"></script>
    </body>
</html>
