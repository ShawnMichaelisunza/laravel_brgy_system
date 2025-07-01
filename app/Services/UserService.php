<?php

namespace App\Services;

use App\Models\User;

class UserService{

    // view all
    public function UserViewAllService(){

        $users = User::orderBy('created_at', 'DESC');

        return $users->paginate(5);
    }

    // create user
    public function UserRegisterStoreService($data){

        $user = User::create($data);
        return $user;
    }


    // view profile
    public function UserProfileService($id){

        $decrypt = decrypt($id);

        $user = User::findOrFail($decrypt);
        return $user;
    }

}
