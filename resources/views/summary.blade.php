@section('page-title')
Résumé
@endsection

<x-app-layout>
  <script src="{{ mix('js/d3-scale-chromatic.v1.min.js') }}"></script>

  <script>
    function getDetails() {
      var cpt = 0;
            $.post('{{ url("/api/record/search") }}',
                {
                    lecture_Id: {{ $lecture_Id }},
                },
                function(data, status){
                    data.forEach((item, index) => {
                      cpt += 1;
                        $('#student_rows').append("<tr><td>"+item.student+"</td><td>"+item.section+"</td><td>"+item.group+"</td></tr>");
                    });                        
                });
                return cpt;
            }  
  window.onload = function () {
    var pres = getDetails();
//
    var mydata;
       $.ajax({
          url: "/api/lectures/where/"+{{ $lecture_Id }}, 
          success: function (datta) {
            if ('section' in datta) {
            $.ajax({
                url: "/api/section/"+datta['section'],
                success: function (sct) {
                  mydata = {...{
                    Présents: pres,
                    Absents: sct.number_of_students - pres
                  }
                  };                
                },
                async: false
            });
          } else {
            $.ajax({
                url: "/api/group/"+$datta['group'],
                success: function (grp) {
                    mydata = {...{
                    Présents: pres,
                    Absents: grp.number_of_students - pres
                    }
                    };             
                  },
                async: false
            });
          }            
        },
        async: false
      });
      // set the dimensions and margins of the graph
      var width = 350
    height = 350
    margin = 5
    total = pres + mydata['Absents']
    pourcentage = Number((pres / total *100).toFixed(2));
    $("#present").text("Presents: "+pres);
    $("#absent").text("Absents: "+mydata['Absents']);
    $("#total").text("Total: "+total);
    $("#pourcentage").text("Pourcentage: "+pourcentage+"%");
    if (pres == 0) {
      $("#student_table").empty();
    }
      // The radius of the pieplot is half the width or half the height (smallest one). I subtract a bit of margin.
      var radius = Math.min(width, height) / 2 - margin      
      // append the svg object to the div called 'my_dataviz'
      var svg = d3.select("#my_dataviz")
        .append("svg")
          .attr("width", width)
          .attr("height", height)
        .append("g")
          .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
      
      // Create dummy data
      var data = {...mydata};
      
      // set the color scale
      var color = d3.scaleOrdinal()
        .domain(["Présents", "Absents"])
        .range(["#00d6aa", "#007059"]);
      // Compute the position of each group on the pie:
      var pie = d3.pie()
        .value(function(d) {return d.value; })
      var data_ready = pie(d3.entries(data))

      // Build the pie chart: Basically, each part of the pie is a path that we build using the arc function.
      svg
        .selectAll('whatever')
        .data(data_ready)
        .enter()
        .append('path')
        .attr('d', d3.arc()
          .innerRadius(100)         // This is the size of the donut hole
          .outerRadius(radius)
        )
        .attr('fill', function(d){ return(color(d.data.key)) })
        .attr("stroke", "white")
        .style("stroke-width", "2px")
        .style("opacity", 0.7)
//
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
        <p id="date" style="text-transform: capitalize;"></p>
      </div>
    </div>
  </div>
  <div style="
   margin-top: 25px;
   padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row">
      <div class="col-sm-4">
        <div id="my_dataviz"></div>
      </div>
      <div class="col-sm-4">
        <div class="container">
          <h2 style="font-size: 2.5rem; color: #009879">Statistiques sur la scéance:</h2>
        </div>
        <br>
        <div class="container">
          <div style="float:left; margin-right:10px;height: 22px; width: 22px; background-color:#00d6aa"></div>
          <p id="present"></p>
        </div>
        <br>
        <div class="container">
          <div style="float:left; margin-right:10px; height: 22px; width: 22px; background-color:#007059"></div>
          <p id="absent"></p>
        </div>
        <br>
        <div class="container">
          <p id="total"></p>
        </div>
        <br>
        <div class="container">
          <p id="pourcentage"></p>
        </div>
      </div>
    </div>
  </div>
  <table class="content-table" id="student_table" style="    margin-top: 25px;
">
    <thead>
      <tr>
        <th>Etudiant</th>
        <th>Section</th>
        <th>Groupe</th>
      </tr>
    </thead>
    <tbody id="student_rows">

    </tbody>
  </table>
  <div id="btnChangeBg" class="floating-btn" style="text-align:center;">
    <a href="{{ url("teacher_dashboard") }}" class="material-icons " style=" font-size: 40px;">home</a>
  </div>
  {{-- <form name="summaryform" id="summaryform" action="{{ url("teacher_dashboard") }}" >
  <input type="submit" id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;" value="home">
  </form> --}}
</x-app-layout>