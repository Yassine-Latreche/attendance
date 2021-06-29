@section('page-title')
Modifier La Scénce
@endsection
<x-app-layout>
  <script src="{{ mix('js/getDetails.js') }}" defer></script>
  <script>
  $(function() {
    edittimetable( "{{ $data['module_Id'] }}", "{{ $data['professor_Id'] }}", "{{ $data['lecture_Type'] }}", "{{ $data['level_Id'] }}", "{{ $data['section_Id'] }}", "{{ ($data['group_Id'] == null) ? 'all' : $data['group_Id'] }}", "{{ $data['day_Of_Week']}}");
    $("select").select2();
  });
  </script>
  <script src="/js/momentjs.min.js" ></script>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Modifier La Scénce:</p>
        </div>
        <br>
        <form class="form" id="timetableForm" name="timetableForm" role="form" method="POST" >
          @csrf
          <input type="text" hidden name="id" id="id" placeholder="d" value="{{ $data['id'] }}">
            <div class="form-group form-group-lg">
              <div class="row align-items-center">
                  <div class="col-1">
                      <label class="labels" for="module_Id">Module:</label>
                  </div>
                  <div class="col-2">
                      <select class="form-control input-lg" name="module_Id" id="module_Id">
                          <option disabled value="0">Module</option>
                      </select>
                  </div>
                  <div class="col-1">
                      <label class="labels" for="professor_Id">Professeur:</label>
                  </div>
                  <div class="col-3">
                      <select class="form-control input-lg" name="professor_Id" id="professor_Id">
                          <option disabled value="0">Professeur</option>
                      </select>
                  </div>
                  <div class="col-1">
                    <label class="labels" for="lecture_Type">Type:</label>
                  </div>
                  <div class="col-2">
                      <select class="form-control input-lg" name="lecture_Type" id="lecture_Type">
                        <option disabled value="0">Type</option>
                      </select>
                  </div>
              </div>
          </div>
          <br>
          <div class="form-group form-group-lg">
            <div class="row align-items-center">
                <div class="col-1">
                    <label class="labels" for="level_Id">Année:</label>
                </div>
                <div class="col-2">
                    <select class="form-control input-lg" name="level_Id" id="level_Id">
                        <option disabled value="0">Level</option>
                    </select>
                </div>
                <div class="col-1">
                    <label class="labels" for="section_Id">Section:</label>
                </div>
                <div class="col-2">
                    <select class="form-control input-lg" name="section_Id" id="section_Id">
                    </select>
                </div>
                <div class="col-1">
                  <label class="labels" for="group_Id">Groupe:</label>
                </div>
                <div class="col-2">
                    <select class="form-control input-lg" name="group_Id" id="group_Id">
                      <option value="all">All</option>
                    </select>
                </div>
            </div>
         </div>
         <br>
         <div class="form-group form-group-lg">
           <div class="row align-items-center">
              <div class="col-1">
                  <label class="labels" for="day_Of_Week">Jour:</label>
              </div>
              <div class="col-2">
                  <select class="form-control input-lg" name="day_Of_Week" id="day_Of_Week">
                    <option disabled value="0">Jour</option>
                  </select>
              </div>
              <div class="col-1">
                  <label class="labels" for="starting">Début:</label>
              </div>
              <div class="col-2">
                <input class="content__menu" type="time" id="starting" name="starting" value="{{ $data['starting'] }}">
              </div>
              <div class="col-1">
                <label class="labels" for="ending">Fin:</label>
              </div>
              <div class="col-2">
                <input class="content__menu" type="time" id="ending" name="ending" value="{{ $data['ending'] }}">
              </div>
           </div>
        </div>
        <br>
        <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
            value="Modifier" />
      </form>
  </div>
</x-app-layout>
