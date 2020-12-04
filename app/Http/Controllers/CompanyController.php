<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'company')]);
    }

    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function company()
    {
        $companies = Company::paginate(12);
        return view('company.companies', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
//        $this->validate($request,[
//            'address' => 'required',
//            'bio' => 'required|min:10',
//            'experience' => 'required|min:10',
//            'phone_number' => 'required|min:11'
//        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => Request('address'),
            'phone' => Request('phone'),
            'website' => Request('website'),
            'slogan' => Request('slogan'),
            'description' => Request('description')
        ]);
        return redirect()->back()->with('success', 'Company Profile successfully updated!!');
    }

    public function coverPhoto(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/coverphoto/',$filename);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
            return redirect()->back()->with('success', 'Company Cover Photo successfully updated!!');
        }
    }

    public function companyLogo(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/logo/',$filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('success', 'Company Logo successfully updated!!');
        }
    }
}
