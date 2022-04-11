<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.svg') }}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        p {
        text-align: center;
        font-size: 60px;
        margin-top: 0px;
        color: #3e54ff;
        }
        .coming {
        text-align: center;
        font-size: 30px;
        margin-top: 0px;
        color: #0f0f0f;
        }
</style>
</head>
<body>

    <div id="app">
        
    <section class="services section">
        <div class="container">
            <div class="row">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
            <p  class="coming">Lunching Time Left</p>
            <p id="demo" class="text-center"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 1, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
            </div>
        </div>
    </section>
    


    </body>
</html>
