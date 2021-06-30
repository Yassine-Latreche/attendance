@section('page-title')
Tableau de bord
@endsection

<x-app-layout>
    <button id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;">qr_code</button>
    <script src="{{ mix('js/getDetails.js') }}" defer></script>

    <script>
        window.onload = function () {
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
            date.innerHTML = moment().lang("fr").format('dddd Do MMMM YYYY');

            setInterval(function () {

                nowtime();
            }, 1000);
            timeTableProfessor("{{ App\Models\Professor::where('user_Id', Auth::user()->id )->first()->id }}");

        }

        document.querySelector('#btnChangeBg').addEventListener('click', () => {
            Confirm.open({
                title: 'Démarrer un session',
                body: 'hello',
                onok: () => {
                    window.open(
                        '{{ url('teacher_dashboard/lecture/scanning') }} ',
                        "_blank");
                }
            })
        });

        const Confirm = {
            open(options) {
                options = Object.assign({}, {
                    title: '',
                    body: '',
                    okText: 'Démarrer',
                    cancelText: 'Annuler',
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
                                <div class="row align-items-center" style="padding: 0 5%; margin: 10px 0;">
                                <div class="col">
                                    <label class="labels" for="timetable">Scénce:</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control input-lg" name="timetable" id="timetable">
                                        <option disabled selected value="0">Scénce</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="confirm__buttons">
                                <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit" value="${options.okText}"/>
                            </div>
                        </form>
                        </div>
                    </div>
                `;
                const template = document.createElement('template');
                template.innerHTML = html;

                // Elements
                const confirmEl = template.content.querySelector('.confirm');
                const btnClose = template.content.querySelector('.confirm__close');
                const btnOk = template.content.querySelector('.confirm__button--ok');

                confirmEl.addEventListener('click', e => {
                    if (e.target === confirmEl) {
                        options.oncancel();
                        this._close(confirmEl);
                    }
                });

                btnOk.addEventListener('click', () => {
                    this._close(confirmEl);
                });

                [btnClose].forEach(el => {
                    el.addEventListener('click', () => {
                        this._close(confirmEl);
                    });
                });
                document.body.appendChild(template.content);
                getDetails("{{ App\Models\Professor::where('user_Id', Auth::user()->id )->first()->id }}");

            },

            _close(confirmEl) {
                confirmEl.classList.add('confirm--close');
                confirmEl.addEventListener('animationend', () => {
                    document.body.removeChild(confirmEl);
                });
            }
        };
    </script>
    <div style="
  padding: 20px;
  border-radius: 10px;
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
                <p id="date" style="text-transform: capitalize;"></p>
            </div>
        </div>
    </div>
    <div style="
    margin-top: 20px;
    padding: 20px;
    border-radius: 10px;
      background: #f3f3f3;">
        <div style="font-size: 2.5rem">
            <div>
                <p style="display: inline !important">Bonjour M. {{ Auth::user()->name }}</p>
            </div>
            <div>
            </div>
        </div>
    </div>
    @if(Auth::user()->belongsToTeam(App\Models\Team::where('name', 'Teachers')->first()))    

    <div id="timetables_lecture" style="
      margin-top: 20px;
      padding: 20px;
      border-radius: 10px;
        background: #f3f3f3;
        font-weight: bold;
        color:white;">
        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="z-index:0; height: 100%;
                background-color: #009879; border:0px;">
                    <div id="last_content" class="card-body">
                        <h3 id="last_title" class="card-title" style="font-size: 1.5rem"></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="z-index:0; height: 100%;
                background-color: #009879; border:0px;">
                    <div id="now_content" class="card-body">
                        <h3 id="now_title" class="card-title" style="font-size: 1.5rem"></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="z-index:0; height: 100%;
                background-color: #009879; border:0px;">
                    <div id="next_content" class="card-body">
                        <h3 id="next_title" class="card-title" style="font-size: 1.5rem"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>