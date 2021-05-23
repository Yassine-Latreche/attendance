<!DOCTYPE html>
<html>
    <head>
        <title>home screen teach</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/projectstyle.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
  </body>


</html>
