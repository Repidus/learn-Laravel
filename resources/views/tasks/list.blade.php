@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-sm-offset-2 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          할 일 추가
        </div>

        <div class="panel-body">
          <!--에러 출력-->
          @include('tasks.errors')
          <form action="{{ url('/add') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!--할 일 이름-->
            <div class="form-group">
              <label for="task-name" class="col-sm-3 control-label">할 일</label>

              <div class="col-sm-6">
                <input type="text" name="description" id="task-name" class="form-control" value="{{ old('task') }}">

              </div>
            </div>

              <!--할 일 추가 버튼-->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btnbtn-default">
                  <i class="fa fa-btnfa-plus"></i>할 일 추가
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!--할일목록-->
      <div class="panel panel-default">
        <div class="panel-heading">할 일 목록</div>
        <div class="panel-body">
          <table class="table table-striped task-table">
            <tr>
              <th>할 일</th>
              <th>&nbsp;</th>
            </tr>
            @forelse($tasks as $task)
            <tr>
              <td class="table-text">
                {{ $task->description}}
              </td>
              <!--삭제버튼-->
              <td>
                <form action="{{ url('/remove/'.$task->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" id="delete-task-{{ $task->id }}" class="btnbtn-danger pull-right" onclick="if(!confirm('정말로 삭제하시겠습니까?')) return false;">
                    <i class="fa fa-btnfa-trash"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td colspan="2" class="table-text">
                  할 일이 없습니다!
                </td>
              </tr>
            @endforelse
          </table>
        </div>
      </div>

    </div>
  </div>
@endsection
