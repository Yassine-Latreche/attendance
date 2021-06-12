@section('page-title')
Create Group
@endsection
<x-app-layout>
  <script src="/js/momentjs.min.js" ></script>
    <div style="
  padding: 20px;
  border-radius: 10px;
    background: #f3f3f3;">
    <div class="row" style="font-size: 2rem">
            <p>Edit a group:</p>
        </div>
        <br>
                <form class="form" id="groupForm" name="groupForm" role="form" method="POST" >
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="id" id="id" placeholder="id" value="{{ $data['id'] }}">
                        <input type="text" hidden name="number_of_students" id="number_of_students" placeholder="number_of_students" value="{{ $data['number_of_students'] }}">
                        <input type="text" class="form-control" name="group" id="group" placeholder="Group" value="{{ $data['group'] }}">
                        <label for="group">Group ...</label>
                    </div>
                    <input class="confirm__button confirm__button--ok confirm__button--fill" type="submit" name="submit"
                        value="Edit" />
                </form>
  </div>
</x-app-layout>
