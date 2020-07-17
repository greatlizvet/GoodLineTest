<?php

namespace App\Http\Controllers;

use App\Pasta;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function index($id)
    {
        //проверка авторизации
        if(Auth::check())
        {
            //запрошенный юзер
            $user = User::findOrFail($id);
            //является ли запрошенный юзер тем, кем является авторизованный
            if($user->can('view', Auth::user()))
            {
                //выборка паст юзера
                $userPastas = Pasta::where('user_id', $id)
                                    ->where(function($q) {
                                        $q->where('end_date', '>', new DateTime())
                                        ->orWhere('end_date', null);
                                        })
                                    ->orderBy('create_date', 'desc')
                                    ->paginate(10);
                //страница с пастами
                return $this->responseView('user.index', [
                    'user' => $user, 
                    'allUserPastas' => $userPastas
                    ]);
            }
        }

        return redirect('/');
    }
}
