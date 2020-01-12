<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\AttachedTask;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {

        return view('admin.index');
    }
    public function user()
    {
        $userId=Auth::user()->id;
        $tasks=Task::select()->where('userId',$userId)->get();

        $attachedtasks=AttachedTask::select()->where('to_userId',$userId)->get();
        return view('home',compact('tasks','attachedtasks'));
    }
}
