@section('page-title')
Numérisation
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
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

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="    min-height: 650px; width: 650px;
          padding-bottom: 25px !important; margin: auto">
            <script>
              window.addEventListener("load", myInit, true); function myInit(){
              function nowtime(){
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
                var date = document.getElementById("date");
  date.innerHTML = moment().format('dddd, MMMM Do YYYY');
  f2 = setInterval( nowtime()
    , 1000);
                      f1 = setInterval(function() {
                        nowtime()
                          $.post("/api/generate_qr_code",
                              {
                                  lecture_Id: {{ $lecture_Id }},
                              },
                              function(data, status){
                                  $('#qrcode').empty();
          
                                  // Set Size to Match User Input
                                  $('#qrcode').css({
                                  'width' : '600',
                                  'height' : '600',
                                  'margin-bottom': '10'
                                  })
          
                                  // Generate and Output QR Code
                                  $('#qrcode').qrcode({width: '600',height:'600',text: data+{{ $lecture_Id }}});
          
                              });
                      }, 1000);
                  }
            </script>
            <input hidden type="number" class="qr-size" value="860" min="20" max="500">
                          
                  <br>
                  
                  <div style="
                      margin: auto;
                      
                  " id="qrcode" ></div>
          </div>
      </div>
  </div>
  <form name="summaryform" id="summaryform" action="{{ url("teacher_dashboard/summary") }}" method="GET">
    <input form="summaryform" hidden type="text" name="lecture_Id" id="lecture_Id" value="{{ $lecture_Id }}">
  <input type="submit" id="btnChangeBg" class="material-icons floating-btn" style="font-size: 40px;" value="check_circle">
</form>
</x-app-layout>

