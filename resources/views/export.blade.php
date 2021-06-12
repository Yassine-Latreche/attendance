@section('page-title')
    Export
@endsection

<x-app-layout>
  <script src="{{ mix('js/getDetails.js') }}" defer></script>
    <script>
        window.onload = function() {
            getDetails();
            $(function() {
                $("#timetable").select2();
            });
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
    <div style="
  margin-top: 75px;
  border-radius: 10px;
  background: #f3f3f3;">
        <div class="confirm__content">
            <form class="form-inline" name="exporter" method="POST" action="/teacher_dashboard/export/"
                id="session_generator">
                @csrf
                <div class="form-group form-group-lg">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <label class="labels" for="timetable">TimeTable:</label>
                        </div>
                        <div class="col-7">
                            <select class="form-control input-lg" name="timetable" id="timetable">
                                <option disabled selected value="0">TimeTable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-1">
                        <label class="labels" for="from">Debut:</label>
                    </div>
                    <div class="col-4">
                        <input class="content__menu" type="date" id="from" name="from" value="">
                    </div>
                </div>
                <br>

                <div class="row align-items-center">

                    <div class="col-1">
                        <label class="labels" for="to">Fin:</label>
                    </div>
                    <div class="col-4">
                        <input class="content__menu" type="date" id="to" name="to" value="">
                    </div>

                </div>
                <br>

                <div class="confirm__buttons" style="  border-radius: 10px;">
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Export" />
                </div>
            </form>
        </div>

</x-app-layout>
