<?php

use App\Models\User;
use App\Service\FileService;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;

$op = 0;
foreach ($colors as $color) {
  $op += 1;
}
$x = $op % 3;


?>



<html>

<head>
  <meta charset="UTF-8">
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
  <title>{{ $club->name }}</title>


  <style>
    @font-face {
  font-family: 'FF Yaseer';
  font-style: normal;
  font-weight: 400;
  src: url("{{ asset('css/FFYaseer.Regular.otf') }}") !important;
}

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .sd {
      background-image: url('gfd.jpg');
    }

    .bg-purple {
      background-color: purple;
    }

    div a img {
      display: none !important;
    }

    /* GLOBAL STYLES
-------------------------------------------------- */
    /* Padding below the footer and lighter body text */
    

    body {
      padding-top: 3rem;
      padding-bottom: 3rem;
      color: #5a5a5a;
      font-family: FF Yaseer;
    }


    /* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 4rem;
    }

    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
      bottom: 3rem;
      z-index: 10;
    }

    /* Declare heights because of positioning of img element */
    .carousel-item {
      height: 32rem;
    }

    .carousel-item>img {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      height: 32rem;
    }


    /* MARKETING CONTENT
-------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .col-lg-4 {
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .marketing h2 {
      font-weight: 400;
    }

    .marketing .col-lg-4 p {
      margin-right: .75rem;
      margin-left: .75rem;
    }


    /* Featurettes
------------------------- */

    .featurette-divider {
      margin: 5rem 0;
      /* Space out the Bootstrap <hr> more */
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-weight: 300;
      line-height: 1;
    }


    /* RESPONSIVE CSS
-------------------------------------------------- */

    @media (min-width: 40em) {

      /* Bump up size of carousel content */
      .carousel-caption p {
        margin-bottom: 1.25rem;
        font-size: 1.25rem;
        line-height: 1.4;
      }

      .featurette-heading {
        font-size: 50px;
      }
    }

    @media (min-width: 62em) {
      .featurette-heading {
        margin-top: 7rem;
      }
    }
    
    .btn-secondary:hover {
      background-color: #6c757d !important;
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

    .btn-primary {
      background-color: white;
      color: black;
      margin-left: 2px;
      margin-bottom: 5px;
      transition-duration: 0.7s;
      box-shadow: 4px 3px 10px 0px #afafaf;
      border: #127df1 outset;
    }

    .btn-secondary {
      margin-left: 2px;
      margin-bottom: 5px;
      transition-duration: 0.7s;
      box-shadow: 4px 3px 10px 0px #afafaf;
    }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/FFYaseer.Regular.otf') }}" rel="stylesheet">
</head>

<body>
  
  <input type="button" value="Go back" onclick="history.back()" class="btn btn-secondary" style="position: fixed;bottom : 10%; left: 10%;">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">
      <div class="container-fluid">

        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="تبديل التنقل">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
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
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <a href="{{ url('/home') }}" class="dropdown-item">Home</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf

                </form>
              </div>
            </li>
            @endguest
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            @auth
            @can('addColor' , [$club->id , ''])
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#addcolor">إضافة شعبة</a>
            </li>
            @endcan
            @can('delSchool' , [$club->id , ''])
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#delclub">حذف المدرسة</a>
            </li>
            @endcan
            @can('delTeClub' , [$club->id , ''])
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#delte">حذف المشرفين</a>
            </li>
            @endcan
            @can ('dashboard' , [$club->id , '']) 
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('dash.index' , $club->id) }}">لوحة التحكم</a>
              </li>
            @endcan
            @endauth
            @foreach ($colors as $color)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('student.index', $color->pivot->id ) }}">{{ $color->name }}</a>
            </li>
            @endforeach
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">الصفحة الرئيسية</a>
            </li>
            <a class="navbar-brand" href="{{ route('club.index') }}">موقع التميز</a>

          </ul>


        </div>
      </div>
    </nav>
  </header>

  <main>

    
    @can('delSchool' , [$club->id , ''])
    <div class="modal fade" id="delclub">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">أنت على وشك حذف المدرسة</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h4>هل أنت متأكد أنك تريد حذف هذا المدرسة ؟</h4>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">غير موافق</button>
            <form action="{{ route('club.del', $club->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
              @csrf
              <button type="submit" class="btn btn-primary float-start" value="موافق">موافق</button>
            </form>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endcan
    @can('addColor' , [$club->id , ''])
    <div class="modal fade" id="addcolor">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">إضافة شعبة</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form method="post" action="{{ route('color.store' , $club->id) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name" class="float-end">اسم الشعبة</label>
                <input type="text" name="name" required value="{{ old('name') }}" placeholder="اسم الشعبة" class="form-control" id="name">
                @if($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
                @endif
              </div>


              <div class="form-group">
                <label for="code" class="float-end">اللون</label>
                <input type="color" name="code" required value="{{ old('code') }}" placeholder="#afafaf" class="form-control" id="code">
                @if($errors->has('code'))
                <span style="color: red;">{{ $errors->first('code') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label for="img" class="float-end">الصورة :</label>
                <input type="file" name="image" class="form-control" required id="img" value="{{ old('image') }}">
                @if($errors->has('image'))
                <span style="color: red;">{{ $errors->first('image') }}</span>
                @endif
              </div>

          </div>


          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary float-end">
              {{ __('موافق') }}
            </button>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endcan
    @can('delTeClub' , [$club->id , ''])
    <div class="modal fade" id="delte">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">حذف مشرف</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" 
             action="{{ route('color.del.te' , $club->id) }}"
                    autocomplete="off"
                    enctype="multipart/form-data">
              @csrf
          <!-- Modal body -->
          <div class="modal-body">
            <label for="sel">اختر المشرف الذي تريد حذفه </label>
            <select class="form-select" size="3" name="selectt" aria-label="size 3 select example" id="sel">
              
            @for($i = 0 ; $i < count($usersclubid) ; $i = $i + 3)
                <?php
                $userq = User::findOrFail($usersclubid[$i + 2]);
                $user = Auth::user();
                $rol = FileService::rol($userq , $club->id , $color = '');
                $rolu = FileService::rol($user , $club->id , $color = '');
                $permsu = $rolu->map->perms->flatten()->pluck('perm')->unique();
                $permsq = $rol->map->perms->flatten()->pluck('perm')->unique();
                ?>
                @if($user->id != $club->user_id)
                  @if($rolu->contains('role','adminer'))
                    @if(!$rol->contains('role','adminer'))
                      <option value="{{ $usersclubid[$i] }}">{{ $usersclubid[$i + 1] }}</option>
                    @endif
                  @else
                    @if(!$permsq->contains('delTeClub'))
                      <option value="{{ $usersclubid[$i] }}">{{ $usersclubid[$i + 1] }}</option>
                    @endif
                  @endif
                @else
                  @if($usersclubid[$i + 2] != $admin)
                    <option value="{{ $usersclubid[$i] }}">{{ $usersclubid[$i + 1] }}</option>
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
    
    
    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing mt-5">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php $i = 1;
        if ($x == 2) {
          foreach ($colors as $color) :
            if ($op - 1 != $i) {
        ?>
              <div class="col-lg-4">
                <img src='{{ "/storage/{$color->image}" }}' style="width: 140px;
      height: 140px;
      margin : 0 auto;
      border-radius: 100%;
      background-repeat: no-repeat;
      background-size: 100% 100%;" />
                <h2 style="color : {{$color->code}} ">{{ $color->name }}</h2>
                <p><a class="btn btn-secondary" style="background-color : {{$color->code}} " href="{{ route('student.index', $color->pivot->id ) }}">دخول</a></p>
              </div>
            <?php
            } else { ?>
              <div class="col-lg-4 offset-md-2 fgfg">
                <img src='{{ "/storage/{$color->image}" }}' style="width: 140px;
      height: 140px;
      margin : 0 auto;
      border-radius: 100%;
      background-repeat: no-repeat;
      background-size: 100% 100%;" />
                <h2 style="color : {{$color->code}} ">{{ $color->name }}</h2>
                <p><a class="btn btn-secondary" style="background-color : {{$color->code}} " href="{{ route('student.index', $color->pivot->id  ) }}">دخول</a></p>
              </div>
            <?php }
            $i += 1;
          endforeach;
        } elseif ($x == 0) {
          foreach ($colors as $color) :
            ?>
            <div class="col-lg-4">
              <img src='{{ "/storage/{$color->image}" }}' style="width: 140px;
      height: 140px;
      margin : 0 auto;
      border-radius: 100%;
      background-repeat: no-repeat;
      background-size: 100% 100%;" />
              <h2 style="color : {{$color->code}} ">{{ $color->name }}</h2>
              <p><a class="btn btn-secondary" style="background-color : {{$color->code}} " href="{{ route('student.index', $color->pivot->id  ) }}">دخول</a></p>
            </div>
            <?php
          endforeach;
        } elseif ($x == 1) {
          foreach ($colors as $color) :
            if ($op != $i) { ?>
              <div class="col-lg-4">
                <img src='{{ "/storage/{$color->image}" }}' style="width: 140px;
      height: 140px;
      margin : 0 auto;
      border-radius: 100%;
      background-repeat: no-repeat;
      background-size: 100% 100%;" />
                <h2 style="color : {{$color->code}} ">{{ $color->name }}</h2>
                <p><a class="btn btn-secondary" style="background-color : {{$color->code}} " href="{{ route('student.index', $color->pivot->id  ) }}">دخول</a></p>
              </div>
            <?php
            } else { ?>
              <div class="col-lg-4" style="margin : 0 auto;">
                <img src='{{ "/storage/{$color->image}" }}' style="width: 140px;
      height: 140px;
      margin : 0 auto;
      border-radius: 100%;
      background-repeat: no-repeat;
      background-size: 100% 100%;" />
                <h2 style="color : {{$color->code}} ">{{ $color->name }}</h2>
                <p><a class="btn btn-secondary" style="background-color : {{$color->code}} " href="{{ route('student.index', $color->pivot->id   ) }}">دخول</a></p>
              </div>
        <?php  }
            $i += 1;
          endforeach;
        } ?>
      </div><!-- /.row -->



              @if($errors->has('image'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr File!</strong> {{ $errors->first('image') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif

              @if($errors->has('code'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important;
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Color!</strong> {{ $errors->first('code') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- <script>
                  document.getElementById('addcolor').classList += " show";
                  document.getElementById('addcolor').setAttribute("aria-modal","true");
                  document.getElementById('addcolor').setAttribute("style","display:block");
                  document.getElementById('addcolor').setAttribute("role","dialog");
                  document.body.setAttribute("class","modal-open");
                </script> -->
              @endif

              @if($errors->has('name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important;
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr Name!</strong> {{ $errors->first('name') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- <script>
                  document.getElementById('addcolor').classList += " show";
                  document.getElementById('addcolor').setAttribute("aria-modal","true");
                  document.getElementById('addcolor').setAttribute("style","display:block");
                  document.getElementById('addcolor').setAttribute("role","dialog");
                  document.body.setAttribute("class","modal-open");
                </script> -->
              @endif
    </div>


  </main>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>