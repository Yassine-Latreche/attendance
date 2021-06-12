@section('page-title')
Dashboard
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
            date.innerHTML = moment().format('dddd, MMMM Do YYYY');
            setInterval(function () {

                nowtime();
            }, 1000);

        }

        document.querySelector('#btnChangeBg').addEventListener('click', () => {
            Confirm.open({
                title: 'QR code generator',
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
                                <div class="row align-items-center" style="padding: 0 5%; margin: 10px 0;">
                                <div class="col">
                                    <label class="labels" for="timetable">TimeTable:</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control input-lg" name="timetable" id="timetable">
                                        <option disabled selected value="0">TimeTable</option>
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
                getDetails();
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
                <p id="date"></p>
            </div>
        </div>
    </div>
    <table class="content-table" style="margin-top: 25px;">
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
</x-app-layout>