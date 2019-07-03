<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            'name'                  => setting('company.name',''),
            'address'               => setting('company.address',''),
            'phone'                 => setting('company.phone',''),
            'fax'                   => setting('company.fax',''),
            'logo'                  => setting('company.logo',''),
            'legal_representative'  => setting('company.legal_representative',''),
            'position'              => setting('company.position',''),
            'nationality'           => setting('company.nationality',''),
            'website'               => setting('company.website','')
        ]);
    }
}
