<?php

namespace App\Http\Controllers;

use App\Models\Tenders;
use App\Services\BaseService;
use App\Services\Tenders\TendersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\Elements\Base;

class TendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tenders = TendersService::getData($request);
        return BaseService::successMessage($tenders->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails())
            return BaseService::unsuccessfulMessage($validator->errors());

        $tender = TendersService::setData($request);
        return BaseService::successMessage($tender);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenders  $tenders
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:test_task_data_csv|max:255'
        ]);

        if($validator->fails())
            return BaseService::unsuccessfulMessage($validator->errors());


        $tender = TendersService::getTender($request->get('id'));
        return BaseService::successMessage($tender);;
    }

}
