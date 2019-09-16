<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        {{--   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDneJAr2g_xrRSFu1vVAisic3kv63M_zU0&callback=initMap">
        </script> --}}
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOull7AHc5jtWBwhML20kgELdRzKF1qCo&v=3.exp"> </script>
        
    </head>
    <body onload="startTime()">
        <form method="post" action="{{route('timein')}}" id="submit">
            @csrf
            <input name="coordinates" type="hidden" type="text" id="coordinates_hidden">
            <input name="address" type="hidden" type="text" id="address_hidden">
              <input name="time" type="hidden" type="text" id="hidden_time">
            
            
            <div class="container">
                <div class="card" style="margin-top: 10%;">
                    <div class="card-header">
                        <h5  style="float:left;"> Welcome {{Auth::user()->last_name.','.Auth::user()->first_name.' '.Auth::user()->middle_name}}</h5>
                        <div style="float:right;">Time: <label id="time"> </label></div>
                    </div>
                    <div class="card-body">
                        
                        <div class="container-fluid">
                            
                            <div class="row">
                                <div class="col-md-12 col-lg-12" style="text-align: center;margin-bottom: 10px;">
                                    <input id="time_in" type="button" class="btn btn-primary" value="TIME IN" style="width: 50%; height: 50px" disabled="">
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-12 col-lg-12" style="text-align: center">
                                    <input id="time_out" type="button" class="btn btn-primary" value="TIME OUT" style="width: 50%; height: 50px" disabled="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        
                        <div>Username: <label>{{Auth::user()->username}} <label></div>
                            <div>Coordinates: <label id="coordinates"> </label></div>
                            <div> Address:<label id="address"></label> </div>
                        </div>
                    </div>

                </div>
            </form>
            <form method="post" action="{{route('timeout')}}" id="out_submit">
            @csrf
            <input name="address" type="hidden" type="text" id="address_hidden_2">
            <input name="coordinates" type="hidden" type="text" id="coordinates_hidden_2">
            <input name="time" type="hidden" type="text" id="hidden_time_2">
          
            </form>

        </body>
        </html>
        <script>
            $(document).ready(function(){
                $("#time_in").click(function(){
                    $("#submit").submit();
                });
                $("#time_out").click(function(){
                    $("#out_submit").submit();

                });

                //caling the location
                 if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(onPostion);
                    }
                else {
                    console.log ("Geolocation is not supported by this browser.");
                     }

                //refreshing location
                setInterval(function(){ 

                  if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(onPostion);
                        }
                    else {
                    console.log ("Geolocation is not supported by this browser.");
                     }


                }, 10000);
                  
                    
                


                   
                function onPostion(position)
                {
                    var lat =  position.coords.latitude;
                    var lng =  position.coords.longitude;

                    document.getElementById('coordinates').innerHTML = 'Lat:'+lat +", Long: "+ lng;
                    var c = document.getElementById('coordinates_hidden').value=lat +","+ lng;
                    var c = document.getElementById('coordinates_hidden_2').value=lat +","+ lng;

                    var myLatlng = new google.maps.LatLng(lat,lng);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results)
                        $('#address').html(results[0].formatted_address);
                        $('#address_hidden').val(results[1].formatted_address);
                        $('#address_hidden_2').val(results[1].formatted_address);

                        $("#time_in").attr("disabled", false);
                        $("#time_out").attr("disabled", false);
                        }
                    });
                }
                
    


            });
            function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
            h + ":" + m + ":" + s;
            document.getElementById('hidden_time_2').value = h + ":" + m + ":" + s;
            document.getElementById('hidden_time').value = h + ":" + m + ":" + s;


            var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
            }
</script>