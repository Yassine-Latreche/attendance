@section('page-title')
Modifier le professeu
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Modifier le professeur:</p>
        </div>
        <br>
                <form class="form" id="professorForm" name="professorForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="id" id="id" placeholder="d" value="{{ $data['id'] }}">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{ $data['name'] }}">
                        <label for="professor">Nom ...</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $data['email'] }}">
                        <label for="email">Email ...</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Numéro de téléphone" value="{{ '0'.strval($data['phone_number']) }}">
                        <label for="phone_number">Numéro de téléphone ...</label>
                    </div>                    
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Modifier" />
                </form>
  </div>
</x-app-layout>
