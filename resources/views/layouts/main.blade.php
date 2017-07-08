<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Demo</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{url('css/custom.css')}}" rel="stylesheet">
        <link href="{{url('css/bootstrap-select.css')}}" rel="stylesheet">
        <link href="{{url('css/jquery-ui.css')}}" rel="stylesheet">
        <link href="{{url('css/highCheckTree.css')}}" rel="stylesheet">
        <link href="{{url('css/flexslider.css')}}" rel="stylesheet">
        <link href="{{url('css/jquery.jscrollpane.css')}}" rel="stylesheet">
        <link href="{{url('css/demo.css')}}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ["Montserrat", "Montserrat-Medium", "Montserrat-Light"]
                }
            });
        </script>-->
        <style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>
    </head>
    <body class="inner_pages">
        @include('layouts.nav-bar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- jQuery -->
        <input name="basepath" type="hidden"  value="{{url('/')}}" />
        <!-- Modal -->
        <input class="popup" data-toggle="modal" data-target="#myModal" type="hidden" />
        <div id="myModal" class="modal fade popup-user" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-profile">

                </div>

            </div>
        </div>
        <div id="message-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content message-popup">
                </div>
            </div>
        </div>
        <script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{url('js/jquery.jscrollpane.min.js')}}"></script>
        <script src="{{url('js/jquery.mousewheel.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script src="{{url('js/jquery.validate.js')}}"></script>
        <script src="{{url('js/bootstrap-select.js')}}"></script>
        <script src="{{url('js/highchecktree.js')}}"></script>

        <script src="{{url('js/custom.js')}}"></script>
        <script src="{{url('js/script.js')}}"></script>
        <script src="{{url('js/jquery.flexslider.js')}}"></script>
        <script src="https://unpkg.com/vue"></script>
        <!--<script src="{{url('js/require.js')}}"></script>-->
        <script src="{{assets('app.js')}}"></script>
        @yield('script')
    </body>
</html>
