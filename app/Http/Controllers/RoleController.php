<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Perm;
use App\Models\Role;
use App\Models\User;
use App\Models\UserClub;
use App\Models\UserRole;
use App\Models\UserroleClub;
use App\Models\UserroleColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('can:dashboard,[request("club_id") , ""]');
        $useradmin = Auth::user();
        $club = Club::findORfail(request('club_id'));
        
        if($useradmin->clubs->contains(Club::findORfail(request('club_id'))))
        {
            $users = $club->users;
        }
        else
        {
            abort(403);
        }
        
        // $roles = $club->userroles->unique();
        // $roles = Role::find($roles->map->role_id);
        $rolesclub = $club->roles;
        $allperms = Perm::all();
        $rolee = Role::all();
        $i = 0;
        foreach($rolee as $role)
        {
            if(!empty($role->club_id))
            {
                unset($rolee[$i]);
            }
            $i = $i + 1;
        }
        $roles = $rolesclub->merge($rolee);
        $colors = $club->colors;
            $i = 0;
            foreach($users as $user){
                $userroless = $user->praviteroles(request('club_id') , '');
                $userroles = Role::find($userroless->map->role_id);
                if($userroles->contains('role','adminclub') || $user->id == $useradmin->id)
                {
                    unset($users[$i]);
                }
                $i = $i + 1;
            }
            $i = 0;
            $userperms = $roles->map->perms->flatten()->pluck('perm')->unique();
            foreach($roles as $role)
            {
                $perms = $role->perms;
                foreach($perms as $perm)
                {
                    if(!$userperms->contains('add' . $perm->perm))
                     {
                        unset($roles[$i]);
                    }
                }
                $i = $i + 1;
            }
            
        return view('dashboard.dash' , compact('users' , 'roles' , 'club' , 'colors' , 'allperms'));
    }









    public function indexclub()
    {
        // check the user is have the permision 'dashboard' or not
        $this->middleware('can:dashboard,App\Models\Club');
        // take the user recent and put it in $user
        $user = Auth::user();
        $userRolesClubs = UserroleClub::all();
        $clubs = [];
        foreach($userRolesClubs as $userRoleClub)
        {
            $userRole = UserRole::find($userRoleClub->userrole_id);
            if($userRole->user_id == $user->id)
            {
                $role = Role::find($userRole->role_id);
                if($role->perms->contains('perm','admin'))
                {
                    if(!empty(Club::find($userRoleClub->club_id)))
                    {
                        array_push($clubs , Club::find($userRoleClub->club_id));
                    }
                }
            }
        }
        return view('dashboard.dashclub' , compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'nameRole' => 'required',
        ]);
        $validate = [
            'role' => $request['nameRole'],
            'club_id' => request('club_id'),
        ];
        $role = Role::create($validate);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'selectt' => 'required',
        ]);
        $club = Club::findOrFail(request('club_id'));
        if($request['color'] == null)
        {
            if(User::findOrFail(request('user_id'))->id != Auth::user()->id && $club->users->contains(request('user_id')))
            {
                $userrole = UserRole::firstOrCreate([
                    'user_id' => request('user_id'),
                    'role_id' => $request['selectt'],
                ]);
                // return $userrole;
                UserroleClub::firstOrCreate([
                    'club_id' => $request['club'],
                    'userrole_id' => $userrole->id,
                ]);
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            if(User::findOrFail(request('user_id'))->id != Auth::user()->id && $club->users->contains(request('user_id')))
            {
                $userrole = UserRole::firstOrCreate([
                    'user_id' => request('user_id'),
                    'role_id' => $request['selectt'],
                ]);
                UserroleColor::firstOrCreate([
                    'color_id' => $request['color'],
                    'userrole_id' => $userrole->id,
                ]);
            }
            else
            {
                abort(403);
            }
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }


    public function join(Role $role , Request $request)
    {
        $thePerms = $request->checkbox;
        dd($thePerms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
