<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ButtonColor;
use App\Models\Button;
use App\Models\Club;
use App\Models\UserColor;
use App\Models\ClubColor;
use App\Models\Color;
use App\Models\Student;
use App\Models\User;
use App\Models\UserClub;
use App\Models\userPerm;
use App\Models\UserRole;
use App\Models\UserroleColor;
use App\Service\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Club::findOrFail(request('club'));
        $this->authorize('enterClub' , [$club->id,""]);
        $colors = $club->colors;
        $admin = $club->user_id;
        $usersclub = $club->users;
        $usersclubid = [];
        foreach($usersclub as $userclub)
        {
            array_push($usersclubid , $userclub->pivot->id , $userclub->name , $userclub->id);
        }
        return view('color.index', compact( 'colors' ,'club','admin','usersclubid'));
        /*$usere = $user->clubs;
        foreach($usere as $useree)
        {
            if($useree->id == request('club'))
            {
                $club = Club::findOrFail(request('club'));
                $colors = $club->colors;
                $admin = $club->user_id;
                $usersclub = $club->users;
                $usersclubid = [];
                foreach($usersclub as $userclub)
                {
                    array_push($usersclubid , $userclub->pivot->id , $userclub->name , $userclub->id);
                }
                return view('color.index', compact( 'colors' ,'club','admin','usersclubid'));
            }
        }*/
        //return view('home');  
        //return $club->colors[0]->id;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = request('club');
        return view('color.create' , compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'code' => 'required|regex:/^#[a-zA-Z0-9]{6}$/',
            'image' =>'file|required|image'
        ]);
        $path = Storage::disk('public')->put('filename', $request->file('image'));
        $validated['image'] = $path;
        $color = Color::create($validated);

        
        $clubb = request('club');
        $colooo = ClubColor::firstOrCreate([
            'club_id' => $clubb,
            'color_id' => $color->id,
        ]);
        $usercolor = [
            'color_id' => $color->id,
            'user_id' => Club::find($clubb)->user_id
        ];
        $usercolor1 = UserColor::firstOrCreate($usercolor);
        $usercolor = [
            'color_id' => $color->id,
            'user_id' => Auth::user()->id
        ];
        $usercolor1 = UserColor::firstOrCreate($usercolor);
        $userrole = [
            'user_id' => Auth::user()->id,
            'role_id' => 3,
        ];
        $user2 = UserRole::firstOrCreate($userrole);
        $userrole = [
            'user_id' => Club::find($clubb)->user_id,
            'role_id' => 3,
        ];
        $user1 = UserRole::firstOrCreate($userrole);
        UserroleColor::firstOrCreate([
            'color_id' => $color->id,
            'userrole_id' => $user1->id,
        ]);
        UserroleColor::firstOrCreate([
            'color_id' => $color->id,
            'userrole_id' => $user2->id,
        ]);
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    public function delTeClub(Request $request)
    {
        
        $dell = $request->validate([
            'selectt' => 'required'
        ]);
        $del = UserClub::findOrFail($dell);
        $user = Auth::user();
        $userq = User::find($del[0]->user_id);
        $rol = FileService::rol($userq , request('club_id') , $color = '');
        $rolu = FileService::rol($user , request('club_id') , $color = '');
        $perms = $rol->map->perms->flatten()->pluck('perm')->unique();
        $permsu = $rolu->map->perms->flatten()->pluck('perm')->unique();
        if(Club::find(request('club_id'))->user_id != $user->id){
            if($rolu->contains('role','adminer')){
                if(!$rol->contains('role' , 'adminer'))
                {
                    $del[0]->delete();
                }
            }
            else{
                if($permsu->contains('delTeClub')){
                    if(!$perms->contains('delTeClub')){
                        $del[0]->delete();
                    }
                }
            }
        }
        else{
            if($userq->id != $user->id){
                $del[0]->delete();
            }
        }
        return redirect()->back(); 

/*
        $dell = $request->validate([
            'selectt' => 'required'
        ]);
        //return $dell;
        $usercolors = UserColor::all();
        $del = UserClub::all()->find($dell);
        $club = Club::find(request('club_id'));
        foreach ($del as $de)
        {
            //return $de->user_id;
            $user = User::all()->find($de->user_id);
        }
        
        $colorsuser = $user->colors;
        $colors = $club->colors;
        foreach($colors as $color)
        {
            foreach($colorsuser as $coloruser)
            {
                if($coloruser->id == $color->id)
                {
                    foreach($usercolors as $usercolor)
                    {
                        if($usercolor->color_id == $color->id)
                        {
                            foreach ($del as $de)
                            {
                                //return $de->user_id;
                                if($usercolor->user_id == $de->user_id)
                                {
                                    $ii = UserColor::find($usercolor->id);
                                    $ii->delete();
                                }
                            }
                        }
                    }
                }
            }
        }
        $rol = FileService::rol($user , request('club_id') , $color = '');
        if(!$rol->contains('role','adminer')){
            foreach ($del as $de)
            {
                $de->delete(); 
                //User::find($de->user_id)->delete();
            }
        }
        
        return redirect()->route('color.index', request('club_id'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
    public function del(Request $request)
    {
        $color = Color::all()->find(request('color'));
        $clubColor = ClubColor::find($color->clubs[0]->pivot->id);
        Color::all()->find(request('color'))->delete();
        return redirect()->route('color.index', $clubColor->club_id);
    }
}
