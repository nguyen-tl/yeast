<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome Icons  -->
        <link href="{{ asset('font/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font/all.min.css') }}" rel="stylesheet">
        <script src="{{ asset('font/fontawesome.min.js') }}"></script>
        <script src="{{ asset('font/all.min.js') }}"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        @yield('css')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{asset('jquery/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                <?php $arr = isset($out) ? $out : []; ?>
                var array = <?php echo json_encode($arr); ?>;
                if (array.length > 1) {
                    var data = google.visualization.arrayToDataTable(array);

                    var options = {
                        title: 'Research trends (Source: ScienceDirect)',
                        curveType: 'function',
                        legend: { position: 'none' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    document.getElementById('curve_chart').style.display = 'block';

                    chart.draw(data, options);
                }
            }
        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=410479849870831&autoLogAppEvents=1"></script>
        @yield('content')
        <div id="curve_chart" style="width: 900px; height: 500px; margin-left: 25%; display: none"></div>
        @if(isset($papers) && count($papers) > 0)
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Newest Articles From ScienceDirect</h2>
                @for($i = 0; $i < count($papers); $i++)
                <p align="justify">
                    <a href="{{$papers[$i][0]}}" target="blank">[{{$i+1}}] {{$papers[$i][1]}}</a><br>
                    <i> {{$subTypes[$i]}}</i>
                </p>
                @endfor
            </div>
            <div class="col-md-4"></div>
        </div>
        @endif
    </body>
    @yield('js')
</html>
