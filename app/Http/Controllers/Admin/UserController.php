<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';
    const PATH_UPLOAD = 'users';


    public function index()
    {
        $data = User::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    public function show(string $id)
    {
        $model = User::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    public function edit(string $id)
    {
        $model = User::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }
}