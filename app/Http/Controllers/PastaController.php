<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastaPost;
use App\Pasta;
use Carbon\Carbon;
use DateTime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PastaController extends BaseController
{
    public function index(Request $request)
    {
        $searchString = $request->get('search');
        $items = [];

        if(!empty($searchString))
        {
            $items = Pasta::getSearchingPastas($searchString);
        }

        return $this->responseView('pasta.index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        if(Auth::check())
        {
            return $this->responseView('pasta.create', ['statuses' => Pasta::getStatuses(),
                                                    'intervals' => Pasta::getTimeInterval(),
                                                    'syntax' => Pasta::SYNTAX_TYPE]);
        }

        return route('login');
    }

    public function store(PastaPost $request)
    {
        $validation = $request->validated();
        $createParams = $request->all();
        $createdDate = Carbon::now();

        $pasta = new Pasta($validation);
        $pasta->create_date = $createdDate->toDateTimeString();
        $pasta->end_date = $this->setEndTime($createParams['time'], $createdDate);
        $pasta->hash = $this->generateUniqHash();

        $pasta->save();

        return redirect('/index')->with('status', 'http://127.0.0.1:8000/' . $pasta->hash);
    }

    public function show($hash)
    {
        $pasta = Pasta::where('hash', $hash)->first();

        if($pasta == null)
        {
            abort(404);
        }

        if($pasta->end_date >= new DateTime())
        {
            return $this->responseView('pasta.timeout');
        }
        

        return $this->responseView('pasta.show', ['pasta' => $pasta]);
    }

    public function update($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $pasta = Pasta::findOrFail($id);

        if($user->can('update', $pasta))
        {
            $pasta->private = true;
            $pasta->save();

            return redirect("/$pasta->hash");
        }

        return redirect('/');
    }

    private function setEndTime($time, Carbon $date)
    {
        $createDate = $date->clone();

        switch($time)
        {
            case 1:
                $createDate->addMinutes(10);
                return $createDate->toDateTimeString();
            case 2:
                $createDate->addHour();
                return $createDate->toDateTimeString();
            case 3:
                $createDate->addHours(3);
                return $createDate->toDateTimeString();
            case 4:
                $createDate->addDay();
                return $createDate->toDateTimeString();
            case 5:
                $createDate->addWeek();
                return $createDate->toDateTimeString();
            case 6:
                $createDate->addMonth();
                return $createDate->toDateTimeString();
            case 7:
                return null;
            default:
                return null;
        }
    }

    private function generateUniqHash()
    {
        while(true)
        {
            $hash = md5(uniqid(rand(), true));
            $pasta = Pasta::where('hash', $hash)->first();

            if($pasta == null)
        break;
        }

        return $hash;
    }
}
