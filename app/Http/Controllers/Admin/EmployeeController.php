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
        $companies = Company::all();
        return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'surname' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'min:3', 'max:255', 'unique:employees,email'],
            'phone' => ['nullable', 'string', 'min:10', 'max:20', 'regex:/^[0-9()\-\+ ]+$/'],
            'company_id' => ['required', 'exists:companies,id'],
        ], [
            'name.regex' => 'Il nome può contenere solo lettere e spazi.',
            'surname.regex' => 'Il cognome può contenere solo lettere e spazi.',
            'phone.regex' => 'Il numero di telefono può contenere solo numeri, parentesi (), trattini - e il segno più +.',
        ]);
    
        // Create new Employee using mass assignment
        $employee = Employee::create($request->all());
    
        // Retrieve company_id from the request
        $companyId = $employee->company_id; 
    
        // Redirect to the company's show page with success message
        return redirect()->route('admin.companies.show', $companyId)->with('success', 'Dipendente creato con successo!');
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
            'name' => ['required', 'string','min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'surname' => ['required', 'string','min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email','min:3', 'max:255', 'unique:employees,email,' . $employee->id],
            'phone' => ['nullable', 'string','min:10', 'max:20', 'regex:/^[0-9()\-\+ ]+$/'],
            'company_id' => ['required', 'exists:companies,id'],
        ], [
            'name.regex' => 'Il nome può contenere solo lettere e spazi.',
            'surname.regex' => 'Il cognome può contenere solo lettere e spazi.',
            'phone.regex' => 'Il numero di telefono può contenere solo numeri, parentesi (), trattini - e il segno più +.',
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
