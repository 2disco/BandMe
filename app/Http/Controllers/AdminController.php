<?php

namespace Band\Http\Controllers;

use Band\Band;
use Band\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin/home');
    }

    public function removeBand(Band $band)
    {
        $band->delete();
        return redirect('/admin')->with('success','Information has been deleted');
    }

    public function removeUser(User $user)
    {
        $user->delete();
        return redirect('/user')->with('success','Information has been deleted');
    }

    public function editUser($id)
    {
        if(Auth::user()->isAdmin()) {
            $user = \Band\User::find($id);
            return view('user/admin_edit', ['user' => $user, 'id' => $id]);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->get('name');
        $user->username=$request->get('username');
        $user->email=$request->get('email');
        $user->roleband=$request->get('roleband');

        $user->save();
        return redirect('/user');
    }

    public function editBand($id)
    {
        if(Auth::user()->isAdmin()) {
            $band = Band::find($id);
            return view('band/admin_edit', ['band' => $band, 'id' => $id]);
        }
    }

    public function updateBand(Request $request, $id)
    {
        $band = \Band\Band::find($id);
        $band->name=$request->get('name');
        $band->born=$request->get('born');
        $band->add_member = $request->add_member;
        $band->bio=$request->get('bio');

        $band->save();
        return redirect('/band');
    }
}
