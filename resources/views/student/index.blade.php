
<?php

use App\Models\ClubColor;
use Illuminate\Support\Facades\Auth;
use App\Models\Color;
use App\Models\User;
use App\Service\FileService;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >

  <!-- in the any code-->
  <meta charset="UTF-8" >
  <meta name="author" content="Owis Al Khole">
  <meta name="description" content="learn web design">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="imgs/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <title>{{ Color::find($thecolor)->name }}</title>
  <style>
    @font-face {
  font-family: 'FF Yaseer';
  font-style: normal;
  font-weight: 400;
  src: url("{{ asset('css/FFYaseer.Regular.otf') }}") !important;
}
body{
	font-family: FF Yaseer;
}
.rr{
	margin:0 auto;
}
.col-sm-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }
  #login{
	width: 600px;
	height: 400px;
	border: 2px solid black;
	border-radius: 15px;
	margin: 0 auto;
	
}
.text{
	margin-top: 140px;
	font-family:  sans-serif;
}
.log{
	margin : 0 auto;
}
.mt-5{
	margin-top: 6.9rem !important;
}
.btn-primary{
	background-color: white;
	color: black;
	margin-left: 2px;
	margin-bottom: 5px;
}
.ooi{
	font-size: 12px;
	margin-left: 0px;
	margin-bottom: 0px;
}
@media(max-width : 776px) {
  .col-sm-6 {
    flex: 0 0 auto !important;
    width: 50% !important;
    transform: translate(-25%) !important;
  }
}

@media(min-width : 992px) {
      .fgfg {
        margin-right: 8.33333% !important;
      }
      .alert {
      width: 80%;
      }
    }
    .alert {
      position: fixed;
      margin-top: 17rem;
    }
    @media(max-width : 376px)
    {
      .alert {
      margin-right: 5%;
      }
    }
    @media(min-width : 376px )
    {
      @media(max-width : 992px)
      {
        .alert {
        width: 80%;
        }
      }
    }

 @media (min-width : 776px) {
.col-md-3{
  transform: translate(-25%);
} 
 }
/*.btn-close{
  margin-right: 60px !important;
}*/
/*.offset-2{
  margin-right: 16% !important;
}*/
.btn-primary{
	background-color: white;
	color: black;
	margin-left: 2px;
	margin-bottom: 5px;
  transition-duration: 0.7s;
  box-shadow: 4px 3px 10px 0px #afafaf;
  border :#127df1 outset;
}
td{
  font-weight: bold;
}
@media(max-width : 576px) {
  .col-xs-6 {
    flex: 0 0 auto;
    width: 50%;
    transform: translate(-25%);
  }
  .col-xs-12 {
    flex: 0 0 auto;
    width: 50%;
    transform: translate(25%);
  }
}
@media(min-width : 576px) {
  @media(max-width : 992px) {
    .col-sm-4{
      transform: translate(-25%);
    }
  }
}

@media (min-width : 992px) {
  .col-lg{
    transform: translate(-25%);
  }
}

.btn-secondary{
	margin-left: 2px;
	margin-bottom: 5px;
  transition-duration: 0.7s;
  box-shadow: 0 2px 4px 0 black;
}

  </style>
 
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/FFYaseer.Regular.otf') }}" rel="stylesheet">

</head>

