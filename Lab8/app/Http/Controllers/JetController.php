<?php

namespace App\Http\Controllers;

use App\Models\Jet;
use Illuminate\Http\Request;

class JetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $jets = Jet::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                ->orWhere('model', 'like', "%$search%");
        })->paginate(10);

        return view('jets.index', compact('jets'));
    }

    public function create()
    {
        return view('jets.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0.01',
        ]);

        Jet::create($validated);

        return redirect()->route('jets.index')->with('success', 'Jet added successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Jet $jet)
    {
        $jet->load('reviews');
        return view('jets.show', compact('jet'));
    }

    public function edit(Jet $jet)
    {
        return view('jets.edit', compact('jet'));
    }

    public function update(Request $request, Jet $jet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0.01',
        ]);

        $jet->update($request->all());

        return redirect()->route('jets.index')->with('success', 'Jet updated successfully!');
    }

    public function destroy(Jet $jet)
    {
        $jet->delete();

        return redirect()->route('jets.index')->with('success', 'Jet deleted successfully!');
    }
}
