<?php

namespace App\Http\Controllers\V1\Platform;

use App\Http\Controllers\BaseController;
use App\Models\PlatformNavigation\PlatformNavigation;
use Illuminate\Http\Request;

class NavigationController extends BaseController
{
    protected $controller_event_text = "导航";

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $model = new PlatformNavigation();
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
                $model = PlatformNavigation::findOneByID($id);
            } else {
                $model = new PlatformNavigation();
            }
            if ($model->fill($param)->save()) {
                $this->saveEvent($model->navigation_name);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request)
    {
        if ($id = intval($request->get('id'))) {
            if ($model = PlatformNavigation::findOneByID($id)) {
                $this->deleteEvent($model->navigation_name);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function sortChange(Request $request)
    {
        $param = $request->all();
        if (is_array($param)) {
            foreach ($param as $value) {
                if ($model = PlatformNavigation::findOneByID($value['id'])) {
                    $model->setNavigationSort($value['sort'])->save();
                }
            }
            $this->generateEvent("修改导航排序", "修改导航排序");
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request)
    {
        $user = auth()->user();
        $role = $user->role;
        $navigations = $role->navigations;
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => $navigations
        ]);
    }
}
