<!DOCTYPE html>
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
          .qr-code-generator {
        width: 500px;
        margin: 0 auto;
        }

        .qr-code-generator * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        }

        #qrcode {
        width: 128px;
        height: 128px;
        margin: 0 auto;
        text-align: center;
        }

        #qrcode a {
        font-size: 0.8em;
        }

        .qr-url, .qr-size {
        padding: 0.5em;
        border: 1px solid #ddd;
        border-radius: 2px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        }

        .qr-url {
        width: 79%;
        }

        .qr-size {
        width: 20%;
        }

        .generate-qr-code {
        display: block;
        width: 100%;
        margin: 0.5em 0 0;
        padding: 0.25em;
        font-size: 1.2em;
        border: none;
        cursor: pointer;
        background-color: #ffffff00;
        color: #ffffff00;
        }
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

</html>
