<?php

namespace App\Http\Controllers;

use App\Models\ActionLog\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends BaseController
{
    //

    public function index(Request $request)
    {
        $model = new ActionLog();
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => $model->search()->paginate()
        ]);
    }
}
