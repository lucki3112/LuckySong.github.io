<form action="" enctype="multipart/form-data" method="POST">
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