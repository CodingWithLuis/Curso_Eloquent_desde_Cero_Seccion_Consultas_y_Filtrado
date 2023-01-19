<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArchivedEmployeesController extends Controller
{
    public function index(): View
    {
        $employees = Employee::onlyTrashed()->get();

        return view('archived_employees.index', compact('employees'));
    }

    public function restore($id): RedirectResponse
    {
        Employee::onlyTrashed()->find($id)->restore();

        return redirect()->route('employees.index');
    }

    public function forceDelete($id): RedirectResponse
    {
        Employee::onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('employees.index');
    }
}
