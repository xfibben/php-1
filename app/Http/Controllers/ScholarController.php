<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|size:9|unique:scholars,phone',
            'school_id' => 'required|exists:schools,id',
        ]); 

        Scholar::create($request->all());   

        return redirect()->route('scholar.index')->with('success', 'Scholar creado exitosamente.');
    }

    public function update(Request $request, Scholar $scholar)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|size:9|unique:scholars,phone,' . $scholar->id,
            'school_id' => 'sometimes|required|exists:schools,id',
        ]);

        $scholar->update($request->all());

        return redirect()->route('scholar.index')->with('success', 'Scholar actualizado correctamente.');
    }

    public function show(Scholar $scholar)
    {
        $scholar = Scholar::with('school', 'courses')->find($scholar->id);
        return view('scholar.show', compact('scholar'));
    }


    
}
