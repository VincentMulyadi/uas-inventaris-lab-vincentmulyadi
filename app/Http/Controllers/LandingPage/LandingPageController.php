<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Equipment;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page.index');
    }

    public function form()
    {
        return view('landing-page.borrowing-form', [
            'equipment' => Equipment::orderBy('name', 'asc')->get(),
        ]);
    }

    public function submitForm(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required'],
            'role' => ['required'],
            'identity_number' => ['required'],
            'equipment_id' => ['required'],
            'duration_date' => ['required'],
            'detail' => ['required'],
        ], [
            'equipment_id.required' => 'The equipment field is required.'
        ]);

        
        $dates = Str::of($request->duration_date)->split('/[\s-]+/');
        
        Borrowing::create([
            'name' => $credentials['name'],
            'role' => $credentials['role'],
            'identity_number' => $credentials['identity_number'],
            'equipment_id' => $credentials['equipment_id'],
            'status' => 'pending',
            'borrow_date' => Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d'),
            'return_date' => Carbon::createFromFormat('d/m/Y', $dates[1])->format('Y-m-d'),
            'detail' => $credentials['detail'],
        ]);
        try {

            return redirect()->intended('/form')
                ->with('success', 'Borrowing request has been successfully submitted!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while submitting the borrowing request. Please try again.')
                ->withInput();
        }
    }

    public function equipment()
    {
        return view('landing-page.equipment', [
            'equipment' => Equipment::orderBy('name', 'asc')->get()
        ]);
    }
}
