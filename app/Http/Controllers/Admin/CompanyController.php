<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyFormRequest;
use App\Http\Services\CompanyService;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
    public function store(CompanyFormRequest $request): RedirectResponse
    {
        $storeData = $request->all();
        if ($logo = $request->file('logo')) {
            $storeData['logo'] = Storage::putFile('logo', $logo);
        }
        $this->companyService->create($storeData);

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
    public function update(CompanyFormRequest $request, string $id): RedirectResponse
    {
        $company = $this->companyService->findOrFail($id);
        $updateData    = $request->all();
        if ($logo = $request->file('logo')) {
            $updateData['logo'] = Storage::putFile('logo', $logo);
            if( $company->logo) {
                if (Storage::exists($logo = $company->logo)) {
                    Storage::delete($logo);
                }
            }
        }
        $company->update($updateData);

        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $company = $this->companyService->findOrFail($id);;
        if ($company->logo) {
            if (Storage::exists($logo = $company->logo)) {
                Storage::delete($logo);
            }
        }
        $company->delete();

        return redirect()->back();
    }
}
