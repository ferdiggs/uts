<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::latest()->paginate(5);
        return view('employes.index', compact('employes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ktp' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birth' => 'required',
        ]);
        Employe::create($request->all());
        return redirect()->route('employes.index')
            ->with('success', 'Employe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employes.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'name' => 'required',
            'ktp' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birth' => 'required',
        ]);
        $employe->update($request->all());
        return redirect()->route('employes.index')
            ->with('success', 'Employe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('employes.index')
            ->with('success', 'Employe deleted successfully');
    }
}
