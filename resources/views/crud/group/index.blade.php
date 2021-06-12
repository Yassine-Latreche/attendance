
@section('page-title')
Create Section
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Groups :</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numero</th>
        <th>Group</th>
        <th style="width:10rem;">Voir ces etudiants</th>
        <th style="width:2rem;">Edit</th>
        <th style="width:2rem;">Delete</th>
      </tr>
    </thead>
    <tbody id="student_rows">
        @foreach ($rows as $index => $row)
            <tr><td>{{ $index + 1 }}</td>
            <td>{{ $row['group'] }}</td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/level/'.strval($row['level_Id']).'/section'.'/'.strval($row['section_Id']).'/group') }}'">view_list</button>
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
            <p>Add a group:</p>
        </div>
        <br>
                <form class="form" id="groupForm" name="groupForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="number_of_students" id="number_of_students" placeholder="number_of_students" value="0">
                        <input type="text" class="form-control" name="group" id="group" placeholder="Group">
                        <label for="group">Group ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Add" />
                </form>
  </div>
</x-app-layout>
