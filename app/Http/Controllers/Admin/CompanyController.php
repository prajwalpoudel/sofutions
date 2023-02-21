<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CompanyService;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    private $view = 'admin.company.';
    /**
     * @var CompanyService
     */
    private $companyService;

    /**
     * CompanyController constructor.
     * @param CompanyService $companyService
     */
    public function __construct(
        CompanyService $companyService
    )
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the Company resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view($this->view.'index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        return view($this->view.'create');
    }

    /**
     * Store a newly created Company in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->companyService->create($request->all());

        return redirect()->route('admin.company.index');
    }

    /**
     * Show the form for editing the Company resource.
     */
    public function edit(string $id)
    {
        $company = $this->companyService->findOrFail($id);

        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the Company resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->companyService->update($id, $request->all());

        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->companyService->destroy($id);

        return redirect()->back();
    }
}
