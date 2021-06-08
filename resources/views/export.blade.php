<x-app-layout>

  {{-- <header class="header">
      <button class="header__button" id="btnNav" type="button">
          <i class="material-icons">menu</i>
      </button>
      <button class="header__button__profile" type="button">
        <i class="material-icons">person</i>
      </button>
  </header> --}}

  <script>
  
  window.onload = function () {
    $.get("/api/timetable",
                function(data, status){
                    data.forEach((item, index) => {
                        var mymodule = '';
                        $.get("/api/module/"+item.module_Id,
                            function(datamodule, status){
                                $('#module').append('<option value="'+item.id+'">'+datamodule.module+'</option>');
                        }); 
                    });                        
                });
                //* LEVEL *//
                let level;
                $.get("/api/level",
                function(data, status){
                    data.forEach((item, index) => {
                      $('#level').append('<option value="'+item.id+'">'+item.level+'</option>'); 
                    });                        
                });
                const selectElementLEVEL = document.querySelector('#level');
                selectElementLEVEL.addEventListener('change', (event) => {
                  level = event.target.value;
                });
                //* SECTION *//
                $.get("/api/level/"+1+"/section",
                function(data, status){
                  data.forEach((item, index) => {
                      $('#section').append('<option value="'+item.id+'">'+item.section+'</option>'); 
                    });                         
                });
                let section;
                const selectElementSECTION = document.querySelector('#section');
                selectElementSECTION.addEventListener('change', (event) => {
                  section = event.target.value;
                });
                //* GROUP *//
                $.get("/api/level/"+1+"/section/"+1+"/group",
                function(data, status){
                  data.forEach((item, index) => {
                      $('#group').append('<option value="'+item.id+'">'+item.group+'</option>'); 
                    });                         
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

  <button hidden id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;">qr_code</button>
  {{-- <button id="btnChangeBg" class="material-icons floating-btn1">add</button>
  <button id="btnChangeBg" class="material-icons floating-btn2">save</button> --}}

  <div style="
  max-width: 70vw;
  margin-left: calc(10vw + 250px);
    margin-right: calc(10vw);
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
  <div style="
  max-width: 70vw;
  margin-left: calc(10vw + 250px);
    margin-right: calc(10vw);
  margin-top: 75px;
  border-radius: 10px;

  background: #f3f3f3;">
      <form name="exporter" method="GET" action="/teacher_dashboard/lecture/scanning" id="session_generator">
    <div class="confirm__content">
      <label class="labels" for="module">Module:</label>
      <select class="content__menu" name="module" id="module" form="exporter">
        <option disabled selected value="0">Module</option>
    </select>
    <label class="labels" for="level">Année:</label>
    <select class="content__menu" name="level" id="level" form="exporter">
      <option disabled selected value="0">Année</option>
  </select>
  <br>
  <label class="labels" for="section">Section:</label>
    <select class="content__menu" name="section" id="section" form="exporter">
      <option disabled selected value="0">Section</option>
  </select>
  <label class="labels" for="group">Groupe:</label>
  <select class="content__menu" name="group" id="group" form="exporter">
    <option disabled selected value="0">Groupe</option>
</select>
<br>
<label class="labels" for="from">Debut:</label>
<input class="content__menu" type="date" id="from" name="from" value="">
<label class="labels" for="to">Fin:</label>
<input class="content__menu" type="date" id="to" name="to" value="">

</div >
    <div class="confirm__buttons" style="  border-radius: 10px;">
        <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit" value="Export"/>
    </div>
</form></div>

</x-app-layout>
