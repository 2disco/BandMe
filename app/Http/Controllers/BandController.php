<?php

namespace Band\Http\Controllers;

use Band\BandUser;

use Band\User;
use Illuminate\Support\Facades\Auth;
use Band\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $band = Band::all();
            return view('band/admin', ['bands' => $band]);
        } else {
            $band = Band::whereHas('users', function ($q) {
                $q->where('users.id', Auth::user()->id);
            })->get();
            return view('/band/home', ['bands' => $band]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/band/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'born' => 'required',
            'visibility' => 'boolean',
            'add_member' => 'boolean',
            'url_key' => 'string',
            'bio' => 'required',
        ]);

        $bandData = [
            'name' => $request->name,
            'born' => $request->born,
            'add_member' => $request->add_member,
            'bio' => $request->bio,
        ];

        $pivotData = [
            'role' => BandUser::ADMIN,
        ];

//        $band = new Band();
//        $band->name = $request->name;
//        $band->born = $request->born;
//        $band->add_member = $request->add_member;
//        $band->bio = $request->bio;
//        $band->save();
//        $band->users()->sync($user);

        Auth::user()->bands()->create($bandData, $pivotData);


        return redirect('/band')->with('success','Band created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->isAdmin()){
            $band = Band::find($id);
            return view('band/show', ['band' => $band, 'id' => $id]);
        } else {
            $_bandRole = BandUser::whereHas('band', function ($q) use ($id) {
                $q->where('id', $id);
            })->whereHas('user', function ($q) {
                $q->where('id', Auth::user()->id);
            })->where('role', BandUser::ADMIN)->get()->first();
            if (is_a($_bandRole, '\Band\BandUser')) {
                /** @var Band $band */
                $band = $_bandRole->band()->get()->first();
                return view('band/show', ['band' => $band, 'id' => $id]);
            } else {
                return redirect('/home');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->isAdmin()){
            $band = Band::find($id);
            return view('band/edit', ['band' => $band, 'id' => $id]);
        } else {
            $_bandRole = BandUser::whereHas('band', function ($q) use ($id) {
                $q->where('id', $id);
            })->whereHas('user', function ($q) {
                $q->where('id', Auth::user()->id);
            })->where('role', BandUser::ADMIN)->get()->first();
            if (is_a($_bandRole, '\Band\BandUser')) {
                /** @var Band $band */
                $band = $_bandRole->band()->get()->first();
                return view('band/edit', ['band' => $band, 'id' => $id]);
            } else {
                return redirect('/home');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $band = Band::find($id);
        $band->name=$request->get('name');
        $band->born=$request->get('born');
        $band->add_member = $request->add_member;
        $band->bio=$request->get('bio');

        $band->save();
        return redirect('/band/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $band = Band::find($id);
        Auth::user()->bands()->delete($band);
        return redirect('/band')->with('success','Information has been deleted');
    }

    /**
     * Create SEO url
     *
     * @param $id
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detail($id, $slug = '')
    {
        $band = Band::findOrFail($id);

        if ($slug !== $band->slug) {
            return redirect()->to($band->url);
        }

        return view('band.show')->withBand($band);
    }

    public function listBandAvailable()
    {
        $band = Band::all();
        return view('band/list',['bands' => $band]);
    }

    public function removeBandMember(Band $band, User $user)
    {
        $band->users()->detach($user->id);
        return redirect('/band')->with('success','Information has been deleted');
    }

    public function addBandMember(Band $band)
    {
//        if (count($band->id) > 0){
//            $pivotData = [
//                'role' => BandUser::ADMIN,
//            ];
//            Auth::user()->bands()->create($pivotData);
//            $band->users()->attach(Auth::user());
//        }
        $band->users()->attach(Auth::user());
        return redirect('/band')->with('success','Information has been add');
    }

    public function updateBandAvatar(Request $request, $id){

        $request->validate([
            'band_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $band = Band::find($id);

        $avatarName = $band->id.'_avatar'.time().'.'.request()->band_avatar->getClientOriginalExtension();
        $request->band_avatar->storeAs('/public/band_avatars',$avatarName);
        $band->band_avatar = $avatarName;
        $band->save();

        return back()
            ->with('success','You have successfully upload image.');
    }

}
