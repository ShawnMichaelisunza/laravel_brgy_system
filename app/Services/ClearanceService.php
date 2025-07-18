<?php

namespace App\Services;

use App\Models\Clearance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClearanceService
{
    public function ClearanceUserService()
    {
        $users = User::orderBy('created_at', 'DESC');
        return $users->paginate(10);
    }

    public function ClearanceAllService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        $clearances = $user->clearances()->orderBy('created_at', 'DESC');

        return $clearances->paginate(5);
    }

    public function ClearanceCreateService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        return $user;
    }

    public function ClearanceStoreService($data)
    {
        $clearance = Clearance::create($data);
        return $clearance;
    }

    public function ClearanceShowService($id)
    {
        $decrypt = decrypt($id);
        $clearance = Clearance::findOrFail($decrypt);

        return $clearance;
    }

    public function ClearanceApproveService($id)
    {
        $decrypt = decrypt($id);
        $clearance = Clearance::findOrFail($decrypt);
        $clearance->status = 'APPROVED';
        $clearance->save();

        return $clearance;
    }

    public function ClearanceDisapproveService($id)
    {
        $decrypt = decrypt($id);
        $clearance = Clearance::findOrFail($decrypt);
        $clearance->status = 'DISAPPROVED';
        $clearance->delete();
        $clearance->save();

        return $clearance;
    }
}
