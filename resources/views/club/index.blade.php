<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;
$oi = 0;
$op = 1;
$c = 0;
$dd = 0;
foreach ($clubs as $club) {
  $c += 1;
}

?>

<html>

<head>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel-rtl/">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.rtl.css">


  <style>
    /* GLOBAL STYLES
-------------------------------------------------- */
    /* Padding below the footer and lighter body text */
    @font-face {
  font-family: 'FF Yaseer';
  font-style: normal;
  font-weight: 400;
  src: url("{{ asset('css/FFYaseer.Regular.otf') }}") !important;
}

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

      .featurette-heading {
        font-size: 50px;
      }
    }

    @media (min-width: 62em) {
      .featurette-heading {
        margin-top: 7rem;
      }
    }

    .blue {
      color: blue;

    }

    .blue1 {
      background-color: blue;
    }

    .red {
      color: red;
    }

    .red1 {
      background-color: red;
    }

    .green {
      color: green;
    }

    .green1 {
      background-color: green;
    }

    .foshe {
      color: #ff006a;
    }

    .foshe1 {
      background-color: #ff006a;
    }

    .orange {
      color: orange;
    }

    .orange1 {
      background-color: orange;
    }

    .purple {
      color: purple;
    }

    .purple1 {
      background-color: purple;
    }

    .pink {
      color: #ff8fa2;
    }

    .pink1 {
      background-color: #ff8fa2;
    }

    .yellow {
      color: yellow;
    }

    .yellow1 {
      background-color: yellow;
    }

    .gold {
      color: gold;
    }

    .gold1 {
      background-color: gold;
    }

    .silver {
      color: silver;
    }

    .silver1 {
      background-color: silver;
    }

    #div1 {
      background-image: url();
      background-repeat: no-repeat;
      background-size: 100% auto;
    }

    #div2 {
      background-image: url("images/club alyuongs.jpg");
      background-repeat: no-repeat;
      background-size: 100% auto;
    }

    .img-circle {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/class-club-morning.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-circle1 {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/club-alyuongs.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-circle2 {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/class-club-night.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-red {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/red.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-blue {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/blue.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-green {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/green.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-pink {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/pink.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    img[alt~="rwqrqw"] {
      color: yellow;
      
    }
    .img-silver {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/silver.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-yellow {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/yellow.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-foshe {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/foshe.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-orange {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/orange.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-purple {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/purple.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .img-gold {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/gold.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    div a img {
      display: none !important;
    }

    

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .img-circle3 {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border-radius: 100%;
      background-image: url("images/atruja.jpeg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .offset-2 {
      margin-left: 16.6666666667%;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    @media(min-width : 786px) {
      .col-lg-4 {
        flex: 0 0 auto;
        width: 33.33333%;
      }

      .offset-md-2 {
        margin-left: 8.3333333333%;

      }

      .offset-md-1 {
        margin-right: -16.6666666667%;
      }
    }

    .bg-purple {
      background-color: purple;
    }

    .mb-5 {
      margin-bottom: 6rem !important;
    }

    @media (max-width: 527px) {
      .carousel-inner {
        height: 200px;
      }
    }

    .btn-secondary:hover {
      background-color: orange;
    }

    div a img {
      display: none !important;
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
      box-shadow: 0 2px 4px 0 black;
    }
  </style>
  <title>موقع التميز</title>

  <link href="./carousel.rtl.css" rel="stylesheet">
  <link href="{{ asset('css/FFYaseer.Regular.otf') }}" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="تبديل التنقل">
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

            @if (Route::has('regisdter'))
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
                <a class="dropdown-item text-left" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <a href="{{ url('/home') }}" class="dropdown-item text-left">Home</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf

                </form>
              </div>
            </li>
            @endguest
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            @auth
            @can ('add-school')
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#" data-toggle="modal" data-target="#addclub">إضافة نادي</a>
            </li>
            @endcan
            @can ('admin?')
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('dash.index') }}">لوحة التحكم</a>
            </li>
            @endcan
            

            @endauth
            @foreach ($clubs as $club)

            <li class="nav-item">
              <a class="nav-link" href="{{ route('color.index', $club->id ) }}">{{ $club->name }}</a>
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

    @auth
    <div class="modal fade" id="addclub">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">إضافة مدرسة</h4>
            <button type="button" class="bg-white border-0 fs-2" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form method="post" action="{{ route('club.store', Auth::user()->id ) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name" class="float-end">اسم المدرسة :\</label>
                <input type="text" name="name" required value="{{ old('name') }}" placeholder="اسم المدرسة" class="form-control" id="name">
                @if($errors->has('name'))
                <div class="error" style="color:red">{{ $errors->first('name') }}</div>
                @endif
              </div>


              <div class="form-group">
                <label for="img" class="float-end">الصورة :</label>
                <input type="file" name="image" id="img" class="form-control">
                @if($errors->has('image'))
                <div class="error" style="color:red">{{ $errors->first('image') }}</div>
                @endif
              </div>

          </div>


          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary float-start">
              {{ __('موافق') }}
            </button>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endauth
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        @foreach ($clubs as $club)
        <?php if ($oi == 0) { ?>
          <button type="button" data-bs-target="#myCarousel" class="active" data-bs-slide-to="{{$oi}}" aria-current="true" aria-label="Slide {{$oi+1}}"></button>
        <?php } else { ?>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$oi}}" aria-label="Slide {{$oi+1}}"></button>
        <?php } ?>
        <?php $oi += 1; ?>
        @endforeach
      </div>
      <div class="carousel-inner">
        <!--<div class="carousel-item active">
        <div class="container">
          <div class="carousel-caption mb-5" style="color : red;">

          </div>
        </div>
      </div>-->
        @foreach ($clubs as $club)

        <?php if ($dd == 0) { ?>
          <img src='{{ "/storage/{$club->image}" }}' style="width: 100%;
  

  margin : 0 auto;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-color : red;" class="carousel-item active" />

        <?php $dd = 1;
        } else { ?>
          <img src='{{ "/storage/{$club->image}" }}' style="

           width: 100%;
  
  margin : 0 auto;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-color : red;" class="carousel-item" />
        <?php } ?>
        @endforeach

      </div>


      <button class="carousel-control-prev" style="left:auto !important;" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">السابق</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">التالي</span>
      </button>
    </div>


    <div class="container marketing">
      <div class="row">
        <?php foreach ($clubs as $club) :
          if ($op % 2 == 1) {
            if ($op != $c) { ?>
              <div class="col-lg-4 offset-md-2">
                <img src='' style=" width: 140px;
  height : 140px;
  margin : 0 auto;
  border-radius : 100%;
  background-repeat : no-repeat;
  background-size : 100% 100%;
  background-color : red " alt=" {{ $club->name }} " />

                <h2 class="purple">{{ $club->name }}</h2>
                <p class=" purple"><a class="btn btn-secondary bg-purple" href="{{ route('color.index', $club->id ) }}">دخول</a></p>
              </div>
            <?php } else { ?>
              <div class="col-lg-4" style=" margin : 0 auto;">
                <img src="{{ url('/storage/images/'. $club->image) }}" style="width: 140px;
  height: 140px;
  margin : 0 auto;
  border-radius: 100%;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-color : red;" alt="{{ $club->name }}" />

                <h2 class="purple">{{ $club->name }}</h2>
                <p class=" purple"><a class="btn btn-secondary bg-purple" href="{{ route('color.index', $club->id ) }}">دخول</a></p>
              </div>
            <?php }
          } else { ?>

            <div class="col-lg-4">
              <img src='{{ asset('css/app.css') }}' style="width: 140px;
  height: 140px;
  margin : 0 auto;
  border-radius: 100%;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-color : red;" alt=" {{ $club->name }} " />

              <h2 class="purple">{{ $club->name }}</h2>
              <p class=" purple"><a class="btn btn-secondary bg-purple" href="{{ route('color.index', $club->id ) }}">دخول</a></p>
            </div>
        <?php }
          $op += 1;

        endforeach; ?>
      </div>
              @if($errors->has('image'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr File!</strong> {{ $errors->first('image') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              @if($errors->has('name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: #842029 !important; 
                    background-color: #f8d7da !important;
                    border-color: #f5c2c7 !important; 
                    ">
                  <strong>Erorr File!</strong> {{ $errors->first('name') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              @endif
              
    </div>
  </main>
</body>

</html>