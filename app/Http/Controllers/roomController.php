<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function index()
{
    $rooms = Room::latest()->paginate(5);
    return view('rooms.index', compact('rooms'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}

    
    public function create()
    {
        return view('rooms.create');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'required|array',
        'photo.*' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

        
        Room::create([
            'name' => $request->name,
            'photos' => json_encode($request->photo),
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);
    
        return redirect()->route('room.index')
            ->with('success', 'Chambre ajoutée avec succès.');
    }

    
    
    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    
    
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    
    
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|array',
            'photo.*' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);
    
        $room->update([
            'name' => $request->name,
            'photos' => json_encode($request->photo),
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);
    
        return redirect()->route('room.index')
            ->with('success', 'Chambre mise à jour avec succès.');
    }

    
    public function destroy(Room $room)
    {
        $room->delete();
    
        return redirect()->route('room.index')
            ->with('success', 'Chambre supprimée avec succès.');
    }
}