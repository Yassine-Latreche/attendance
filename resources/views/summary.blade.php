<!DOCTYPE html>
<html>
    <head>
        <title>home screen teacher</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/projectstyle.css">

        <script src="/js/jquery-3.6.0.min.js"></script>
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
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="csrf-token" content="{{ csrf_token() }}">
        
                <title>{{ config('app.name', 'Laravel') }}</title>
        
                <!-- Fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
                <!-- Styles -->
                <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
                @livewireStyles
        
                <!-- Scripts -->
                <script src="{{ mix('js/app.js') }}" defer></script>
                <script src="/js/momentjs.min.js" ></script>
    </head>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
<body class="preload">
  {{-- <header class="header">
      <button class="header__button" id="btnNav" type="button">
          <i class="material-icons">menu</i>
      </button>
      <button class="header__button__profile" type="button">
        <i class="material-icons">person</i>
      </button>
  </header> --}}
  @livewire('navigation-menu')

  <script>
  function getDetails() {
            $.post('{{ url("/api/record/search") }}',
                {
                    lecture_Id: {{ $lecture_Id }},
                },
                function(data, status){
                    console.log("hello");
                    data.forEach((item, index) => {
                        $('#student_rows').append("<tr><td>"+item.student+"</td><td>"+item.section+"</td><td>"+item.group+"</td></tr>");
                    });                        
                });
            }  
  window.onload = function () {
      getDetails();
      function nowtime() {
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
      nowtime();
      var date = document.getElementById("date");
    date.innerHTML = moment().format('dddd, MMMM Do YYYY');
    setInterval(function() {
       
    nowtime();
}, 1000);

}
</script>

  <button id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;">qr_code</button>

  <script>
    document.querySelector('#btnChangeBg').addEventListener('click', () => {
      Confirm.open({
        title: 'QR code generator',
        body: 'hello',
        onok: () => {
             window.open('{{ url("teacher_dashboard/lecture/scanning") }} ', "_blank");
        }
      })
    });


      


    const Confirm = {
    open (options) {
        options = Object.assign({}, {
            title: '',
            body: '',
            okText: 'Generate',
            cancelText: 'Cancel',
            onok: function () {},
            oncancel: function () {}
        }, options);
        
 const html = `
            <div class="confirm">
                <div class="confirm__window">
                    <div class="confirm__titlebar">
                        <span class="confirm__title">${options.title}</span>
                        <button class="confirm__close">&times;</button>
                    </div>
                    <form name="session_generator" method="GET" action="/teacher_dashboard/lecture/scanning" id="session_generator">
                    <div class="confirm__content">
                        <select class="content__menu" name="timetable" id="timetable" form="session_generator">
                            <option disabled selected value="0">Timetable</option>
                        </select>
                    </div>
                    <div class="confirm__buttons">
                        <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit" value="${options.okText}"/>
                        <button class="confirm__button confirm__button--cancel">${options.cancelText}</button>
                    </div>
                </form>
                </div>
            </div>
          `
        ;

        const template = document.createElement('template');
        template.innerHTML = html;

        // Elements
        const confirmEl = template.content.querySelector('.confirm');
        const btnClose = template.content.querySelector('.confirm__close');
        const btnOk = template.content.querySelector('.confirm__button--ok');
        const btnCancel = template.content.querySelector('.confirm__button--cancel');

        confirmEl.addEventListener('click', e => {
            if (e.target === confirmEl) {
                options.oncancel();
                this._close(confirmEl);
            }
        });

        btnOk.addEventListener('click', () => {
            // options.onok();
            this._close(confirmEl);
        });

        [btnCancel, btnClose].forEach(el => {
            el.addEventListener('click', () => {
                options.oncancel();
                this._close(confirmEl);
            });
        });

        document.body.appendChild(template.content);
        
        function go_to_qrcode(){

        }
    },

    _close (confirmEl) {
        confirmEl.classList.add('confirm--close');

        confirmEl.addEventListener('animationend', () => {
            document.body.removeChild(confirmEl);
        });
    }

};

  </script>
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
        <div><p>{{ $lecture_Id }}</p></div>
      </div>
  </div>
<table class="content-table" id="student_table" style="    margin-top: 25px;
">
    <thead>
      <tr>
        <th>Student</th>
        <th>Section</th>
        <th>Group</th>
      </tr>
    </thead>
    <tbody id="student_rows">
      <tr>
        <td>student1</td>
        <td>1</td>
        <td>Present</td>
      </tr>
      <tr>
        <td>student2</td>
        <td>2</td>
        <td>Present</td>
      </tr>
      <tr>
        <td>student3</td>
        <td>3</td>
        <td>Absent</td>
      </tr>
    </tbody>
  </table>
</body>


</html>
