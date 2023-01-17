@extends('main.root')
@section('main_root')
<div class="profile" style="padding-top: 83px; padding-bottom:83px">
          
            <div class="profile_name" style="text-align: center;padding-top:23px; font-size:34px; font-family:cursive">
            {{$data->name}}
          </div>
          <div class="profile_email" style="text-align: center;padding-top:23px; font-size:34px; font-family:cursive">
           Email : {{$data->email}}
          </div>
          <div class="profile_logout" style="text-align: center;padding-top:23px; font-size:34px; font-family:cursive">
          <a href="{{route('client.logout')}}"><button class="btn btn-danger">LogOut</button></a>
          </div>
          </div>  
</div>

@endsection