<!DOCTYPE html>
<html>
<head>
  <title>Weather Forecast</title>
  <link rel="stylesheet" href="style2.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" ></script>

</head>
<body>
  <label for="city">Enter city:</label>
  <input id="city"></input>
  <button id="getWeatherForcast">GET WEATHER</button>
  <div class="ShowWeatherForcast">
    
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      
      $("#getWeatherForcast").click(function(){
                
                var city = $("#city").val();
            var key  = 'd51c8caf38f5ed27574c76b338781494';
            
            $.ajax({
              url:'http://api.openweathermap.org/data/2.5/weather',
              dataType:'json',
              type:'GET',
              data:{q:city, appid: key, units: 'metric'},

              success: function(data){
                var wf = '';
                $.each(data.weather, function(index, val){
                  var icon1="http://openweathermap.org/img/w/"+data.weather[0].icon;
                  wf += '<p><b>' + data.name + "</b><br><img src="+ icon1 + ".png></p>"+ data.main.temp + '&deg;C ' + 
                  ' | ' + data.weather[0].main

                });
              
               $(".ShowWeatherForcast").html(wf);
              }

            })

      });
    });
  </script>

</body>
</html>