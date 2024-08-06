<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update(Request $request, string $id)
    {
        $model = User::query()->findOrFail($id);
        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }

        $oldAvatar = $model->avatar;

        $model->update($data);
        // Xóa ảnh cũ
        if ($request->hasFile('avatar') && $oldAvatar && Storage::exists($oldAvatar)) {
            Storage::delete($oldAvatar);
        }

        return redirect()->route('admin.users.index');
    }
    public function destroy(string $id)
    {
        $model = User::query()->findOrFail($id);
        $model->delete();
        return redirect()->route('admin.users.index');
    }
}
