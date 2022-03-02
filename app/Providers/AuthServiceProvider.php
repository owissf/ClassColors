<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Club;
use App\Models\ClubColor;
use App\Models\Color;
use App\Models\Perm;
use App\Models\Role;
use App\Models\UserRole;
use App\Policies\ClubPolicy;
use App\Service\FileService;
use GuzzleHttp\Psr7\Request;
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
        'App\Models\Club' => 'App\Policies\ClubPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::after(function ($user , $perm , $club , $color )
        {
            if(isset($color[0])){
                $club1 = $color[0];
            }
            else
            {
                $club1 = null;
            }
            if(isset($color[1])){
                $color1 = $color[1];
            }
            else
            {
                $color1 = null;
            } 
            // if($perm == 'enterClub')
            // {
            //     dd($club1 , $color1);
            // }
            $userroles = $user->praviteroles($club1 , $color1);    
            if(!empty($userroles))
            {
                $roles = Role::find($userroles->map->role_id);
            }
            if(!empty($roles))
            {
                return $roles->map->perms->flatten()->pluck('perm')->unique()->contains($perm);   
            }
           
        });
    }
}
