<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::latest()->get();
        return view('admin.equipment.index', [
            'equipment' => Equipment::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'code' => ['required', 'unique:equipment,code'],
            'total_quantity' => ['required', 'integer'],
            'name' => ['required'],
            'description' => ['required'],
        ]);

        try {
            $equipment = Equipment::create([
                'code' => $credentials['code'],
                'total_quantity' => $credentials['total_quantity'],
                'available_quantity' => $credentials['total_quantity'],
                'name' => $credentials['name'],
                'description' => $credentials['description'],
            ]);

            return redirect()->intended('/admin/equipment')
                ->with('success', 'Equipment data has been successfully added!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while adding the equipment. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $borrowed = $equipment->borrowings->whereIn('status', ['approved', 'borrowed'])->count();
        $credentials = $request->validate([
            'code' => ['required', 'unique:equipment,code,' . $equipment->id],
            'total_quantity' => ['required', 'integer', 'min:' . $borrowed],
            'name' => ['required'],
            'description' => ['required'],
        ]);


        try {
            $equipment->update([
                'code' => $credentials['code'],
                'total_quantity' => $credentials['total_quantity'],
                'available_quantity' => $equipment->available_quantity,
                'name' => $credentials['name'],
                'description' => $credentials['description'],
            ]);

            return redirect()->intended('/admin/equipment')
                ->with('success', 'Equipment data has been successfully updated!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the equipment. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        try {
            $equipment->delete();
            return redirect()->intended('/admin/equipment')
                ->with('success', 'Equipment data has been successfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while deleting the equipment. Please try again.')
                ->withInput();
        }
    }
}
