<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the sort order from the request
        $sortOrder = request('sort', 'desc');

        // Fetch all companies, sorted by created_at based on the requested sort order
        $companies = Company::orderBy('created_at', $sortOrder)->get();

        // Return the view with the companies and sort order
        return view('admin.companies.index', compact('companies', 'sortOrder'));
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
            'logo' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'vat_num' => ['required', 'numeric', 'digits:11', 'unique:companies,vat_num'], // Assuming 'companies' is the table name
        ], [
            'name.max' => 'Il nome deve avere al massimo 255 caratteri.',
            'vat_num.digits' => 'La partita IVA deve avere 11 numeri.',
            'vat_num.unique' => 'La partita IVA è già stata registrata.',
        ]);

        // Create company instance
        $company = new Company();

        // Store logo in the storage folder
        if ($request->hasFile('logo')) {
            // Store the file in the 'logos' folder and get the path
            $logoPath = $request->file('logo')->store('logos', 'public');
            // Save the relative path of the file in the database
            $company->logo = 'storage/' . $logoPath;
        } else {
            // If no file is uploaded, use a placeholder
            $company->logo = 'https://placehold.co/600x600?text=Azienda';
        }

        $company->name = $request->input('name');
        $company->vat_num = $request->input('vat_num');
        $company->save();

        // Redirect to index
        return redirect()->route('admin.companies.index')->with('success', 'Azienda creata con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $sortOrder = request('sort', 'desc'); // Default to 'desc' if not provided

        $company->load(['employees' => function ($query) use ($sortOrder) {
            $query->orderBy('created_at', $sortOrder);
        }]);

        return view('admin.companies.show', compact('company'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.update', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        // Validate the incoming request
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'logo' => ['image', 'mimes:jpeg,png,jpg', 'max: 2048'],
            'vat_num' => ['required', 'numeric', 'digits:11', Rule::unique('companies')->ignore($company->id)],
        ];

        $request->validate($rules, [
            'name.max' => 'Il nome deve avere al massimo 255 caratteri.',
            'vat_num.digits' => 'La partita IVA deve avere 11 numeri.',
            'vat_num.unique' => 'La partita IVA è già stata registrata.',
        ]);
        
        // Update company information
        $company->name = $request->input('name');
        $company->vat_num = $request->input('vat_num');

        // Handle logo update
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists and is not a placeholder
            $oldLogoPath = public_path('storage/logos/' . $company->logo);
            if ($company->logo !== 'https://placehold.co/600x400' && file_exists($oldLogoPath)) {
                unlink($oldLogoPath); // Remove old logo file
            }

            // Store the new logo
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = 'storage/' . $logoPath; // Save the path in the database
        }

        // Save the updated company data
        $company->save();

        // Redirect to the company's show page
        return redirect()->route('admin.companies.show', $company->id)->with('success', 'Azienda aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Dipendente eliminato con successo!');
    }
}
