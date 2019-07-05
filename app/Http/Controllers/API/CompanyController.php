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
        return response()->json(
            setting()->get('company')
        );
    }

    public function updateCompany(Request $request)
    {
        if($request->logo != setting('company.logo')){
            $name = time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];

            \Image::make($request->logo)->save(public_path('images/company/').$name);

            $request->merge(['logo' => $name]);

            $company_logo = public_path('images/company/').setting('company.logo');
            if(file_exists($company_logo) && setting('company.logo') != 'company-logo.jpg'){
                @unlink($company_logo);
            }
        }

        // \Setting::set('company.name', $request->input('name'));
        // \Setting::set('company.address', $request->input('address'));
        // \Setting::set('company.phone', $request->input('phone'));
        // \Setting::set('company.fax', $request->input('fax'));
        // \Setting::set('company.logo', $request->input('logo'));
        // \Setting::set('company.legal_representative', $request->input('legal_representative'));
        // \Setting::set('company.position', $request->input('position'));
        // \Setting::set('company.nationality', $request->input('nationality'));
        // \Setting::set('company.website', $request->input('website'));

        setting([
            'company.name'                  => $request['name'],
            'company.address'               => $request['address'],
            'company.phone'                 => $request['phone'],
            'company.fax'                   => $request['fax'],
            'company.logo'                  => $request['logo'],
            'company.legal_representative'  => $request['legal_representative'],
            'company.position'              => $request['position'],
            'company.nationality'           => $request['nationality'],
            'company.website'               => $request['website'],
        ])->save();

        return ['message' => 'Đã cập nhật thông tin công ty'];
    }
}
