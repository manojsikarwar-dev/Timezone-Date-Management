<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Event;
use DateTime;
use DateTimeZone;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $events = Event::where('user_id', $user_id )->get();

        return view('events.index', compact('events'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        $event = Event::create(['title'=>$request->title,'user_id'=>auth()->user()->id,'start_time'=>$request->start_time ]);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);


        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, $id)
    {
        $event = Event::findOrFail($id);
       // dd($event);
        $event->update($request->all());

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index');
    }

    
     /**
     * Timezone Date Api request for App data
     *
     * @param Request $request
     */

    public function get_date(Request $request){
        
        $current_timezone = $request->current_timezone;
        $current_date = $request->date;
        $request_timezone =  $request->request_timezone; 

        $date = new DateTime($current_date, new DateTimeZone($current_timezone));

        $date->setTimezone(new DateTimeZone($request_timezone));

        $convertedDateTime = $date->format('Y-m-d H:i:s T');

        return response()->json([
            'status' => '200',
            'original_datetime' => $current_date,
            'target_timezone' => $request_timezone,
            'converted_datetime' => $convertedDateTime,
        ]);

    }
}
