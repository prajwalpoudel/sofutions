<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeFormRequest;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    private $view = 'admin.employee.';
    /**
     * @var EmployeeService
     */
    private $employeeService;
    /**
     * @var CompanyService
     */
    private $companyService;

    /**
     * EmployeeController constructor.
     * @param CompanyService $companyService
     * @param EmployeeService $employeeService
     */
    public function __construct(
        CompanyService $companyService,
        EmployeeService $employeeService
    )
    {
        $this->employeeService = $employeeService;
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeService->query()->with('company')->paginate(10);

         return view($this->view.'index', compact(['employees']));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $companies = $this->companyService->all()->pluck('name', 'id');

        return view($this->view.'create', compact('companies'));
    }

    /**
     * Store a newly created Employee in storage.
     */
    public function store(EmployeeFormRequest $request): RedirectResponse
    {
        $this->employeeService->create($request->all());

        return redirect()->route('admin.employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $companies = $this->companyService->all()->pluck('name', 'id');
        $employee = $this->employeeService->findOrFail($id);

        return view('admin.employee.edit', compact(['companies', 'employee']));
    }

    /**
     * Update the employee resource in storage.
     */
    public function update(EmployeeFormRequest $request, string $id): RedirectResponse
    {
        $this->employeeService->update($id, $request->all());

        return redirect()->route('admin.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->employeeService->destroy($id);

        return redirect()->back();
    }
}
