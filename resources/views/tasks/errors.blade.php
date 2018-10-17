@if (count($errors) > 0)
  <!--Form 에러리스트-->
  <div class="alert alert-danger">
    <strong>앗! 뭔가 잘못되었습니다.</strong>

    <br><br>

    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
