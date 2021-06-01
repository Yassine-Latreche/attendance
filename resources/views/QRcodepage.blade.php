<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>

  {{-- <script>window.onload = function () {
    var date = document.getElementById("date");
  date.innerHTML = moment().format('dddd, MMMM Do YYYY');
  setInterval(function() {
     
  var hours = document.getElementById("hours");
  var minutes = document.getElementById("minutes");
  var seconds = document.getElementById("seconds");
  var phase = document.getElementById("phase");

  var h = new Date().getHours();
  var m = new Date().getMinutes();
  var s = new Date().getSeconds();
  var am = "AM";

  if (h > 12) {
      h = h - 12;
      var am = "PM";
  }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  hours.innerHTML = h;
  minutes.innerHTML = m;
  seconds.innerHTML = s;
  phase.innerHTML = am;
}, 1000);

}
</script> --}}
  <div style="

  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  border-radius: 10px;
  margin-top: 75px;
  background: #f3f3f3;">
      <div id="time" style="font-size: 2.5rem">
        <div>
            <p style="display: inline !important" id="hours"></p>
            <p style="display: inline !important">:</p>
            <p style="display: inline !important" id="minutes"></p>
            <p style="display: inline !important">:</p>
            <p style="display: inline !important" id="seconds"></p>
            <p style="display: inline !important"> </p>
            <p style="display: inline !important" id="phase"></p>
        </div>
        <div>
            <p id="date"></p>
        </div>
      </div>
  </div>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="    min-height: 550px; width: 550px;
          padding-bottom: 25px !important; margin: auto">
            <script>
              window.addEventListener("load", myInit, true); function myInit(){
              function nowtime(){
     var hours = document.getElementById("hours");
     var minutes = document.getElementById("minutes");
     var seconds = document.getElementById("seconds");
     var phase = document.getElementById("phase");
   
     var h = new Date().getHours();
     var m = new Date().getMinutes();
     var s = new Date().getSeconds();
     var am = "AM";
   
     if (h > 12) {
         h = h - 12;
         var am = "PM";
     }
   
     h = h < 10 ? "0" + h : h;
     m = m < 10 ? "0" + m : m;
     s = s < 10 ? "0" + s : s;
   
     hours.innerHTML = h;
     minutes.innerHTML = m;
     seconds.innerHTML = s;
     phase.innerHTML = am;
   
              }
                var date = document.getElementById("date");
  date.innerHTML = moment().format('dddd, MMMM Do YYYY');
  f2 = setInterval( nowtime()
    , 1000);
                      f1 = setInterval(function() {
                        nowtime()
                          $.post("/api/generate_qr_code",
                              {
                                  lecture_Id: {{ $lecture_Id }},
                              },
                              function(data, status){
                                  $('#qrcode').empty();
          
                                  // Set Size to Match User Input
                                  $('#qrcode').css({
                                  'width' : '500',
                                  'height' : '500',
                                  'margin-bottom': '10'
                                  })
          
                                  // Generate and Output QR Code
                                  $('#qrcode').qrcode({width: '500',height:'500',text: data+{{ $lecture_Id }}});
          
                              });
                          // Clear Previous QR Code
          
                                        //$('.style').css("backgroundColor", colors[rand(colors.length)]);
                      }, 1000);
                  }
            </script>
            <input hidden type="number" class="qr-size" value="860" min="20" max="500">
                          
                  <br>
                  
                  <div style="
                      margin: auto;
                      
                  " id="qrcode" ></div>
          </div>
      </div>
  </div>
  <form name="summaryform" id="summaryform" action="{{ url("teacher_dashboard/summary") }}" method="GET">
    <input form="summaryform" hidden type="text" name="lecture_Id" id="lecture_Id" value="{{ $lecture_Id }}">
  <input type="submit" id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;" value="check_circle">
  {{-- <button form="summaryform" id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;">check_circle</button>  --}}
</form>
</x-app-layout>


{{-- <!DOCTYPE html>
<html>
    <head>
        <title>home screen teach</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/projectstyle.css">
        <script src="/js/jquery-3.6.0.min.js"></script>
        <script src="/js/qrcode.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
        <script>
          window.addEventListener("load", () => {
          document.body.classList.remove("preload");
          });

          document.addEventListener("DOMContentLoaded", () => {
          const nav = document.querySelector(".nav");

          document.querySelector("#btnNav").addEventListener("click", () => {
          nav.classList.add("nav--open");
          });

          document.querySelector(".nav__overlay").addEventListener("click", () => {
          nav.classList.remove("nav--open");
          });
          });
        </script>
        <style>
         
        </style>
    </head>


<body class="preload">
  <header class="header">
    <button class="header__button" id="btnNav" type="button">
        <i class="material-icons">menu</i>
    </button>
    <button class="header__button__profile" type="button">
      <i class="material-icons">person</i>
    </button>
  </header>
  <nav class="nav">
      <div class="nav__links">
        <a href="{{ url('teacher_dashboard') }}" class="nav__link">
          <i class="material-icons">home</i>
              Home
          </a>
          <a class="nav__link" href="#">
              <i class="material-icons">history</i>
              Archive
          </a>
          <a class="nav__link" href="#">
              <i class="material-icons">contact_support</i>
              About
          </a>
          <a class="nav__link" href="#">
              <i class="material-icons">contact_page</i>
              Contact page
          </a>
          <a class="nav__link" href="index.html">
              <i class="material-icons">logout</i>
              Logout
          </a>
      </div>
      <div class="nav__overlay"></div>
  </nav>


  <a href="/teacher" style="display: block"> <button onclick="location.href='{{ url('teacher_dashboard') }}'" 
    type="button"class="material-icons floating-btn">exit_to_app</button>
  </a>
  <script>
    window.onload = function() {
            setInterval(function() {
                $.post("/api/generate_qr_code",
                    {
                        lecture_Id: {{ $lecture_Id }},
                    },
                    function(data, status){
                        $('#qrcode').empty();

                        // Set Size to Match User Input
                        $('#qrcode').css({
                        'width' : $('.qr-size').val(),
                        'height' : $('.qr-size').val()
                        })

                        // Generate and Output QR Code
                        $('#qrcode').qrcode({width: $('.qr-size').val(),height: $('.qr-size').val(),text: data+{{ $lecture_Id }}});

                    });
                // Clear Previous QR Code

                              //$('.style').css("backgroundColor", colors[rand(colors.length)]);
            }, 1000);
        }
  </script>
  </body>
  <input hidden type="number" class="qr-size" value="860" min="20" max="500">
                
        <br>
        
        <div id="qrcode"></div>

</html> --}}
