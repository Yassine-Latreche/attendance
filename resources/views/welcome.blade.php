<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/styles.min.css') }}">
    
        <title>Laravel</title>
        <script src="{{ mix('js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ mix('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ mix('js/script.min.js') }}" defer></script>
        <link rel="shortcut icon" href="{{ mix('favicon.ico') }}"/>

    </head>
    <body>
        <div id="welcome" class="d-lg-flex align-items-lg-center" style="background: #e2e2e8;height: 100vh;">
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 d-lg-flex align-items-lg-center">
                        <div>
                            <h1 style="color: var(--bs-gray-dark);">Attendance Project</h1>
                            <p style="color: var(--bs-dark);">Made by students, for students.</p>
                            <div>
                                <div class="row">
                                    <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start"><button onclick="location.href='#professor';" class="btn btn-light btn-lg action-button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" type="button" style="color: var(--bs-green);border-color: var(--bs-green);border-radius: 10px;">&nbsp;Professors</button></div>
                                    <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start"><button onclick="location.href='#student';" class="btn btn-light btn-lg d-xl-flex action-button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" type="button" style="color: var(--bs-blue);border-radius: 10px;border-color: var(--bs-blue);">Students</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="phone-mockup"><img class="device" src="{{ mix('images/logo.png') }}" style="max-height: 500px;max-width: 500px;">
                            <div class="screen"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="professor" class="d-lg-flex align-items-lg-center" style="height: 100vh;background: #009879;color: rgb(255,255,255);">
            <div class="container hero">
                <div class="row d-lg-flex align-items-lg-center" style="height: 100%;">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="max-width: 35%;">
                        <h1>Professor</h1><button onclick="location.href='/login';" class="btn btn-light btn-lg action-button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" type="button" style="color: var(--bs-green);border-color: var(--bs-green);border-radius: 10px;">Login</button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder" style="min-width: 55%;">
                        <div class="phone-mockup"><img class="device" src="{{ mix('images/professor_dashboard.png') }}" style="max-height: 500px;transform: scale(1);text-align: left;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="student" class="d-lg-flex align-items-lg-center" style="height: 100vh;background: #1855a7;color: rgb(255,255,255);">
            <div class="container hero">
                <div class="row d-lg-flex align-items-lg-center">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>Student</h1>
                        <p>If you are a ESI-SBA student, download the app by scanning the&nbsp;QrCode, or click the button down bellow.</p><button onclick="location.href='/apk/com.esisba.attendanceproject.apk';" class="btn btn-light btn-lg action-button" data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" type="button" style="color: #1855a7;border-radius: 10px;border-color: #1855a7;">Download</button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="phone-mockup"><img class="device" src="{{ mix('images/download.png') }}" style="max-height: 500px;max-width: 500px;text-align: right;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="team-boxed">
            <div id="people" class="container">
                <div>
                    <div class="row" style="height: 75vh;">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" style="width: 66%;">
                            <div>
                                <h2 class="text-center" style="color: #009879;">Our Supervisor</h2>
                                <p class="text-center">Our bitch</p>
                            </div>
                        </div>
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" style="width: 33%;">
                            <div class="d-lg-flex align-items-lg-center box" style="height: 50vh;">
                                <div style="background: #ffffff;padding: 25px;"><img class="rounded-circle" src="{{ mix('images/gheid-zakaria.jpg') }}" style="width: 50%;text-align: right;margin-right: 25%;margin-left: 25%;margin-top: 10%;margin-bottom: 10%;">
                                    <h3 class="name" style="text-align: center;"><strong>GHEID Zakaria</strong><br></h3>
                                    <p class="title" style="color: #009879;text-align: center;">Maître de conférences B<br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro">
                    <h2 class="text-center" style="color: #009879;">Our Team </h2>
                    <p class="text-center">We made it possible</p>
                </div>
                <div class="row people">
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/brahim.webp') }}">
                            <h3 class="name">Brahim Daoud</h3>
                            <p class="title" style="color: #009879;">FLutter Developer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/majid.jpg') }}">
                            <h3 class="name">Majid Yahia</h3>
                            <p class="title" style="color: #009879;">UI Designer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/haithem.png') }}">
                            <h3 class="name">Haithem Satoutah</h3>
                            <p class="title" style="color: #009879;">Flutter Developer</p>
                        </div>
                    </div>
                </div>
                <div class="row people">
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/yahia.png') }}">
                            <h3 class="name">Mazouzi Yahia</h3>
                            <p class="title" style="color: #009879;">Back-end Developer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/younes.png') }}">
                            <h3 class="name">Younes Kebli</h3>
                            <p class="title" style="color: #009879;">UI Designer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="{{ mix('images/yassine.jpg') }}">
                            <h3 class="name">Yassine Latreche</h3>
                            <p class="title" style="color: #009879;">Back-end Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.min.js"></script>
    </body>
</html>
