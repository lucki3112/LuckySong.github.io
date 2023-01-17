@extends('main.root')
@section('main_root')
<div class="myform">
<h4>Create your account</h4><br>
    <form action="{{route('client.store')}}" method="POST">
      @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif
      @csrf
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="" value="{{old('email')}}">
          <span class="text-danger">@error('email') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <label for="">Full Name</label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{old('name')}}">
          <span class="text-danger">@error('name') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="pwd" id="" placeholder="" value="{{old('pwd')}}">
          <span class="text-danger">@error('pwd') {{$message}} @enderror</span>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form><br>
    <a href="{{route('login')}}">Already register !! Login here</a><br>
    <a href="" class="btn facebook-button" style="color: white;">Login with facebook</a>
</div>
@endsection