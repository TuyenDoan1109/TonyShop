<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Requests\Permission\CreatePermissionRequest;
//use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Repositories\Calendar\CalendarRepositoryInterface;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected $calendarRepository;
    public function __construct(CalendarRepositoryInterface $calendarRepository) {
        $this->middleware('auth:admin');
        $this->calendarRepository = $calendarRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvent()
    {
//        dd(3454353);
        if(request()->ajax()){
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $events = Event::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)
                ->get(['id','title','start', 'end']);
            return response()->json($events);
        }
        return view('admin.calendars.index');

    }

    public function createEvent(Request $request){
        $data = $request->except('_token');    // bỏ đi token
        $events = Event::insert($data);
        return response()->json($events);
    }

    public function deleteEvent(Request $request){
        $event = Event::find($request->id);
        return $event->delete();
    }

}
