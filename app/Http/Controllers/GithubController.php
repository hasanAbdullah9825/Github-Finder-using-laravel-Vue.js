<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    public function getGitUserList(Request $request){
        $this->validate($request, [
            'username' => 'required',
        ]);
        $response = Http::get('https://api.github.com/search/users?q='.$request->username);
        return response()->json([
            'allUserData'=> $response->json(),
        ], 200);

    }

    public function getGitUserDetails($username){
        $userDetails = Http::get('https://api.github.com/users/'.$username);
        $usersAllRepository = Http::get('https://api.github.com/users/'.$username.'/repos');
        $usersPinRepository=HTTP::get('https://gh-pinned-repos-5l2i19um3.vercel.app/?username='.$username);
        return response()->json([
            'userDetails'=> $userDetails->json(),
            'usersAllRepository'=>$usersAllRepository->json(),
            'usersPinRepository'=>$usersPinRepository->json()
            
        ], 200);
    }

 
} 
