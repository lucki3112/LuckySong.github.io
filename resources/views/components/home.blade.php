@extends('main.root')
@section('main_root')
<div class="container" style="background-color:bisque">
    <div class="search">
        <form class="d-flex" role="search" method="POST" action="{{route('search_home')}}">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 223px;" name="search" value="{{old('search')}}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form><br>
     <a href="{{route('home')}}"> <button class="btn btn-outline-primary" type="submit">Reset</button></a>  
    </div>
    <div class="songs" >
        <div class="song_list">
                @foreach ($table as $t)
                <ul style="padding-bottom: 63px;">
                    <li>
                        <ul style="border: 2px solid black; border-radius:20px;background-color: black;">
                            <li><img src="{{asset($t->song_image)}}" alt="" height="53" width="53"></li>
                            <li style="color: white;font-family:cursive">{{$t->song_name}}</li>
                            <li><a href="{{route('song_play',$t->id)}}"><i class="fa fa-play" style="font-size:48px;color:white"></i></a></li>
                         </ul>
                    </li>
                </ul>
                @endforeach
        </div>
    </div>
</div>

@endsection
