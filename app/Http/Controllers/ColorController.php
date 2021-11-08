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
        $this->authorize('enter-club' , $club);
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

        $color_id = Color::all()->last()->id;
        $clubb = request('club');
        $colooo = ClubColor::create([
            'club_id' => $clubb,
            'color_id' => $color_id,
        ]);
        $usercolor = [
            'color_id' => $color_id,
            'user_id' => Club::find(request('club'))->user_id
        ];
        //return $usercolor;
        $usercolor1 = UserColor::create($usercolor);
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

    public function delte(Request $request)
    {
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
        foreach ($del as $de)
        {
            $de->delete(); 
            User::find($de->user_id)->delete();
        }
        
        return redirect()->route('color.index', request('club_id'));
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
        $students = $clubColor->students;
        //return $students;
        foreach($students as $student)
        {
            Student::find($student->id)->delete();   
        }
        Color::all()->find(request('color'))->delete();
        return redirect()->route('color.index', $clubColor->club_id);
    }
}
