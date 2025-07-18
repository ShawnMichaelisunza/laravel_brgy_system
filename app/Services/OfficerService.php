<?php

namespace App\Services;

use App\Models\Officer;

class OfficerService {


    public function OfficerViewAllService(){

        $officers = Officer::orderBy('created_at' ,'DESC');
        return $officers->paginate(6);
    }

    public function OfficerStoreService($data){

        $officer = Officer::create($data);
        return $officer;
    }

    public function OfficerShowService($id){

        $decrypt = decrypt($id);
        $officer = Officer::findOrFail($decrypt);
        return $officer;
    }

    public function OfficerEditService($id){

        $decrypt = decrypt($id);
        $officer = Officer::findOrFail($decrypt);
        return $officer;
    }

    public function OfficerUpdateService($id, $data){

        $decrypt = decrypt($id);
        $officer = Officer::findOrFail($decrypt);
        return $officer->update($data);
    }

}
