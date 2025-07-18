<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficerEditRequest;
use App\Http\Requests\OfficerRequest;
use App\Services\OfficerService;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    protected $officerService;

    public function __construct(OfficerService $officerService)
    {
        $this->officerService = $officerService;
    }

    public function index()
    {
        $officers = $this->officerService->OfficerViewAllService();
        return view('officers.officer_index', ['officers' => $officers, 'officer' => null]);
    }

    public function store(OfficerRequest $req)
    {
        $val = $req->validated();

        if ($req->has('officer_profile')) {
            $profile = $req->file('officer_profile');
            $ext = $profile->getClientOriginalExtension();
            $path = 'officers/profile/';
            $profileName = time() . '.' . $ext;
            $profile->move($path, $profileName);
        }

        $val['officer_profile'] = $path . $profileName;

        // if your data position is selected
        $officers = $this->officerService->OfficerViewAllService();

        $positionExists = collect($officers)->contains('position', $req['position']);

        if ($positionExists) {
            return redirect()->back()->with('error', 'This Position is not Available!');
        } else {
            $this->officerService->OfficerStoreService($val);
            return redirect()->back()->with('success', 'Created Officer Successfully!');
        }
    }

    public function show($id){

        $officer = $this->officerService->OfficerShowService($id);
        return view('officers.officer_show', ['officer' => $officer]);
    }

    public function edit($id){

        $officer = $this->officerService->OfficerEditService($id);
        return view('officers.officer_edit' , ['officer' => $officer]);
    }

    public function update($id, OfficerEditRequest $req){

        $val = $req->validated();

        if($req->has('officer_profile')){
            $profile = $req->file('officer_profile');
            $ext = $profile->getClientOriginalExtension();
            $path = 'officers/profile/';
            $profileName = time(). '.' . $ext;
            $profile->move($path, $profileName);
        }

        if($req['officer_profile']){
            $val['officer_profile'] =  $path. $profileName;
        }

        $this->officerService->OfficerUpdateService($id, $val);

        return redirect()->route('officer.index')->with('success', 'Updated Officer Successfully !');
    }
}
