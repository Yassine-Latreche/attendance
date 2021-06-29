@section('page-title')
Modifier le module
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Modifier le module:</p>
        </div>
        <br>
                <form class="form" id="moduleForm" name="moduleForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="id" id="id" placeholder="d" value="{{ $data['id'] }}">
                        <input type="text" class="form-control" name="module" id="module" placeholder="Module" value="{{ $data['module'] }}">
                        <label for="module">Module ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Modifier" />
                </form>
  </div>
</x-app-layout>
