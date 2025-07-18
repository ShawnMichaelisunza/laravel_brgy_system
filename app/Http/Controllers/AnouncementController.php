<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementEditRequest;
use App\Http\Requests\AnnouncementRequest;
use App\Services\AnnouncementService;
use Illuminate\Http\Request;

class AnouncementController extends Controller
{
    protected $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function index()
    {
        $ancs = $this->announcementService->AnncouncementViewAllService();
        return view('announcements.anc_index', ['ancs' => $ancs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementRequest $req)
    {
        $val = $req->validated();

        if ($req->has('anc_img')) {
            $img = $req->file('anc_img');
            $ext = $img->getClientOriginalExtension();
            $path = 'announcements/img/';
            $imgName = time() . '.' . $ext;
            $img->move($path, $imgName);
        }

        $val['anc_img'] = $path . $imgName;

        $ancs = $this->announcementService->AnncouncementViewAllService();

        if ($ancs->count() >= 3) {
            return redirect()->back()->with('error', 'You have reached the Announcement Limit');
        }

        $this->announcementService->AnncouncementStoreService($val);

        return redirect()->back()->with('success', 'Created Announcement Successfully !');
    }

    public function show($id)
    {
        $anc = $this->announcementService->AnnouncementShowService($id);
        return view('announcements.anc_view', ['anc' => $anc]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anc = $this->announcementService->AnnouncementEditService($id);
        return view('announcements.anc_edit', ['anc' => $anc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AnnouncementEditRequest $req)
    {
        $val = $req->validated();

        if ($req->has('anc_img')) {
            $img = $req->file('anc_img');
            $ext = $img->getClientOriginalExtension();
            $path = 'announcements/img/';
            $imgName = time() . '.' . $ext;
            $img->move($path, $imgName);
        }

        if ($req['anc_img']) {

            $val['anc_img'] = $path . $imgName;
        }
        $this->announcementService->AnnouncementUpdateService($id, $val);

        return redirect()->route('anc.index')->with('success', 'Updated Announcement Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->announcementService->AnnouncementDeleteService($id);
        return redirect()->back()->with('success', 'Deleted Announcement Successfully !');
    }
}
