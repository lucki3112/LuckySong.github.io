@extends('main.root')
@section('main_root')
<div class="lk" style="padding-top: 83px; background-image: url('https://c4.wallpaperflare.com/wallpaper/949/555/749/abstract-huawei-lights-neon-hd-wallpaper-preview.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
<div class="song_details">
    <ul>
        @if (session()->has('loginid') && !session()->has('adminId'))
        <a href="{{asset($song->song_path)}}"><button class="btn btn-success">Download</button></a>
        @endif
        @if (!session()->has('loginid') && !session()->has('adminId'))
            <a href="{{route('client.login')}}"><button class="btn btn-success">Download</button></a>
        @endif
        <li style="text-align: center;">
            <img src="{{asset($song->song_image)}}" alt="" height="376" width="376" style="border-radius:43px;">
        </li>
        <li style="font-family: cursive;font-size: 24px; color:white">
            {{$song->song_name}}  <img src="{{asset('music gif/884a408310b28171aa1018f77dee2602.gif')}}" alt="" height="43" width="123" style="border-radius: 23px;" id="gif">
        </li>
    </ul>
</div>
<div class="logo">
<input type="range" name="range" id="myProgressBar" min="0" max="100" value="0" style="width: 923px;"><br>
<i class="fa fa-fast-backward" style="font-size:38px;color:white" id="backword"></i>
<i class="fa fa-play-circle" style="font-size:38px;color:white" id="play"></i>
<i class="fa fa-pause-circle-o" style="font-size:38px;color:white" id="pause" ></i>
<i class="fa fa-fast-forward" style="font-size:38px;color:white" id="forward"></i>

</div>
</div>
<script>
    let song=new Audio('{{asset($song->song_path)}}');
    song.addEventListener('timeupdate',()=>{
        progress=parseInt((song.currentTime/song.duration)*100);
        myProgressBar.value=progress;
    });
    myProgressBar.addEventListener('change',()=>{
        song.currentTime=((myProgressBar.value*song.duration)/100);
    });
   
    $(document).ready(function(){
        $('#gif').hide();
        $('#pause').hide();
        $('#play').on('click',function(){
            $('#play').hide();
            $('#pause').show();
            song.play();
            $('#gif').show();
        });
        $('#pause').on('click',function(){
            $('#play').show();
            $('#pause').hide();
            song.pause();
            $('#gif').hide();
        });
       $('#forward').on('click',function(){
       song.currentTime+=10;
       });
       $('#backword').on('click',function(){
        song.currentTime-=10;
       });
    });
</script>
@endsection