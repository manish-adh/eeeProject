<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <h1 class=" card-header text-center">Add Banner</h1><br><br>

    <div class="container">
    <form class="row g-3 " action="{{url('store/banner')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  required>

          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Start_date</label>
            <input type="date" class="form-control" name="Start_date"  required>

          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">End_date</label>
            <input type="date" class="form-control" name="End_date"  required>

          </div>
         
          <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Image</label>
            <input type="file" class="form-control"  name="image" required>

          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Url</label>
            <input type="url" class="form-control" name="url"  required>

          </div>
         

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
         
      </form>
    </div>


     {{-- script --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
