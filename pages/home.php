<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img height="580px" class="d-block w-100" src="img/l1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="margin-top: -300px;">Welcome to MyLibrary</h1>
                    <p class="fs-3"><?= $_SESSION["session"] ?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="580px" class="d-block w-100" src="img/l2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="margin-top: -300px;">Welcome to MyLibrary</h1>
                    <p class="fs-3"><?= $_SESSION["session"] ?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="580px" class="d-block w-100" src="img/l3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="margin-top: -300px;">Welcome to MyLibrary</h1>
                    <p class="fs-3"><?= $_SESSION["session"] ?></p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>

        </a>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>