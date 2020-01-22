<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

  private $userInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(UserServiceInterface $userInterface)
  {

    $this->middleware('auth');
    $this->userInterface = $userInterface;
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $userList = $this->userInterface->getUserList();

    if(auth()->user()->type==0){
        return view('users.user_list', [
            'userList' => $userList,
        ]);
    }
    else{
        return view('users.user_profile');
    }
  }
  
}
