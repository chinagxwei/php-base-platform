<?php

namespace App\Http\Controllers\V1\Platform;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ManagerPost;
use App\Models\User;
use Illuminate\Http\Request;


class ManagerController extends BaseController
{
    protected $controller_event_text = "管理员";

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $model = new User();
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => $model->searchManager([], ['role'])->paginate()
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
            $param = $request->all();
            $type = false;
            $id = intval($request->get('id'));
            if ($id > 0) {
                $validate = ManagerPost::updateValidate($param);
                if (!$validate->fails()) {
                    $model = User::findOneByUserID($id);
                    $type = $model->setRole($param['role_id'])
                        ->save();
                    $this->saveEvent($model->username);
                }
            } else {
                $validate = ManagerPost::registerValidate($param);
                if (!$validate->fails()) {
                    $model = new User();
                    $type = $model->register($param, User::ROLE_TYPE_MANAGER);
                    $this->saveEvent($model->username);
                }
            }
            if ($type) {
                $code = 0;
                $message = 'ok';
            } else {
                $code = -1;
                $message = $validate->errors()->getMessages();
            }
        }

        return response()->json([
            'code' => $code,
            'message' => $message,
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function view(Request $request)
    {
        if ($id = intval($request->get('id'))) {
            if ($model = User::findOneByUserID($id, ['role'])->makeHidden([
                'id',
                'username',
            ])) {
                return response()->json([
                    'code' => 0,
                    'message' => 'ok',
                    'data' => $model
                ]);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request)
    {
        if ($id = intval($request->get('id'))) {
            if ($model = User::findOneByUserID($id)) {
                $this->deleteEvent($model->username);
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
}
