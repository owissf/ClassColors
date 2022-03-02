<?php


namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\ButtonColor;
use App\Models\Club;
use App\Models\ClubColor;
use App\Models\Color;
use App\Models\User;
use App\Models\UserColor;
use App\Models\UserClub;
use App\Models\clubcolorsStudent;
use App\Models\Perm;
use App\Models\Role;
use App\Models\RolePerm;
use App\Models\Student;
use App\Models\UserRole;
use App\Service\FileService;
use Database\Seeders\ClubcolorsStudentSeeder;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $col = Color::findOrFail(ClubColor::findOrFail(request('clubColor'))->color_id);
        $clubColor = ClubColor::findOrFail(request('clubColor'));
        $thecolor = $clubColor->color_id;
        $club = Color::findOrFail($thecolor)->clubs[0];
        $this->authorize('enterColor' , ["",$thecolor]);
        $admin = $club->user_id;
        $students = collect($clubColor->students)->sortByDesc('score');
        $buttons = $col->buttons;
        $userscolor = Color::findOrFail($thecolor)->users;
        $userscolorid = [];
        foreach($userscolor as $usercolor)
        {
            array_push($userscolorid , $usercolor->pivot->id , $usercolor->name , $usercolor->id);
        }
        return view('student.index', compact( 'students','clubColor','thecolor','buttons','club','admin','userscolorid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubColor = request('clubColor');
        return view('student.create' , compact('clubColor'));
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
            'name' => 'required|min:4|unique:students',
            'code' => 'required|min:5|unique:students',
            'score' => 'required|numeric'
        ]);
        $student = Student::create($validated);
        $clubColor = request('clubColor');
        $studentc = clubcolorsStudent::firstOrCreate([
            'clubcolor_id' => $clubColor,
            'student_id' => $student->id
        ]);

        return redirect()->back();
    
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addButton(Request $request)
    {
        $bb = request('color');
        $validated = $request->validate([
            'namebutton' => 'required|unique:buttons',
            'score' => 'required|numeric',
        ]);
        $validated += [
            'color_id' => $bb,
        ];
        $button = Button::create($validated);
        return redirect()->back();
        
    }

    public function delButton(Request $request)
    {
        $dell = $request->validate([
            'select' => 'required'
        ]);
        //return $dell;
        $del = Button::all()->find($dell);
        //$del[0];
        $del[0]->delete();
        return redirect()->back();
    }

    public function delTeColor(Request $request)
    {
        $dell = $request->validate([
            'selectt' => 'required'
        ]);
        $del = UserColor::findOrFail($dell);
        $user = Auth::user();
        $userq = User::find($del[0]->user_id);
        $rol = FileService::rol($userq , request('club_id') , request('color_id'));
        $rolu = FileService::rol($user , request('club_id') , request('color_id'));
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
                if($permsu->contains('delTeColor')){
                    if(!$perms->contains('delTeColor')){
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    public function addTeOld(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
        ]);
        $val = User::where('email',$request['email'])->first();
                    $usercolor = [
                        'color_id' => request('color_id'),
                        'user_id' => $val->id,
                        
                    ];
                    $usercolor1 = UserColor::firstOrCreate($usercolor);
                    $club = Color::findOrFail(request('color_id'))->clubs[0];
                    $userclub = [
                        'club_id' => $club->id,
                        'user_id' => $val->id,
                        'useradmin' => '0'
                    ];
                    $userclub1 = UserClub::firstOrCreate($userclub);
                    return redirect()->back();    
    }

    public function addTe(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $val = User::firstOrCreate([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin' => '0',
        ]);
                    $usercolor = [
                        'color_id' => request('color_id'),
                        'user_id' => $val->id
                    ];
                    $usercolor1 = UserColor::firstOrCreate($usercolor);
                    $club = Color::findOrFail(request('color_id'))->clubs[0];
                    $userclub = [
                        'club_id' => $club->id,
                        'user_id' => $val->id,
                        'useradmin' => '0'
                    ];
                    $userclub1 = UserClub::firstOrCreate($userclub);
                    return redirect()->back();    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function addScore(Request $request, Student $student)
    {
        $student->score += request('score');
        $student->save();
        return redirect()->back();
    }

    public function del(Request $request)
    {
        $dell = Student::all()->find(request('student'))->delete();
        return redirect()->back();
    }
}
