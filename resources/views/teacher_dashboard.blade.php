<!DOCTYPE html>
<html>
    <head>
        <title>home screen teacher</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/projectstyle.css">


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

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
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
  
  <button id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;">qr_code</button>
  <button id="btnChangeBg" class="material-icons floating-btn1">add</button>
  <button id="btnChangeBg" class="material-icons floating-btn2">save</button>

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
                    <div class="confirm__content">
                        <select class="content__menu">
                            <option disabled selected>Subject</option>
                            <option>ISI</option>
                            <option>POO</option>
                            <option>SFSD</option>
                            </select>
                            <select class="content__menu">
                            <option disabled selected>group</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            </select>
                            <select class="content__menu">
                            <option disabled selected>timer</option>
                            <option value=5>5m</option>
                            <option value=10>10m</option>
                            <option value=15>15m</option>
                            <option value=20>20m</option>
                            </select>
                        </div>
                    <div class="confirm__buttons">
                        <button class="confirm__button confirm__button--ok confirm__button--fill">${options.okText}</button>
                        <button class="confirm__button confirm__button--cancel">${options.cancelText}</button>
                    </div>
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
    },

    _close (confirmEl) {
        confirmEl.classList.add('confirm--close');

        confirmEl.addEventListener('animationend', () => {
            document.body.removeChild(confirmEl);
        });
    }
};

  </script>
<table class="content-table">
    <thead>
      <tr>
        <th>Student</th>
        <th>Group</th>
        <th>Presence status</th>
      </tr>
    </thead>
    <tbody>
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
