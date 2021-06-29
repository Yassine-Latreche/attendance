
@section('page-title')
Sections
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Sections:</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numéro</th>
        <th>Section</th>
        <th style="width:10rem;">Voir ses groupes</th>
        <th style="width:2rem;">Modifier</th>
        <th style="width:2rem;">Supprimer</th>
      </tr>
    </thead>
    <tbody id="student_rows">
        @foreach ($rows as $index => $row)
            <tr><td>{{ $index + 1 }}</td>
            <td>{{ $row['section'] }}</td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['id']).'/group') }}'">view_list</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['id'])) }}'">edit</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['id']).'/delete') }}'">delete</button>
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
            <p>Ajoutre une section:</p>
        </div>
        <br>
                <form class="form" id="sectionForm" name="sectionForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="number_of_students" id="number_of_students" placeholder="number_of_students" value="0">
                        <input type="text" class="form-control" name="section" id="section" placeholder="Section">
                        <label for="section">Section ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Ajouter" />
                </form>
  </div>
</x-app-layout>
