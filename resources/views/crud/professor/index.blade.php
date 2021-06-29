@section('page-title')
Professeur
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
  <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;
    margin-bottom: 25px">
    <div class="row" style="font-size: 2rem">
            <p>Professeurs :</p>
        </div>
        <br>
  <table class="content-table" id="student_table" >
    <thead>
      <tr>
        <th style="width : 2rem;">Numéro</th>
        <th>Professeur</th>
        <th>Email</th>
        <th>Numéro de téléphone</th>
        <th style="width:2rem;">Modifier</th>
        <th style="width:2rem;">Supprimer</th>
      </tr>
    </thead>
    <tbody id="student_rows">
        @foreach ($rows as $index => $row)
            <tr><td>{{ $index + 1 }}</td>
            <td>{{ $row['name'] }}</td>
            <td>{{ $row['email'] }}</td>
            <td>{{ '0'.strval($row['phone_number']) }}</td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/professor/'.strval($row['id'])) }}'">edit</button>
            </td>
            <td>
            <button type="button" class="btn btn-success material-icons" onclick="location.href='{{  url( 'teacher_dashboard/professor/'.strval($row['id']).'/delete') }}'">delete</button>
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
            <p>Ajouter un professeur:</p>
        </div>
        <br>
                <form class="form" id="professorForm" name="professorForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
                        <label for="professor">Nom ...</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <label for="email">Email ...</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Numéro de téléphone">
                        <label for="phone_number">Numéro de téléphone ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Ajouter" />
                </form>
  </div>
</x-app-layout>
