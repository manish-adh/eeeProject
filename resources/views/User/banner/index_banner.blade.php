<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<h1 class=" card-header text-center">Banner List</h1><br><br>
<div class="container "><a href="{{'add/banner'}}" class="btn btn-primary">Add Banner</a>
  <a href="{{'/'}}" class="btn btn-primary">Home</a><br> <br>

    @if (session('success'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">

        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card  container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S.N</th>
                <th scope="col">Name Id</th>
                <th scope="col">Start_date</th>
                <th scope="col">End_date</th>
                <th scope="col">Image</th>
                <th scope="col">Url</th>



              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->Start_date}}</td>
                <td>{{$item->End_date}}</td>
                
                <td><img src="{{ asset('images/BannerImages/') }}/{{$item->Image}} "height="70px"; width="70px" alt=""></td>
                <td>{{$item->url}}</td>
                
                <td> <a  href="{{"edit/banner/".$item->id}}" class="btn btn-dark">EDIT</a>
                  <a href="{{"delete/banner/".$item->id}}" class="btn btn-danger">DELETE</a>
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
    </div>
</div>

     {{-- script --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
