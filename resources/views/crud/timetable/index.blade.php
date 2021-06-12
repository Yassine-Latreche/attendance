@section('page-title')
Create Timetable
@endsection
<x-app-layout>
  <script>
    <script src="{{ mix('js/getDetails.js') }}" defer></script>
  $(function() {
    $("#module_Id").select2();  
    $("#professor_Id").select2();  
    $("#level_Id").select2();  
    $("#section_Id").select2();  
    $("#group_Id").select2();  
    $("#day_Of_Week").select2();
  });
  </script>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Timetables :</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numero</th>
        <th>Module</th>
        <th>Professor</th>
        <th>Avec</th>
        <th style="width:2rem;">Type</th>
        <th style="width:2rem;">Jour</th>
        <th style="width:2rem;">Debut</th>
        <th style="width:2rem;">Fin</th>
        <th style="width:2rem;">Edit</th>
        <th style="width:2rem;">Delete</th>
      </tr>
    </thead>
    <tbody id="student_rows">
        @foreach ($rows as $index => $row)
            <tr><td>{{ $index + 1 }}</td>
            <td>{{ $row['module'] }}</td>
            <td>{{ $row['professor'] }}</td>
            <td>{{ $row['avec'] }}</td>
            <td>{{ $row['lecture_Type'] }}</td>
            <td>{{ $row['day_Of_Week'] }}</td>
            <td>{{ $row['starting'] }}</td>
            <td>{{ $row['ending'] }}</td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/timetable/'.strval($row['id'])) }}'">edit</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/timetable/'.strval($row['id']).'/delete') }}'">delete</button>
            </td></tr>
        @endforeach
    </tbody>
  </table>
  </div>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Add a timetable:</p>
            </div>
            <br>
            <form class="form" id="timetableForm" name="timetableForm" role="form" method="POST" >
                @csrf
                  <div class="form-group form-group-lg">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <label class="labels" for="module_Id">Module:</label>
                        </div>
                        <div class="col-3">
                            <select class="form-control input-lg" name="module_Id" id="module_Id">
                                <option disabled selected value="0">Module</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label class="labels" for="professor_Id">Professor:</label>
                        </div>
                        <div class="col-3">
                            <select class="form-control input-lg" name="professor_Id" id="professor_Id">
                                <option disabled selected value="0">Professor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                  <div class="row align-items-center">
                      <div class="col-1">
                          <label class="labels" for="level_Id">Level:</label>
                      </div>
                      <div class="col-1">
                          <select class="form-control input-lg" name="level_Id" id="level_Id">
                              <option disabled selected value="0">Level</option>
                          </select>
                      </div>
                      <div class="col-1">
                          <label class="labels" for="section_Id">Section:</label>
                      </div>
                      <div class="col-1">
                          <select class="form-control input-lg" name="section_Id" id="section_Id">
                              <option disabled selected value="0">Section</option>
                          </select>
                      </div>
                      <div class="col-1">
                        <label class="labels" for="group_Id">Group:</label>
                      </div>
                      <div class="col-1">
                          <select class="form-control input-lg" name="group_Id" id="group_Id">
                              <option disabled selected value="0">Group</option>
                          </select>
                      </div>
                  </div>
               </div>
               <div class="form-group form-group-lg">
                 <div class="row align-items-center">
                    <div class="col-1">
                        <label class="labels" for="day_Of_Week">Day:</label>
                    </div>
                    <div class="col-2">
                        <select class="form-control input-lg" name="day_Of_Week" id="day_Of_Week">
                          <option disabled selected value="0">Jour</option>
                          <option disabled selected value="sunday">Sunday</option>
                          <option disabled selected value="monday">Monday</option>
                          <option disabled selected value="tuesday">Tuesday</option>
                          <option disabled selected value="wednesday">Wednesday</option>
                          <option disabled selected value="thursday">Thursday</option>
                          <option disabled selected value="friday">Friday</option>
                          <option disabled selected value="saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <label class="labels" for="starting">Starting:</label>
                    </div>
                    <div class="col-4">
                      <input class="content__menu" type="time" id="starting" name="starting" value="">
                    </div>
                    <div class="col-1">
                      <label class="labels" for="ending">Ending:</label>
                    </div>
                    <div class="col-4">
                      <input class="content__menu" type="time" id="ending" name="ending" value="">
                    </div>
                 </div>
              </div>
              <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                  value="Add" />
            </form>
  </div>
</x-app-layout>
