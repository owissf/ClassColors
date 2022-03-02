
<?php

use App\Models\ClubColor;
use Illuminate\Support\Facades\Auth;
use App\Models\Color;
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

  <title>kjk</title>
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
    <div class="modal fade" id="os">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">أنت على وشك حذف طالب</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
              <form action=""
                method="post" 
                  autocomplete="off"
                  enctype="multipart/form-data" id="sddd">
                  @csrf
          <!-- Modal body -->
          <div class="modal-body">
            <h4>هل أنت متأكد أنك تريد حذف هذا الطالب؟</h4>
            <label for="sel" class="float-end">الدور</label>
            <select class="form-select" size="3" name="selectt" aria-label="size 3 select example" id="sel">
              @foreach($roles as $role)
              <option value="{{ $role->id }}">{{ $role->role }}</option> 
              @endforeach
            </select>
            <label for="club" class="float-end">النادي</label>
            <select class="form-select" size="3" name="club" aria-label="size 3 select example" id="club">
              <option value="">لا شيء</option> 
              <option value="{{ $club->id }}">{{ $club->name }}</option> 
            </select>
            <label for="color" class="float-end">اللون</label>
            <select class="form-select" size="3" name="color" aria-label="size 3 select example" id="color">
              <option value="">لا شيء</option> 
              @foreach($colors as $color)
              <option value="{{ $color->id }}">{{ $color->name }}</option> 
              @endforeach
            </select>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary float-start" value="موافق" >موافق</button>
          
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="joinperms">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">join perms</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form  method="post" 
                action=""
                      autocomplete="off"
                      enctype="multipart/form-data" id="joinpermsfrom">
                @csrf
            <div class="modal-body">
                

                  <select class="form-select" size="3" aria-label="size 3 select example">
                    @foreach($allperms as $allperm)
                      <option value="">
                       <input class="form-check-input" name="checkbox[]" type="checkbox" value="{{ $allperm->id }}">
                       {{ $allperm->perm }}
                      </option> 
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


    @can('addRoles', [$club->id , '']) 
      <div class="modal fade" id="addroles">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">إضافة دور جديد</h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form  method="post" 
                action="{{ route('role.create' , $club->id) }}"
                      autocomplete="off"
                      enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
              
                      <div class="form-group">
                        <label for="name" class="float-end">الدور</label>
                        <input type="text" name="nameRole" required
                                value="{{ old('nameRole') }}"
                              placeholder="الدور" class="form-control" id="nameRole">
                        @if($errors->has('nameRole'))
                            <div class="error" style="color:red">{{ $errors->first('nameRole') }}</div>
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

    <div class="modal fade" id="joinrolesperms">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">ربط </h4>
              <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            


            <div class="modal-body">
              
            <label for="sel" class="float-end">الدور</label>
            <select class="form-select" size="3" name="selectt" aria-label="size 3 select example" id="selectRole">
              @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option> 
              @endforeach
            </select>  
              
            </div>

            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
            <button type="button" id="btnrole" class="btn btn-primary" onclick="
            var ty = document.getElementById('selectRole').vlaue;
            " data-toggle="modal" data-target="#joinperms" data-dismiss="modal">
                {{ __('موافق') }}
              </button>
            
            </div>
            
          </div>
        </div>
    </div>
    




<h1 class="text-center my-4 h1 ">أسماء الطلاب </h1>
<div class="row">
@can('addStudent', [$club->id , ''])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addstudent">
        إضافة طالب
      </button>
  </div>
  @endcan
  @can('addRoles', [$club->id , ''])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addroles">
        إضافة دور جديد
      </button>
  </div>
  @endcan
  
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#joinrolesperms">
        ربط الأدوار بالصلاحيات
      </button>
  </div>
  
  @can('delColor', [$club->id , ''])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#delcolor">
       حذف الشعبة
      </button>
  </div>
  @endcan
  @can('addTeNew', [$club->id , ''])
  <div class="col-lg col-sm-4 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addte-new">
       إضافة مشرف جديد
      </button>
  </div>
  @endcan
  @can('addTeOld', [$club->id , ''])
  <div class="col-lg col-sm-5 col-xs-6">
    <button type="button" class="btn btn-primary float-end mb-4" data-toggle="modal" data-target="#addte-old">
     إضافة مشرف قديم
      </button>
  </div>
  @endcan
  @can('delTe' , [$club->id , ''])
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
      @foreach ($users as $user)
      
      <tr>
          <td>{{ $i }}</td>
          <td>{{ $user->name }}</td>
          <td>{{$user->email}}</td>
          
          <td>
            @can ('addRole' , [$club->id , ''])
              <form action="{{ route('user.role', [$user->id , $club->id]) }}"
              method="post" 
              autocomplete="off"
              enctype="multipart/form-data">
                @csrf
                <input type="button" class="btn btn-primary ooi" value="add role" data-toggle="modal" data-target="#os" onclick="document.getElementById('sddd').action = '{{ route('user.role', [$user->id , $club->id]) }}' ">
              </form>
            @endcan
          </td>
          

      </tr>
      <?php $i += 1; ?>

      @endforeach

      </form>
      </tbody>
    </table>
</div>
@endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

</script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script>
 
  $('btnrole').click(function(){
    var ty = document.getElementById('selectRole').vlaue;
    document.getElementById('joinpermsform').action = '{{ route("role.joinperms" , ' + ty + ') }}';
  });
</script>

</body>

</html>
