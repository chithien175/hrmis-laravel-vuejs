<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            $logo_name = time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];

            \Image::make($request->logo)->save(public_path('images/company/').$logo_name);

            $request->merge(['logo' => $logo_name]);

            $company_logo = public_path('images/company/').setting('company.logo');
            if(file_exists($company_logo) && setting('company.logo') != 'company-logo.jpg'){
                @unlink($company_logo);
            }
        }

        if($request->favicon != setting('company.favicon')){
            $favicon_name = time() . '.' . explode('/', explode(':', substr($request->favicon, 0, strpos($request->favicon, ';')))[1])[1];

            \Image::make($request->favicon)->save(public_path('images/company/').$favicon_name);

            $request->merge(['favicon' => $favicon_name]);

            $company_favicon = public_path('images/company/').setting('company.favicon');
            if(file_exists($company_favicon) && setting('company.favicon') != 'company-favicon.jpg'){
                @unlink($company_favicon);
            }
        }

        setting([
            // Tab 1
            'company.name'                  => $request['name'],
            'company.slogan'                => $request['slogan'],
            'company.description'           => $request['description'],
            'company.address'               => $request['address'],
            'company.phone'                 => $request['phone'],
            'company.fax'                   => $request['fax'],
            'company.logo'                  => $request['logo'],
            'company.website'               => $request['website'],
            'company.email'                 => $request['email'],
            // Tab 2
            'company.site_title'            => $request['site_title'],
            'company.show_site_name'        => $request['show_site_name'],
            'company.favicon'               => $request['favicon'],
            // Tab 3
            'company.facebook'              => $request['facebook'],
            'company.linkedin'              => $request['linkedin'],
            'company.twitter'               => $request['twitter'],
            'company.googleplus'            => $request['googleplus'],
            'company.youtube'               => $request['youtube'],
        ])->save();

        Log::info('#'. Auth::user()->id .' '. Auth::user()->name .': Sửa thông tin công ty.');
        return ['message' => 'Đã chỉnh sửa thông tin công ty'];
    }
}
