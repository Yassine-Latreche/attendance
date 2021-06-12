@section('page-title')
Summary
@endsection

<x-app-layout>

  <script>
  function getDetails() {
            $.post('{{ url("/api/record/search") }}',
                {
                    lecture_Id: {{ $lecture_Id }},
                },
                function(data, status){
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
      
    </tbody>
  </table>
</x-app-layout>
