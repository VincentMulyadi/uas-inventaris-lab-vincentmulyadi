<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()

    {
        $equipment = Equipment::all();
        $borrowings = Borrowing::all();
        $topBorrowedEquipment = Equipment::withCount('borrowings')->orderBy('borrowings_count', 'desc')->take(7)->get();
        $topBorrower = Borrowing::select('name', 'identity_number', 'role', DB::raw('count(*) as total'))
            ->groupBy('name', 'identity_number', 'role')
            ->orderBy('total', 'desc')
            ->take(7)->get();

        return view('admin.dashboard.index', [
            'totalEquipment' => $equipment->unique('code')->count(),
            'totalBorrower' => $borrowings->unique('identity_number')->count(),
            'equipmentBorrowed' => $borrowings->whereIn('status', ['approved', 'borrowed'])->count(),
            'borrowingPending' => $borrowings->where('status', 'pending')->count(),
            'topBorrowedEquipment' => $topBorrowedEquipment,
            'topBorrower' => $topBorrower,
            'borrowings' => $borrowings,
        ]);
    }
}
