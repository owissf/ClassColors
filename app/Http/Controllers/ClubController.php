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
use App\Models\UserRole;
use App\Models\UserroleClub;
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
        
        /*
            Role::firstOrCreate([
                'role' => 'adminclub'
            ]);
            Role::firstOrCreate([
                'role' => 'enterClub'
            ]);
            Role::firstOrCreate([
                'role' => 'enterColor'
            ]);
        

            Perm::firstOrCreate([
                'perm' => 'adminclub'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delTeColor'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addRoles'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addRole'
            ]);
            Perm::firstOrCreate([
                'perm' => 'admin'
            ]);
            Perm::firstOrCreate([
                'perm' => 'dashboard'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delTeClub'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addColor'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delSchool'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delTe'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addTeOld'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addTeNew'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delColor'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addStudent'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addScore'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delStudent'
            ]);
            Perm::firstOrCreate([
                'perm' => 'addButton'
            ]);
            Perm::firstOrCreate([
                'perm' => 'delButton'
            ]);
            Perm::firstOrCreate([
                'perm' => 'enterClub'
            ]);
            Perm::firstOrCreate([
                'perm' => 'enterColor'
            ]);
        
       
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '1'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '2'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '3'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '4'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '5'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '6'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '7'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '8'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '9'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '10'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '11'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '12'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '13'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '14'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '15'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '16'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '17'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '18'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '19'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '1',
                'perm_id' => '20'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '2',
                'perm_id' => '19'
            ]);
            RolePerm::firstOrCreate([
                'role_id' => '3',
                'perm_id' => '20'
            ]);

            
            /*
            $perms = Perm::all();
            unset($perms[0]);
            foreach($perms as $perm)
            {
                $per = Perm::firstOrCreate([
                    'perm' => 'add' . $perm->perm
                ]);
                RolePerm::firstOrCreate([
                    'role_id' => '1',
                    'perm_id' => $per->id
                ]);
            }
            */
        
        $clubs = Club::all();
        // return $clubs;
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
        $this->middleware('can:addSchool');
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
            'useradmin' => '1'
        ];
        //return $clubuserperm;
        $userclub1 = UserClub::firstOrcreate($userclub);
        
        $userrole = UserRole::firstOrCreate([
            'user_id' => $user,
            'role_id' => '1',
        ]);
        UserroleClub::firstOrCreate([
            'club_id' => $club->id,
            'userrole_id' => $userrole->id,
        ]);
        $userrole = UserRole::firstOrCreate([
            'user_id' => $user,
            'role_id' => '2',
        ]);
        UserroleClub::firstOrCreate([
            'club_id' => $club->id,
            'userrole_id' => $userrole->id,
        ]);
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
