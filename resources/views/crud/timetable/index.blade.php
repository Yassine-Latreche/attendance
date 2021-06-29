@section('page-title')
Emploi Du Temps
@endsection
<x-app-layout>
  <script src="{{ mix('js/getDetails.js') }}" defer></script>
  <script>
  $(function() {
    addtimetable();
    $("select").select2();
  });
  </script>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Emploi Du Temps :</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numéro</th>
        <th>Module</th>
        <th>Professeur</th>
        <th>Avec</th>
        <th style="width:2rem;">Type</th>
        <th style="width:2rem;">Jour</th>
        <th style="width:2rem;">Debut</th>
        <th style="width:2rem;">Fin</th>
        <th style="width:2rem;">Modifier</th>
        <th style="width:2rem;">Supprimer</th>
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
            <p>Ajouter une scénce:</p>
            </div>
            <br>
            <form class="form" id="timetableForm" name="timetableForm" role="form" method="POST" >
                @csrf
                  <div class="form-group form-group-lg">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <label class="labels" for="module_Id">Module:</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control input-lg" name="module_Id" id="module_Id">
                                <option disabled selected value="0">Module</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label class="labels" for="professor_Id">Professeur:</label>
                        </div>
                        <div class="col-3">
                            <select class="form-control input-lg" name="professor_Id" id="professor_Id">
                                <option disabled selected value="0">Professeur</option>
                            </select>
                        </div>
                        <div class="col-1">
                          <label class="labels" for="lecture_Type">Type:</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control input-lg" name="lecture_Type" id="lecture_Type">
                              <option disabled selected value="0">Type</option>
                              <option value="cours">Cours</option>
                              <option value="TD">TD</option>
                              <option value="TP">TP</option>
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
                              <option disabled selected value="0">Année</option>
                          </select>
                      </div>
                      <div class="col-1">
                          <label class="labels" for="section_Id">Section:</label>
                      </div>
                      <div class="col-2">
                          <select class="form-control input-lg" name="section_Id" id="section_Id">
                              <option disabled selected value="0">Section</option>
                          </select>
                      </div>
                      <div class="col-1">
                        <label class="labels" for="group_Id">Groupe:</label>
                      </div>
                      <div class="col-2">
                          <select class="form-control input-lg" name="group_Id" id="group_Id">
                            <option disabled selected value="0">Groupe</option>
                            <option value="all">Tous</option>
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
                          <option disabled selected value="0">Jour</option>
                          <option value="sunday">Dimanche</option>
                          <option value="monday">Lundi</option>
                          <option value="tuesday">Mardi</option>
                          <option value="wednesday">Mercredi</option>
                          <option value="thursday">Jeudi</option>
                          <option value="friday">Vendredi</option>
                          <option value="saturday">Samedi</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <label class="labels" for="starting">Début:</label>
                    </div>
                    <div class="col-2">
                      <input class="content__menu" type="time" id="starting" name="starting" value="">
                    </div>
                    <div class="col-1">
                      <label class="labels" for="ending">Fin:</label>
                    </div>
                    <div class="col-2">
                      <input class="content__menu" type="time" id="ending" name="ending" value="">
                    </div>
                 </div>
              </div>
              <br>
              <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                  value="Ajouter" />
            </form>
  </div>
</x-app-layout>
