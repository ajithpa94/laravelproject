<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class companyCRUDController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::orderBy('id')->paginate(5);
        return view('companies.index', $data);
    }
    public function create()
    {
        $job['jobs'] = Job::orderBy('id')->paginate(5);
        return view('companies.create', $job);
    }
    //created
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'check' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = $request->password;
        $company->address = $request->address;
        $company->types = $request->type;
        $company->seclect = $request->gender;
        $company->check = $request->check;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $company->image = $filename;
        }
        $company->save();
        return redirect()->route('companies.index')
            ->with('success', 'Company has been created successfully..');
    }
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
    public function edit(Company $company)
    {
        $jobs = Job::get();
        return view('companies.edit', compact('company', 'jobs'));
    }
    //updated
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'check' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',


        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = $request->password;
        $company->address = $request->address;
        $company->types = $request->type;
        $company->seclect = $request->gender;
        $company->check = $request->check;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $company->image = $filename;
        }
        $company->save();
        return redirect()->route('companies.index')
            ->with('success', 'company has been updated successfully');
    }
    //deleted
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success', 'company has been deleted successfully');
    }
}
