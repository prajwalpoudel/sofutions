<?php


namespace App\Http\Services;


use App\Models\Employee;

class EmployeeService extends BaseService
{
    /**
     * EmployeeService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }
}
