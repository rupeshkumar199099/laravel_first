<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>CRUD WEBAPP</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contactUs') }}">Show Contact Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('addImage') }}">Add Image</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('show-image') }}">Show Gallery</a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <a href="{{ route('contactUs', ['search' => 'kk']) }}"><button class="btn btn-outline-success" type="submit">Search</button></a>
            </form>
          </div>
        </div>
      </nav>
      <style>
        .carousel-item img{
          height: 600px !important;
        }
      </style>
     <div class="container-fluid">
     <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="http://127.0.0.1:8000/storage/Gallery/aNHwF8skkuHzBJfJovlNjMJB55wqDlkksERMzz9V.jpg" height="600px" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://127.0.0.1:8000/storage/Gallery/W8IuwBpSNeDLZW8GJ6pdkbUycK0ETypVtXrtwhBj.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://127.0.0.1:8000/storage/Gallery/yRYKlHgvthDMFYgy2qihxZYlKyZvG8R6OUFxgYqG.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</body>
</html>