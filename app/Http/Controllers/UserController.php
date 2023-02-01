<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $date1 = request('date1') ? Carbon::createFromFormat('d/m/Y', request('date1'))->format('Y-m-d') : null;
        $date2 = request('date2') ? Carbon::createFromFormat('d/m/Y', request('date2'))->format('Y-m-d') : null;

        $users = User::query()
            ->when($date1, function ($query) use ($date1, $date2) {
                // Ejemplo1
                // $query->whereDate('created_at', $date1);

                //Ejemplo 2
                // $year = Carbon::parse($date1);
                // $query->whereYear('created_at', $year->format('Y'));

                //Ejemplo 3
                // $month = Carbon::parse($date1);
                // $query->whereMonth('created_at', $month->format('m'));

                //Ejemplo 4
                // $query->whereBetween('created_at', [$date1, $date2]);
            })
            ->paginate(10);

        return view('users.index', compact('users'));
    }
}
