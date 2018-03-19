<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use DB, Session, Crypt, Hash;
use Validator;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosEmpresa = $request->all();

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required',
           // 'input_img'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site'       => 'nullable'
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'site' => 'nullable'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // store
            $company = new Company;
            $company->company_name = Input::get('name');
            $company->company_email = Input::get('email');
            $company->company_website = Input::get('site');

            $logoName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(storage_path('app/public/logos'), $logoName);

            $company->company_logo = $logoName;

            $company->save();

            // redirect
            Session::flash('message', 'Successfully created Category!');
            return back();
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.companies.edit-company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();

        $rules = array(
            'name'   => 'required',
            'email'  => 'required',
            'site'   => 'nullable'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            try{
                $company = Company::find($id);
                $company->company_name = Input::get('name');
                $company->company_email = Input::get('email');
                $company->company_website = Input::get('site');

                if($request->logo){
                    $logoName = time().'.'.$request->logo->getClientOriginalExtension();
                    $request->logo->move(storage_path('app/public/logos'), $logoName);

                    $company->company_logo = $logoName;
                }

                $company->save();
                return redirect()->route('admin.companies.edit-company', $id)->with('success', 'Sucesso ao atualizar!');
             
            }catch(Exception $e){
                //echo $e->getMessage();
                return back()->with('error', 'Erro ao atualizar...');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
