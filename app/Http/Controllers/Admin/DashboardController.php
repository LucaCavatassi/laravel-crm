<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
class DashboardController extends Controller
{
    public function index()
    {
        // Total number of companies
        $totalCompanies = Company::count();

        // Total number of employees (you can modify this based on your relationship)
        $totalEmployees = Employee::count();

        // Company with the most employees
        $largestCompanyEmployees = Company::withCount('employees') // Assuming there's a relation 'employees' on the Company model
            ->orderByDesc('employees_count')
            ->first();

        $largestCompanyName = $largestCompanyEmployees->name;

        // Passing the data to the view
        return view('admin.dashboard', compact('totalCompanies', 'totalEmployees', 'largestCompanyEmployees', 'largestCompanyName'));
    }
        

}
