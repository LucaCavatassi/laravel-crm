<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(Employee $employee)
    {
        $employee->load('companies');
        $companies = Company::all();
        return view('admin.employees.update', compact(['employee', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'company_id' => 'required|exists:companies,id',
        ]);

        // Update employee
        $employee->update($request->except('_method', '_token'));
        // Retrieve id to redirect to company show
        $companyId = $employee->company_id;
        // Redirect to the company's show page
        return redirect()->route('admin.companies.show', $companyId)->with('success', 'Dipendente aggiornato con successo!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $companyId = $employee->company_id;
        $employee->delete();

        return redirect()->route('admin.companies.show', $companyId)->with('success', 'Dipendente eliminato con successo!');
    }
}
