@section('page-title')
Modifier l'étudiant
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
  <script>
    $(function() {
      $("select").select2();
    });
  </script>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Modifier l'étudiant:</p>
        </div>
        <br>

                <form class="form" id="studentForm" name="studentForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                      <input type="text" hidden name="id" id="id" placeholder="id" value="{{ $data['id'] }}">
                      <input type="text" hidden name="level_Id" id="level_Id" placeholder="level_Id" value="{{$data['level_Id']}}">
                      <input type="text" hidden name="level_Id" id="level_Id" placeholder="level_Id" value="{{$data['level_Id']}}">
                      <input type="text" hidden name="section_Id" id="section_Id" placeholder="section_Id" value="{{$data['section_Id']}}">
                      <input type="text" hidden name="group_Id" id="group_Id" placeholder="group_Id" value="{{$data['group_Id']}}">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{ $data['name'] }}">
                      <label for="name">Nom ...</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $data['email'] }}">
                      <label for="email">Email ...</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="national_Student_Id" id="national_Student_Id" placeholder="Identifiant national de l'étudiant" value="{{ $data['national_Student_Id'] }}">
                      <label for="national_Student_Id">Identifiant national de l'étudiant ...</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Numéro de téléphone" value="{{ '0'.strval($data['phone_number']) }}">
                      <label for="phone_number">Numéro de téléphone ...</label>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-2">
                          <label class="labels" for="birthday">Date de naissance:</label>
                      </div>
                      <div class="col-2">
                          <input class="content__menu" type="date" id="birthday" name="birthday" value="{{ $data['birthday'] }}">
                        </div>
                      </div>
                      <br>
                      <div class="row align-items-center">
                        <div class="form-floating col-3">
                          <input type="text" class="form-control" name="living_area" id="living_area" placeholder="Wilaya de résidance" value="{{ $data['living_area'] }}">
                          <label for="living_area">Wilaya de résidance ...</label>
                        </div>
                        <div class="form-floating col-3">
                          <input type="text" class="form-control" name="willaya_d_origine" id="willaya_d_origine" placeholder="Wilaya d'origine" value="{{ $data['willaya_d_origine'] }}">
                          <label for="willaya_d_origine">Wilaya d'origine ...</label>
                        </div>
                        <div class="col-1">
                          <label class="labels" for="initialized">Initialisé:</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control input-lg" name="initialized" id="initialized">
                              <option disabled selected value="null">Initialisé ...</option>
                              <option value="0">Non</option>
                              <option value="1">Oui</option>
                            </select>
                        </div>
                      </div>
                      <br>

                      <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Modifier" />
  </div>
</x-app-layout>
