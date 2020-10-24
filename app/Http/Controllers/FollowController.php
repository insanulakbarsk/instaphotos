<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Follow;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Follow::firstOrCreate([
            'user_id' => $request["user_id"],
            'follower_user_id' => Auth::id(),
        ]);

        return redirect('/post');
    }

    public function destroy($id)
    {
        Follow::where('user_id', '=', $id)->where('follower_user_id', '=', Auth::id())->delete();

        return redirect('post');
    }
}
