<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Auth;

class TaskController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    // 이 컨트롤러는 로그인해야 접근 가능
  }

  // 할 일 목록 (get)
  public function index() {
    $tasks = Task::where('user_id',
    Auth::user()->id)->get();

    return view('tasks.list', [
      'tasks' => $tasks,
    ]);
  }

  // 할 일 추가 (post)
  public function store(Request $request) {
    $this->validate($request, [
      'description' => 'required|max:255',
    ]);

    $request->user()->tasks()->create([
      'description' => $request->description,
    ]);

    return redirect('/tasks');
  }

  // 할 일 삭제 (delete)
  public function destroy(Request $request, $task) {
    $task = Task::where('id', $task)->first();

    if (Auth::user()->id == $task->user_id)
      $task->delete();

    return redirect('/tasks');
  }
}
