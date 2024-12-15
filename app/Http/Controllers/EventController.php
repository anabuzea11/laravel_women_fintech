<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Afișează pagina cu evenimente
    public function showPage()
    {
        return view('events'); // Pagina Blade creată la pasul anterior
    }

    public function index()
    {
        $events = Event::where('event_date', '>=', now())->orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        dd($request->all()); // Debugging line

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            //'member_id' => 'required|exists:members,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Eveniment adăugat cu succes!');
    }

    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date|after_or_equal:today',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Eveniment actualizat cu succes!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
