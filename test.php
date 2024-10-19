<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        a{
            text-decoration: none;
        }
        input{
            padding-right: 40px;
            margin-right: 20px;
        }
    </style>

</head>
  <body>
    <div class="container">
        <form action="" class="form">
            <label for=""> Firstname</label>
            <input type="text" class="form-control">
            <label for=""> Second Name</label>
            <input type="text" class="form-control">
            <label for=""> Email</label>
            <input type="email" class="form-control">
        </form>
        <div class="container justify-content-center align-items-center">
            <button class="btn btn-primary mt-3 mr-2"><a href="" class="text-light">Login</a></button>
            <button class="btn btn-success mt-3 mr-2"><a href="" class="text-light">Sign In</a></button>
            <button class="btn btn-danger mt-3 ml-2"><a href="" class="text-light">Forgot Password</a></button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>