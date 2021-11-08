<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Club;
use App\Models\ClubColor;
use App\Models\Color;
use App\Models\Perm;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('add-school' , function (User $user)
        {
            return $user->admin == 1 && count($user->clubs) < 1;
        });

        Gate::define('enter-club' , function (User $user , Club $club)
        {
            return $club->users->contains($user);
        });

        Gate::define('enter-color' , function (User $user , Color $color)
        {
            return $color->users->contains($user);
        });

        Gate::define('user-admin' , function (User $user)
        {
            if(request('club') != null)
            {
                $club = request('club');
            }
            else
            {
                $club = ClubColor::findOrFail(request('clubColor'))->club_id;
            }
            return Club::findOrFail($club)->user_id == $user->id;
        });

        Gate::define('admin?' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'admin')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addColor' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addColor')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delSchool' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'delSchool')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delTe' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'delTe')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addTeOld' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addTeOld')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addTeNew' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addTeNew')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delColor' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'delColor')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addStudent' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addStudent')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addScore' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addScore')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delStudent' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'delStudent')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('addButton' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'addButton')
                {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delButton' , function (User $user)
        {
            $roles = $user->roles;
            $perms = [];
            foreach($roles as $role)
            {
                foreach($role->perms as $rol)
                {
                    array_push($perms , $rol);
                }
            }
            foreach($perms as $perr)
            {
                if($perr['perm'] == 'delButton')
                {
                    return true;
                }
            }
            return false;
        });
    }
}
