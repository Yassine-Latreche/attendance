@section('page-title')
Etudiants
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js"></script>
  <script>
    $(function () {
      $("select").select2();
    });
  </script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
      <p>Etudiants:</p>
    </div>
    <br>
    <table class="content-table" id="student_table">
      <thead>
        <tr>
          <th style="width : 2rem;">Numéro</th>
          <th>Nom</th>
          <th style="width:15rem;">Email</th>
          <th style="width:2rem;">Modifier</th>
          <th style="width:2rem;">Supprimer</th>
        </tr>
      </thead>
      <tbody id="student_rows">
        @foreach($rows as $index => $row)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row['name'] }}</td>
            <td>{{ $row['email'] }}</td>
            <td>
              <button type="button" class="btn btn-success material-icons"
                onclick="location.href='{{ url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group'.'/'.strval($row['group_Id']).'/student'.'/'.strval($row['id'])) }}'">edit</button>
            </td>
            <td>
              <button type="button" class="btn btn-success material-icons"
                onclick="location.href='{{ url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group'.'/'.strval($row['group_Id']).'/student'.'/'.strval($row['id']).'/delete') }}'">delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
      <p>Ajouter un étudiant:</p>
    </div>
    <br>
    <form class="form" id="studentForm" name="studentForm" role="form" method="POST">
      @csrf
      <div class="form-floating mb-3">
        <input type="text" hidden name="level_Id" id="level_Id" placeholder="level_Id"
          value="{{ $row['level_Id'] }}">
        <input type="text" hidden name="level_Id" id="level_Id" placeholder="level_Id"
          value="{{ $row['level_Id'] }}">
        <input type="text" hidden name="section_Id" id="section_Id" placeholder="section_Id"
          value="{{ $row['section_Id'] }}">
        <input type="text" hidden name="group_Id" id="group_Id" placeholder="group_Id"
          value="{{ $row['group_Id'] }}">
        <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
        <label for="name">Nom ...</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <label for="email">Email ...</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="national_Student_Id" id="national_Student_Id"
          placeholder="Identifiant national de l'étudiant">
        <label for="national_Student_Id">Identifiant national de l'étudiant ...</label>
      </div>
      <div class="form-floating mb-3">
        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Numéro de téléphone">
        <label for="phone_number">Numéro de téléphone ...</label>
      </div>
      <div class="row align-items-center">
        <div class="col-2">
          <label class="labels" for="birthday">Date de naissance:</label>
        </div>
        <div class="col-2">
          <input class="content__menu" type="date" id="birthday" name="birthday" value="">
        </div>
      </div>
      <br>
      <div class="row align-items-center">
        <div class="form-floating col-3">
          <input type="text" class="form-control" name="living_area" id="living_area" placeholder="Wilaya de résidence">
          <label for="living_area">Wilaya de résidence ...</label>
        </div>
        <div class="form-floating col-3">
          <input type="text" class="form-control" name="willaya_d_origine" id="willaya_d_origine"
            placeholder="Wilaya d'origine">
          <label for="willaya_d_origine">Wilaya d'origine ...</label>
        </div>
        {{--                         <div class="col-1">
                          <label class="labels" for="initialized">Initialized:</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control input-lg" name="initialized" id="initialized">
                              <option disabled selected value="null">Initialized</option>
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                        </div> --}}
      </div>
      <br>

      <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
        value="Ajouter" />
    </form>
  </div>
</x-app-layout>