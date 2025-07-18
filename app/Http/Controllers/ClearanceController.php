<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClearanceRequest;
use App\Models\Officer;
use App\Models\User;
use App\Services\ClearanceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    protected $clearanceService;

    public function __construct(ClearanceService $clearanceService){

        $this->clearanceService = $clearanceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->clearanceService->ClearanceUserService();
        return view('clearances.clearance_index', ['users' => $users]);
    }


    // create and view clearances
    public function create($id)
    {
        $user = $this->clearanceService->ClearanceCreateService($id);
        $clearances = $this->clearanceService->ClearanceAllService($id);

        return view('clearances.clearance_create', ['user' => $user, 'clearances' => $clearances]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClearanceRequest $req)
    {
        $val = $req->validated();

        if($req->has('picture')){
            $picture = $req->file('picture');
            $ext = $picture->getClientOriginalExtension();
            $path = 'clearance/picture/';
            $pictureName = time(). '.' . $ext;
            $picture->move($path, $pictureName);
        }

        $val['picture'] = $path . $pictureName;

        $this->clearanceService->ClearanceStoreService($val);
        return redirect()->back()->with('success', 'Created Clearance Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kagawads = Officer::where('position', 'like', '%'.'Kagawad' .'%')->get();
        $chairman = Officer::where('position', 'like', '%'.'Punong Barangay' .'%')->get();
        $sks = Officer::where('position', 'like', '%'.'SK Chairman' .'%')->get();
        $clearance = $this->clearanceService->ClearanceShowService($id);
        $user = User::find($clearance->user_id);

        $data = [
            'kagawads' => $kagawads,
            'clearance' => $clearance,
            'chairman' =>  $chairman,
            'sks' =>  $sks,
            'user' => $user
        ];

        $pdf = Pdf::loadView('clearances.clearance_show', $data);
        return $pdf->stream('brgy_clearance.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clearance $clearance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clearance $clearance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clearance $clearance)
    {
        //
    }

    // approve clearance request
    public function approve($id){

            $clearance = $this->clearanceService->ClearanceApproveService($id);
            $clearance->serial_no = now()->format('Y'). ' - '. str_pad($clearance->id, 5, '0', STR_PAD_LEFT);
            $clearance->save();

            return redirect()->back()->with('success', 'Approved Clearance Successfully !');
    }

    // disapprove clearance request
    public function cancel($id){

        $clearance = $this->clearanceService->ClearanceDisapproveService($id);
        return redirect()->back()->with('success', 'Disapproved Clearance Successfully !');
    }
}
