<?php

namespace App\Services;

use App\Models\Anouncement;

class AnnouncementService{


    public function AnncouncementViewAllService(){

        $ancs = Anouncement::orderBy('created_at', 'DESC');
        return $ancs->paginate(5);
    }

    public function AnncouncementStoreService($data){

        $anc = Anouncement::create($data);
        return $anc;
    }

    public function AnnouncementShowService($id){

        $decrypt = decrypt($id);
        $anc = Anouncement::findOrFail($decrypt);
        return $anc;
    }

    public function AnnouncementEditService($id){

        $decrypt = decrypt($id);
        $anc = Anouncement::findOrFail($decrypt);
        return $anc;
    }

    public function AnnouncementUpdateService($id, $data){

        $decrypt = decrypt($id);
        $anc = Anouncement::findOrFail($decrypt);
        return $anc->update($data) ;
    }

    public function AnnouncementDeleteService($id){

        $decrypt = decrypt($id);
        $anc = Anouncement::findOrFail($decrypt);
        return $anc->delete();
    }
}
