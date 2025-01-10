<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.borrowing.index', [
            'borrowings' => Borrowing::latest()->get(),
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {

        $credentials = $request->validate([
            'status' => ['required', 'string']
        ]);

        try {

            $borrowing->update([
                'status' => $credentials['status']
            ]);

            return redirect()->intended('/admin/borrowings')
                ->with('success', 'Borrowing status has been successfully updated!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the borrowing status. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        try {
            $borrowing->delete();
            return redirect()->intended('/admin/borrowings')
                ->with('success', 'Borrowing data has been successfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while deleting the borrowing. Please try again.')
                ->withInput();
        }
    }
}
