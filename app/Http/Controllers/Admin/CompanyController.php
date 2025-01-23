<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'logo' => ['required', 'string', 'min:3', 'max:255'],
            'vat_num' => ['required', 'numeric', 'digits:11', 'unique:companies,vat_num'], // Assuming 'companies' is the table name
        ], [
            'name.max' => 'Il nome deve avere al massimo 255 caratteri.',
            'vat_num.digits:11' => 'La partita IVA deve avere 11 numeri.',
            'vat_num.unique' => 'La partita IVA è già stata registrata.',
        ]);

        // Create a new Company instance and save the validated data
        $company = new Company();
        $company->name = $request->input('name');
        $company->logo = $request->input('logo');
        $company->vat_num = $request->input('vat_num');
        $company->save();

        // Redirect to a page (e.g., the company list or the newly created company)
        return redirect()->route('admin.companies.index')->with('success', 'Azienda creata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        // $company = Company::with('employees')->findOrFail($company->id);
        // EAGER LOADING WITH FOREIGN LOADED IN MODEL
        $company->load('employees'); 
        return view('admin.companies.show', compact('company'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
