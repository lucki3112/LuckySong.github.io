@extends('main.root')
@section('main_root')
<div class="myform">
    <h4>Admin Login Here</h4><br>
    <form action="{{route('admin_login')}}" method="POST">
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
          <label for="">Password</label>
          <input type="password" class="form-control" name="pwd" id="" placeholder="" value="{{old('pwd')}}">
          <span class="text-danger">@error('pwd') {{$message}} @enderror</span>
        </div>
        <button class="btn btn-primary">LogIn</button>
    </form><br>
</div>
@endsection