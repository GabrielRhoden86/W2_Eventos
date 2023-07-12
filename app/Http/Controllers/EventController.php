<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request("search");

        if ($search) {

            $events = Event::where([["title", "like", "%" . $search . "%"]])->get();
        } else {

            $events =   Event::all();
        }

        return view('welcome', ["events" => $events, "search" => $search]);
    }

    public function contact()
    {
        return view('contato');
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Validação imagem File Image
        if ($request->hasFile("image") && $request->file("image")->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        //Retorna Para Home
        return redirect("/")->with('msg', true);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $eventOwner = user::where('id', $event->user_id)->first()->toArray();
        return view("events.show", ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id)->delete();
        return redirect("/dashboard")->with('msgDestroy', true);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view("events.edit", ['event' => $event]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Validação imagem File Image
        if ($request->hasFile("image") && $request->file("image")->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }

        $event = Event::findOrFail($request->id)->update($data);

        return redirect("/dashboard")->with('msgEdit', true);
    }

    public function joinEvent($id){

        $user = new User;
        $user = auth()->user();
        $user->eventAsParticipant()->attach($id);
        $event = Event::findOrFail($id);

         return redirect("/dashboard")->with('msgJoin', true);
    }

}
