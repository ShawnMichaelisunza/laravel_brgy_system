<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClearanceRequest;
use App\Models\Anouncement;
use App\Models\Officer;
use App\Services\ClearanceService;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    protected $clearanceService;

    public function __construct(ClearanceService $clearanceService)
    {
        $this->clearanceService = $clearanceService;
    }

    public function index(){

        $kagawads = Officer::where('position', 'Kagawad 1')->get();
        $chairman = Officer::where('position', 'Punong Barangay')->get();
        $sks = Officer::where('position', 'SK Chairman')->get();
        $secretary = Officer::where('position', 'Barangay Secretary')->get();

        return view('barangay_page.brgy_index', [
            'chairman' => $chairman,
            'kagawads' => $kagawads,
            'sks' => $sks,
            'secretary' => $secretary
        ]);
    }

    public function announcement(){

        $announcements = Anouncement::get();

        return view('barangay_page.brgy_announcement', ['announcements' => $announcements]);
    }

    public function clearance($id){

        $user = $this->clearanceService->ClearanceCreateService($id);
        $clearances = $this->clearanceService->ClearanceAllService($id);
        return view('barangay_page.brgy_clearance', ['user' => $user, 'clearances' => $clearances ]);
    }

    public function store(ClearanceRequest $req){

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

    public function officer(){
        $kagawads = Officer::where('position', 'like', '%'. 'Kagawad'. '%')->get();
        $chairman = Officer::where('position', 'Punong Barangay')->get();
        $sks = Officer::where('position', 'SK Chairman')->get();
        $secretary = Officer::where('position', 'Barangay Secretary')->get();
        $treasurer = Officer::where('position', 'Barangay Treasurer')->get();

        return view('barangay_page.brgy_officer', [
            'chairman' => $chairman,
            'kagawads' => $kagawads,
            'sks' => $sks,
            'secretary' => $secretary,
            'treasurer' => $treasurer
        ]);
    }

    public function about(){

        return view('barangay_page.brgy_about');
    }

    public function contact(){

        return view('barangay_page.brgy_contact');
    }
}
