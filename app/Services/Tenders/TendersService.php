<?php

namespace App\Services\Tenders;

use App\Models\Tenders;
use App\Services\BaseService;
use Carbon\Carbon;

class TendersService extends BaseService
{
    public static function getData(object $params)
    {
        $name = $params->get('name');
        $date = $params->get('date');

        $tender = new Tenders();

        if ($name != null)
            $tender = $tender->where('name', 'LIKE', "%$name%");

        if ($date != null)
            $tender = $tender->where('date', $date);

        return $tender;
    }

    public static function setData(object $params)
    {
        $tender = new Tenders();

        $tender->number = $params->get('number');
        $tender->status = $params->get('status');
        $tender->name = $params->get('name');
        $tender->updated_at = $params->get('date') != null?$params->get('date'):Carbon::now();

        $tender->save();

        return $tender;
    }

    public static function getTender($id)
    {
        $tender = Tenders::where('id', $id)->first();

        return $tender;
    }
}
