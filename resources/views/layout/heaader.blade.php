<!doctype html>
<html lang="en">

<head>
  <title>LuckySong</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="position:fixed;width:100%">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}"> <img src="{{asset('app_logo/app_logo.png')}}" alt="" height="43px" width="43px"> </a>
      <a class="nav-link active" aria-current="page" href="{{route('home')}}"><span class="title"><b>LuckySong</b></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            @if (!session()->has('loginid') && !session()->has('adminId'))
            <a href="{{route('client.login')}}">LogIn</a>
            @endif
            @if (session()->has('loginid'))
            <a href="{{route('client.logout')}}">LogOut</a>
            @endif
            @if (session()->has('adminId'))
            <a href="{{route('admin_logout')}}">LogOut</a>
            @endif
          </li>
          <li class="nav-item">
          @if (session()->has('loginid'))
          <a href="{{route('client.dashboard')}}"><i class="fa fa-user" aria-hidden="true" style="color: white">  Profile</i></a>
          @endif
          </li>
          <li class="nav-item">
            @if (!session()->has('loginid') && !session()->has('adminId'))
            <a href="{{route('admin')}}"><i class="fa fa-user-secret" aria-hidden="true"> Admin</i></a>
            @endif
          </li>
          <li>
          @if (session()->has('adminId'))
          <a href="{{route('profile')}}"><i class="fa fa-user" aria-hidden="true" style="color: white">  Profile</i></a>
          @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
  