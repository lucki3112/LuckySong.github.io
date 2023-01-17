@extends('main.root')
@section('main_root')
<div class="admin" style="padding-top: 83px; padding-bottom:83px;">
<div class="sidenav" style=" background-color:aqua">
<div class="profile_pic">

</div>
<div class="name" style="font-size:24px; font-family:cursive; padding-top:34px;">
    <b>{{$admin->name}}</b>
</div>
<div class="email" style="font-size:24px; font-family:cursive; padding-top:34px;">
    <b>Email : {{$admin->email}}</b>
</div>
<div class="changePassword" style="cursor:pointer;font-size:24px; font-family:cursive; padding-top:34px;">
<b>Change Password</b>
</div>
<div class="add_song" name="add_song" style="cursor:pointer;font-size:24px; font-family:cursive; padding-top:34px;">
<b>Add song</b>
</div>
<div class="all_clients" style="cursor:pointer;font-size:24px; font-family:cursive; padding-top:34px;">
   <b>Clients</b>
</div>
<div class="logout" style="font-size:24px; font-family:cursive; padding-top:34px;">
<a href="{{route('admin_logout')}}"><button class="btn btn-danger">LogOut</button></a>
</div>
</div>
<div class="content">
<form action="{{route('song.register')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div> <br>
        <div class="form-group">
          <label for="">image</label>
          <input type="file" class="form-control-file" name="img" id="" placeholder="" aria-describedby="fileHelpId">
        </div>  <br>     
        <div class="form-group">
          <label for="">song path</label>
          <input type="file" class="form-control-file" name="path" id="" placeholder="" aria-describedby="fileHelpId">
        </div> <br>   
        <button class="btn btn-primary">submit</button> 
    </form>
</div>
</div>
@endsection