<body>


  <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('regdister'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       
                                    </form>
                          <select>
                            <option selected>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                              </option>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    
                                      <option onclick="
                                      window.location.assign('{{ route('logout') }}');
                                      event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                        " id="ds">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></option>
                                    <option onclick=' window.location.assign("{{ url('/home') }}") '>
                                    <a href="{{ url('/home') }}" class="dropdown-item">Home</a>

                                    
                                  </option>
                                  
                                </div>
                              </select>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
  </div>


  <div class="container text-center">  
<input type="button" value="Go back" onclick="history.back()" class="btn btn-secondary" style="position: fixed;bottom : 10%; left: 10%;">
@auth    
@can('addScore', [$club->id , $thecolor])
<div class="modal fade" id="oo">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">إضافة النقاط</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal" onclick="share = 0,hodor = 0,winner = 0,clean = 0,quraan = 0,maard = 0,del = 0,howk = 0,add5 = 0;">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <tr>
              @foreach($buttons as $button)
            <input type="button" class="btn btn-primary" value="{{ $button->namebutton }}  {{ $button->score }}" onclick="{{ $button->namebutton }}++;">
            @endforeach
            <!--<td><input type="button" class="btn btn-primary" value="النظافة 10" onclick="clean++;"></td>
            <td><input type="button" class="btn btn-primary" value="وجداني 15" onclick="quraan++;"></td>
            <td><input type="button" class="btn btn-primary" value="مشاركة 5" onclick="share++;"></td>
            <td><input type="button" class="btn btn-primary" value="إضافة 5 نقاط" onclick="add5++;"></td>
            <td><input type="button" class="btn btn-primary" value="المعرض العلمي 25" onclick="maard++;"></td>
            <td><input type="button" class="btn btn-primary" value="أنت الرابح 20" onclick="winner++;"></td>
            <td><input type="button" class="btn btn-primary" value="إزالة 5 نقاط" onclick="del++;"></td>
            <td><input type="button" class="btn btn-primary" value="وظيفة 5" onclick="howk++;"></td>-->
          </tr>
        
          </div>

          
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
          @can('addButton', [$club->id , $thecolor])
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbutton">إضافة زر</button>
          @endcan
          @can('delButton', [$club->id , $thecolor])
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delbutton">حذف زر</button>
          @endcan
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="
              @foreach($buttons as $button)
              document.getElementById('{{ $button->namebutton }}').innerHTML = {{ $button->namebutton }} * {{ $button->score }};
              @endforeach
              document.getElementById('sc').innerHTML = @foreach($buttons as $button)
              {{ $button->namebutton }} * {{ $button->score }} + 
              @endforeach
              0;
              document.getElementById('ddddd').value = 
              @foreach($buttons as $button)
              {{ $button->namebutton }} * {{ $button->score }} + 
              @endforeach
              0;">
              موافق
            </button>
            
          </form>
          </div>
          
        </div>
      </div>
    </div>
@endcan
@can('addStudent', [$club->id , $thecolor])
    <div class="modal fade" id="addstudent">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">إضافة طالب</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <form  method="post" 
              action="{{ route('student.store' , $clubColor->id) }}"
                    autocomplete="off"
                    enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            
                    <div class="form-group">
                      <label for="name" class="float-end">اسم الطالب :</label>
                      <input type="text" name="name" required
                              value="{{ old('name') }}"
                            placeholder="اسم الطالب" class="form-control" id="name">
                      @if($errors->has('name'))
                          <div class="error" style="color:red">{{ $errors->first('name') }}</div>
                      @endif
                  </div>
                  

                  <div class="form-group">
                      <label for="code" class="float-end">كلمة المرور :</label>
                      <input type="text" name="code" required
                              value="{{ old('code') }}"
                            placeholder="كلمة المرور" class="form-control" id="code">
                      @if($errors->has('code'))
                          <div class="error" style="color:red">{{ $errors->first('code') }}</div>
                      @endif
                  </div>

                  <div class="form-group">
                      <label for="score" class="float-end">المجموع البدائي :</label>
                      <input type="number" name="score" required
                              value="0"
                            placeholder="المجموع البدائي" class="form-control" id="score">
                      @if($errors->has('score'))
                          <div class="error" style="color:red">{{ $errors->first('score') }}</div>
                      @endif
                  </div>
            
          </div>

          
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
          <button type="submit" class="btn btn-primary">
              {{ __('موافق') }}
            </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
@endcan
@can('addButton', [$club->id , $thecolor])
    <div class="modal fade" id="addbutton">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">إضافة زر</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          <form  method="post" 
              action="{{ route('student.add.button' , $thecolor) }}"
                    autocomplete="off"
                    enctype="multipart/form-data">
              @csrf
                    <div class="form-group">
                      <label for="namebutton" class="float-end">اسم الزر :</label>
                      <input type="text" name="namebutton" required
                              value="{{ old('namebutton') }}"
                            placeholder="اسم الزر" class="form-control" id="namebutton">
                      @if($errors->has('namebutton'))
                          <div class="error" style="color:red">{{ $errors->first('namebutton') }}</div>
                      @endif
                  </div>
                  

                  <div class="form-group">
                      <label for="score" class="float-end">قيمة الزر</label>
                      <input type="number" name="score" required
                              value="{{ old('score') }}"
                            placeholder="قيمة الزر" class="form-control" id="score">
                      @if($errors->has('score'))
                          <div class="error" style="color:red">{{ $errors->first('score') }}</div>
                      @endif
                  </div>
            
          </div>

          
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
          <button type="submit" class="btn btn-primary">
              {{ __('موافق') }}
            </button>
          </form>
          </div>
          
        </div>
      </div>
    </div>
@endcan
@can('delButton', [$club->id , $thecolor])
    <div class="modal fade" id="delbutton">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">حذف زر</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" 
             action="{{ route('student.del.button') }}"
                    autocomplete="off"
                    enctype="multipart/form-data" id="ggg">
              @csrf
          <!-- Modal body -->
          <div class="modal-body">
            <label for="sel">اختر الزر الذي تريد حذفه </label>
            <select class="form-select" size="3" name="select" aria-label="size 3 select example" id="sel">
            @foreach ($buttons as $button)
              <option value="{{ $button->id }}">{{ $button->namebutton }}</option>
              @endforeach
            </select>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
          
              <button type="submit" class="btn btn-primary">
              {{ __('موافق') }}
            </button>
          
          </div>
          </form>
        </div>
      </div>
    </div>
@endcan

      @can('addScore', [$club->id , $thecolor])
      <!-- Modal -->
      <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-center" id="exampleModalLabel">أنت على وشك إضافة النقاط التالية :</h2>
              <button type="button" class="btn-close float-start" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>
            @foreach($buttons as $button)
                {{ $button->namebutton }} : <span id="{{ $button->namebutton }}"></span><br>
                @endforeach
                <!--الحضور : <span id="ho"></span><br>
                أنت الرابح : <span id="wi"></span><br>
                نظافة : <span id="cl"></span><br>
                وجداني : <span id="qu"></span><br>
                معرض علمي : <span id="ma"></span><br>
                إزالة : <span id="de"></span><br>
                وظيفة : <span id="how"></span><br>
                إضافة : <span id="add5"></span><br>-->
                المجموع : <span id="sc"></span><br>
              </p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">غير موافق</button>
              <form action=""
                method="post" 
                  autocomplete="off"
                  enctype="multipart/form-data" id="ffd">
                  @csrf
              <button type="submit" id="ddddd" name="score" class="btn btn-primary float-start" value="موافق" >موافق</button>
          </form>
            </div>
          </div>
        </div>
      </div>
      @endcan
    @can('delStudent', [$club->id , $thecolor])
    <div class="modal fade" id="os">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">أنت على وشك حذف طالب</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <h4>هل أنت متأكد أنك تريد حذف هذا الطالب؟</h4>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
              <form action=""
                method="post" 
                  autocomplete="off"
                  enctype="multipart/form-data" id="sddd">
                  @csrf
              <button type="submit" class="btn btn-primary float-start" value="موافق" >موافق</button>
          </form>
          </form>
          </div>
          
        </div>
      </div>
    </div>
    @endcan
    @can('delColor', [$club->id , $thecolor])
      <div class="modal fade" id="delcolor">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">أنت على وشك حذف الشعبة</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <h4>هل أنت متأكد أنك تريد حذف هذه الشعبة ؟</h4>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
                <form action="{{ route('color.del', $thecolor) }}"
                  method="post" 
                    autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                <button type="submit" class="btn btn-primary float-start" value="موافق" >موافق</button>
            </form>
            </form>
            </div>
            
          </div>
        </div>
      </div>
      @endcan
      @can('delTeColor', [$club->id , $thecolor])
      <div class="modal fade" id="delte">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">حذف مشرف</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            <form  method="post" 
              action="{{ route('student.del.te' , [ $thecolor , $club->id ]) }}"
                      autocomplete="off"
                      enctype="multipart/form-data">
                @csrf
            <!-- Modal body -->
            <div class="modal-body">
              <label for="sel">اختر المشرف الذي تريد حذفه </label>
              <select class="form-select" size="3" name="selectt" aria-label="size 3 select example" id="sel">
                
                @for($i = 0 ; $i < count($userscolorid) ; $i = $i + 3)
                <?php
                $userq = User::findOrFail($userscolorid[$i + 2]);
                $user = Auth::user();
                $rol = FileService::rol($userq , $club->id , $thecolor);
                $rolu = FileService::rol($user , $club->id , $thecolor);
                $permsu = $rolu->map->perms->flatten()->pluck('perm')->unique();
                $permsq = $rol->map->perms->flatten()->pluck('perm')->unique();
                ?>
                @if($user->id != $club->user_id)
                  @if($rolu->contains('role','adminer'))
                    @if(!$rol->contains('role','adminer'))
                      <option value="{{ $userscolorid[$i] }}">{{ $userscolorid[$i + 1] }}</option>
                    @endif
                  @else
                    @if(!$permsq->contains('delTeColor'))
                      <option value="{{ $userscolorid[$i] }}">{{ $userscolorid[$i + 1] }}</option>
                    @endif
                  @endif
                @else
                  @if($userscolorid[$i + 2] != $admin)
                    <option value="{{ $userscolorid[$i] }}">{{ $userscolorid[$i + 1] }}</option>
                  @endif
                @endif
                
                @endfor
              </select>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
            
                <button type="submit" class="btn btn-primary">
                {{ __('موافق') }}
              </button>
            
            </div>
            </form>
          </div>
        </div>
      </div>
      @endcan
      @can('addTeNew', [$club->id , $thecolor])
      <div class="modal fade" id="addte-new">
        <div class="modal-dialog">
          <div class="modal-content">
          <form  method="post" 
                action="{{ route('add.te' , $thecolor) }}"
                      autocomplete="off"
                      enctype="multipart/form-data">
                @csrf
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">إضافة مشرف جديد</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <div class="card-body">
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>
                      
                  </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
                
                <button type="submit" class="btn btn-primary float-start">
                  {{ __('موافق') }}
                </button>
            
            
            </div>
            </form>
          </div>
        </div>
      </div>
      @endcan
      @can('addTeOld', [$club->id , $thecolor])
      <div class="modal fade" id="addte-old">
        <div class="modal-dialog">
          <div class="modal-content">
          <form  method="post" 
                action="{{ route('add.te.old' , $thecolor) }}"
                      autocomplete="off"
                      enctype="multipart/form-data">
                @csrf
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">إضافة مشرف قديم</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <div class="card-body">
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      
                  </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
                
                <button type="submit" class="btn btn-primary float-start">
                  {{ __('موافق') }}
                </button>
            
            
            </div>
            </form>
          </div>
        </div>
      </div>
      @endcan
<h1 class="text-center my-4 h1 ">أسماء الطلاب </h1>
<div class="row">
@can('addStudent', [$club->id , $thecolor])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addstudent">
        إضافة طالب
      </button>
  </div>
  @endcan
  @can('delColor', [$club->id , $thecolor])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#delcolor">
       حذف الشعبة
      </button>
  </div>
  @endcan
  @can('addTeNew', [$club->id , $thecolor])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addte-new">
       إضافة مشرف جديد
      </button>
  </div>
  @endcan
  @can('addTeOld', [$club->id , $thecolor])
  <div class="col-lg col-sm-5 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addte-old">
     إضافة مشرف قديم
      </button>
  </div>
  @endcan
  @can('delTeColor', [$club->id , $thecolor])
  <div class="col-lg col-sm-5 col-xs-12">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#delte">
       حذف مشرف
      </button>
  </div>
  @endcan
</div>

    <table class="table mb-5" id="f" dir="rtl">
      <thead>
        <tr>
          <th scope="col">الترتيب</th>
          <th scope="col">الاسم الكامل</th>
          <th scope="col">المجموع</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php $i = 1; ?>
      @foreach ($students as $student)
      
      <tr>
          <td>{{ $i }}</td>
          <td>{{ $student->name }}</td>
          <td>{{$student->score}}</td>
          @can('addScore', [$club->id , $thecolor])
          <td><form action="{{ route('student.add.score', $student->id) }}"
            method="post" 
            autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <input type="button" class="btn btn-primary ooi" value="إضافة النقاط"  data-toggle="modal" data-target="#oo" onclick="document.getElementById('ffd').action = '{{ route('student.add.score', $student->id) }}' ">
          </form></td>
          @endcan
          @can('delStudent', [$club->id , $thecolor])
          <td><form action="{{ route('student.del', $student->id) }}"
            method="post" 
            autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <input type="button" class="btn btn-primary ooi" value="حذف الطالب" data-toggle="modal" data-target="#os" onclick="document.getElementById('sddd').action = '{{ route('student.del', $student->id) }}' ">
          </form></td>
          @endcan
      </tr>
      <?php $i += 1; ?>
      @endforeach

      </form>
      </tbody>
    </table>
              @if($errors->has('name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Name!</strong> {{ $errors->first('name') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('email'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Email!</strong> {{ $errors->first('email') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('namebutton'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Name Button!</strong> {{ $errors->first('namebutton') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('score'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Score!</strong> {{ $errors->first('score') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('code'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Password!</strong> {{ $errors->first('code') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('password'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Password!</strong> {{ $errors->first('password') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
</div>
@endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

<script>
  //var share = 0,hodor = 0,winner = 0,clean = 0,quraan = 0,maard = 0,del = 0,add5 = 0,howk = 0;
  @foreach($buttons as $button)
  var {{ $button->namebutton }} = 0;
  @endforeach
</script>


<script>
  var selectt = document.getElementById('sel');


</script>

<script>
  document.cookie = 'select=' + "" + ';';
var selectt = document.getElementById('sel'),fd="";
var x = setInterval(oww,1);
function oww() {
  //document.getElementById('ggg').action = '{{ route('student.del.button' , ' + selectt.value + ' ) }}';
	for (var i = 0; i < selectt.length; i++) {
		if (selectt[i].selected) {
      document.cookie = 'select=' + selectt[i].value + ';';
			
			
		}
		
	}
}
document.getElementById('ds').addEventListener("click",function(){
window.location.assign('{{ route('logout') }}');
  event.preventDefault();
  document.getElementById('logout-form').submit();
});


</script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
