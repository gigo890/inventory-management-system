<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
class userController extends Controller
{
    public function view_users(){
        $users = UserRegister::orderBy('id', 'desc')->get();
        return response()->json([
            'users' => $users,
            'status' => 200,
        ]);
    }
    public function updateStatus(Request $request)
        {
            $user = UserRegister::find($request->id);
            $user->userrole = $request->status;
            $user->save();
            return response()->json([
                'status' => 200,
                'message'=>'<div class="alert alert-success confirm_msgs" role="alert">
                    Status Updates Successsfully!
                </div>'
            ]);
        }

}
