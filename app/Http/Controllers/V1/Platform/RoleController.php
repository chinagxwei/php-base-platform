<?php

namespace App\Http\Controllers\V1\Platform;

use App\Http\Controllers\BaseController;
use App\Models\PlatformRole\PlatformRole;
use Illuminate\Http\Request;

class RoleController extends BaseController
{

    protected $controller_event_text = "角色";

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $model = new PlatformRole();
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => $model->search()->paginate()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $code = -1;
        $message = 'error';
        if ($request->isMethod('POST')) {

            $id = intval($request->get('id'));
            $param = $request->all();
            if ($id > 0) {
                $model = PlatformRole::findOneByID($id);
            } else {
                $model = new PlatformRole();
            }
            if ($model->fill($param)->save()) {
                $this->saveEvent($model->role_name);
                $code = 0;
                $message = 'ok';
            }
        }

        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => ''
        ]);
    }

    public function view(Request $request)
    {
        $code = -1;
        $message = 'error';
        if ($request->isMethod('POST') && $id = intval($request->get('id'))) {
            if ($model = PlatformRole::findOneByID($id, ['navigations'])) {
                return response()->json([
                    'code' => 0,
                    'message' => 'ok',
                    'data' => $model
                ]);
            }
        }

        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => ''
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request)
    {
        if ($id = intval($request->get('id'))) {
            if ($model = PlatformRole::findOneByID($id)) {
                $this->deleteEvent($model->role_name);
                $model->delete();
                return response()->json([
                    'code' => 0,
                    'message' => 'ok',
                ]);
            }
        }
        return response()->json([
            'code' => -1,
            'message' => 'error',
        ]);
    }


    public function configMenu(Request $request)
    {
        $param = $request->all();
        if ($model = PlatformRole::findOneByID($param['role'])) {
            if (count($param['menus'])) {
                if ($param['type'] === 1) {
                    $model->navigations()->attach($param['menus']);
                } else {
                    $model->navigations()->detach($param['menus']);
                }
            }
        }
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => $param
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $param = $request->all();
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => (new PlatformRole())->search(['role_name' => $param['keyword']])->paginate()
        ]);
    }
}
