<?php

namespace App\Http\Controllers;

use App\Events\ActionLogEvent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Event;

abstract class BaseController extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $controller_event_text = self::class;

    /**
     * @param $description
     * @return void
     */
    public function saveEvent($description)
    {
        Event::dispatch(ActionLogEvent::saveEvent($this->controller_event_text, $description));
    }

    /**
     * @param $description
     * @return void
     */
    public function deleteEvent($description)
    {
        Event::dispatch(ActionLogEvent::deleteEvent($this->controller_event_text, $description));
    }

    /**
     * @param $name
     * @param $description
     * @return void
     */
    public function generateEvent($name, $description)
    {
        Event::dispatch(ActionLogEvent::generate($name, $description));
    }
}
