<!DOCTYPE html>
<html>
    <head>

        <title> </title>
        <link rel="stylesheet" type="text/css" href="./css/app.css">

    </head>
    <body>

        <div id="app">
            <div class="container">

                <div style="margin-top:20px;" class="jumbotron">
                    <div class="container">
                        <h3>Welcome Temper technical assessment </h3>

                    </div>
                </div>
                <h3> Please click the Chart option </h3>

                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group">
                            <router-link to="/" class="list-group-item ">Home</router-link>

                            <router-link to="/chart" class="list-group-item ">Chart</router-link>

                        </div>
                    </div>

                    <router-view class="view"></router-view>


                </div>


                <footer align="center">

                </footer>
            </div>{{-- /container --}}

        </div>

        {{-- / setting value to your CSRFglobal variables  --}}
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>


        </script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="./js/app.js"></script>

    </body>


</html>