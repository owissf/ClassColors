<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubColor;
use App\Models\Perm;
use App\Models\userPerm;
use App\Models\UserClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User;
use App\Models\Color;
use App\Models\Role;
use App\Models\RolePerm;
use App\Models\Student;
use App\Service\FileService;
use Database\Factories\userpermsFactory;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(empty(Role::all()) == false)
        {
            Role::create([
                'role' => 'adminer'
            ]);
            Role::create([
                'role' => 'editer'
            ]);
            Role::create([
                'role' => 'teacher'
            ]);
            Role::create([
                'role' => 'student'
            ]);
        }
        if(!empty(Perm::all()) == false)
        {
            Perm::create([
                'perm' => 'admin'
            ]);
            Perm::create([
                'perm' => 'addColor'
            ]);
            Perm::create([
                'perm' => 'delSchool'
            ]);
            Perm::create([
                'perm' => 'delTe'
            ]);
            Perm::create([
                'perm' => 'addTeOld'
            ]);
            Perm::create([
                'perm' => 'addTeNew'
            ]);
            Perm::create([
                'perm' => 'delColor'
            ]);
            Perm::create([
                'perm' => 'addStudent'
            ]);
            Perm::create([
                'perm' => 'addScore'
            ]);
            Perm::create([
                'perm' => 'delStudent'
            ]);
            Perm::create([
                'perm' => 'addButton'
            ]);
            Perm::create([
                'perm' => 'delButton'
            ]);
        }
        if(!empty(RolePerm::all()) == false)
        {
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '1'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '2'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '3'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '4'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '5'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '6'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '7'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '8'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '9'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '10'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '11'
            ]);
            RolePerm::create([
                'role_id' => '1',
                'perm_id' => '12'
            ]);
        }
        $clubs = Club::all();
        return view('club.index', compact( 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $validated = $request->validate([
            'name' => 'required',
            'image' =>'file|required|image',
        ]);
        // $path = Storage::disk('public')->put('images', $request->file('image'));
        // $validated['image'] = $path;
        $path = FileService::saveFile($request, 'image');
        $validated['image'] = $path;
        $validated += [
            'user_id' => $user,
        ];
        $club = Club::create($validated);
        $userclub = [
            'club_id' => $club->id,
            'user_id' => $user,
        ];
        //return $clubuserperm;
        $userclub1 = UserClub::create($userclub);
        return redirect()->route('color.index' , $club->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
    public function del(Request $request)
    {
        $club = Club::all()->find(request('club'));
        $colors = $club->colors;
        $clubColors = [];
        $students = [];
        foreach($colors as $color)
        {
            array_push($clubColors , ClubColor::find($color->pivot->id));
        }
        foreach($clubColors as $clubColor)
        {
            array_push($students , $clubColor->students);
        }
        //return $students;
        foreach($students as $student)
        {
            foreach($student as $studen)
            {
                Student::find($studen->id)->delete();
            }
        }
        foreach($colors as $color)
        {
            Color::find($color->id)->delete();
        }
        Club::all()->find(request('club'))->delete();
        return redirect()->route('club.index');
    }
}
