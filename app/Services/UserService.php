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

    // edit user
    public function UserEditService($id){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }
    public function UserUpdateService($id, $data){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        $user->update($data);

        return $user;
    }

    // view deleted account
    public function UserDeletedService(){

        $users = User::onlyTrashed()->orderBy('created_at', 'DESC');

        return $users->paginate(5);

    }

    // delete user
    public function UserDestroyService($id){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        return $user->delete();
    }

    public function UserRestoreService($id){

        $decrypt = decrypt($id);
        $user = User::withTrashed()->findOrFail($decrypt);
        $user->restore();

        return $user;
    }



}
