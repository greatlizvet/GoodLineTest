<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    const STATUS_PUBLIC=1;
    const STATUS_UNLISTED = 0;

    const TIME_10MIN = 1;
    const TIME_1HOUR = 2;
    const TIME_3HOURS = 3;
    const TIME_1DAY = 4;
    const TIME_1WEEK = 5;
    const TIME_1MONTH = 6;
    const TIME_ALL = 7;

    public const SYNTAX_TYPE = [
        'php' => 'PHP',
        'javascript' => 'JS',
        'htmlmixed' => 'HTML',
    ];

    protected $fillable = ['name', 'body', 'status', 'user_id', 'syntax'];

    public static function getStatuses()
    {
        return [
            'public' => [
                'value' => self::STATUS_PUBLIC,
                'text' => trans('common.public')
            ],
            'unlisted' => [
                'value' => self::STATUS_UNLISTED,
                'text' => trans('common.unlisted')
            ],
        ];
    }

    public static function getTimeInterval()
    {
        return [
            '10min' => [
                'value' => self::TIME_10MIN,
                'text' => trans('time.10min')
            ],
            '1h' => [
                'value' => self::TIME_1HOUR,
                'text' => trans('time.1h')
            ],
            '3h' => [
                'value' => self::TIME_3HOURS,
                'text' => trans('time.3h')
            ],
            '1d' => [
                'value' => self::TIME_1DAY,
                'text' => trans('time.1d')
            ],
            '1w' => [
                'value' => self::TIME_1WEEK,
                'text' => trans('time.1w')
            ],
            '1m' => [
                'value' => self::TIME_1MONTH,
                'text' => trans('time.1m')
            ],
            'none' => [
                'value' => self::TIME_ALL,
                'text' => trans('time.none')
            ]
        ];
    }

    public static function getPastasList()
    {
        return Pasta::where('status', 1)
                    ->where(function($q) {
                        $q->where('end_date', '>', new DateTime())
                          ->orWhere('end_date', null);
                    })
                    ->where('private', 0)
                    ->orderBy('create_date', 'desc')
                    ->take(10)
                    ->get();
    }

    public static function getUserPastas($id)
    {
        return Pasta::where('user_id', $id)
                    ->where(function($q) {
                        $q->where('end_date', '>', new DateTime())
                          ->orWhere('end_date', null);
                    })
                    ->orderBy('create_date', 'desc')
                    ->take(10)
                    ->get();
    }

    public static function getSearchingPastas(string $searchString)
    {
        return Pasta::where(function($q) {
                        $q->where('end_date', '>', new DateTime())
                        ->orWhere('end_date', null);})
                    ->where('private', 0)
                    ->where('name', 'LIKE', '%' . $searchString . '%')
                    ->orWhere('body', 'LIKE', '%' . $searchString . '%')
                    ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
