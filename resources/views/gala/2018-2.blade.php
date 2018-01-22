<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>睿医中心</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

    <style>


        body{
            background:-webkit-gradient(linear, 0 0, 0 bottom, from(#040205), to(#16000D));
            width:100%;height:100%;
            background-size:100%100%;
            min-height: 1024px;
            margin: 0px;
            /*background: linear-gradient(to bottom right, blue, white);*/
        }
        .pager{

            {{--background:url({{ URL::asset('active.png') }} ) no-repeat fixed center;--}}
            /*width: 1440px;*/
            /*height: 1024px;*/
            /*width:100%;*/
            background:-webkit-gradient(linear, 0 0, 0 bottom, from(#040205), to(#16000D));
            width:100vw;height:100vh;
            margin: 0;
            /*background: linear-gradient(to bottom right, blue, white);*/
            display: block;
        }
    </style>

</head>
<body>
<div class="pager">




</div>
</body>
</html>