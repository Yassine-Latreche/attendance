
@section('page-title')
Groupes
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Groupes:</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numéro</th>
        <th>Groupe</th>
        <th style="width:10rem;">Voir ses etudiants</th>
        <th style="width:2rem;">Modifer</th>
        <th style="width:2rem;">Supprimer</th>
      </tr>
    </thead>
    <tbody id="student_rows">
        @foreach ($rows as $index => $row)
            <tr><td>{{ $index + 1 }}</td>
            <td>{{ $row['group'] }}</td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group'.'/'.strval($row['id']).'/student') }}'">view_list</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group'.'/'.strval($row['id'])) }}'">edit</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group'.'/'.strval($row['id']).'/delete') }}'">delete</button>
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
            <p>Ajouter un groupe:</p>
        </div>
        <br>
                <form class="form" id="groupForm" name="groupForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="number_of_students" id="number_of_students" placeholder="number_of_students" value="0">
                        <input type="text" class="form-control" name="group" id="group" placeholder="Groupe">
                        <label for="group">Groupe ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Ajouter" />
                </form>
  </div>
</x-app-layout>
