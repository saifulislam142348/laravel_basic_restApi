<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>user Information</title>
</head>

<body>
  <div class="container">
    <div class="jumbotron bg-danger">
      <h1>user info</h1>


      <h2>information form</h2>
      <form action="" method="" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="name" placeholder="your name">
        <select class="form-select" name="catagory" id="">

        @foreach($catagory as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
          
          
        </select>
        <select name="subcategory" class="form-select"  id="">
        <option value="">select</option>
        </select>
        <input class="btn btn-success" type="submit" value="save">
      </form>
    </div>
  </div>

  <!-- form -->


  <!-- form end -->


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
     $('select[name="catagory"]').on('change', function(e){
      console.log(e);
      var catId = e.target.value;
      $.get('/ajax?catId='+catId,function(data){
        $('select[name="subcatagory"]').empty();
        $.each(data, function(index,subcat){
          $('select[name="subcatagory"]').append('<option value="'+subcat.id+'">'+subcat.name+'</option>');
        });

      });

     });
    });
  </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>