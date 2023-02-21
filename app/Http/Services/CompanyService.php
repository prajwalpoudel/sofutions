<?php


namespace App\Http\Services;


use App\Models\Company;

class CompanyService extends BaseService
{
    /**
     * CompanyService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string model
     */
    public function model()
    {
        return Company::class;
    }
}
