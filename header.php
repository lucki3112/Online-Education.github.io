<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>home</title>
    <link rel="stylesheet" href="home.css">
  </head>
  <body class="p-3 m-0 border-0 bd-example"  style="background-image: url('https://c4.wallpaperflare.com/wallpaper/756/935/826/5bd2e471044fa-wallpaper-preview.jpg');background-repeat: no-repeat;background-size: 100% 100%;"> 
    <h1>Online Courses</h1>
<nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="signUp.php">SignUp</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php">Login</a>
                    </li>
                    <li>
                        <form class="d-flex" role="search" id="search_form">
                            <input class="form-control me-2" type="search" id="search" placeholder="Search your course" aria-label="search" style="height: 33px;">
                            <button class="btn btn-outline-success" id="search_btn">Search</button>
                          </form>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
          <div id="modal">
        <div id="modal-box">
        <div id="close-btn">X</div>
            <span id="open">

            </span>
            <a href="login.php"><button class="btn btn-primary">Ok</button></a>
        </div>
    </div>
          <script>
            $(document).ready(function(){
              $('#search').on('keyup',function(){
                var search_term=$(this).val();
                $.ajax({
                  url: "search.php",
                  type: "post",
                  data: {search: search_term},
                  success: function(data){
                    $('.content').html(data);
                  }
                });
              });
              $(document).on('click','#buy',function(){
                $('#modal').show();
                $('#modal-box #open').html('<h2>Before Buying this course, You Should be login your account</h2>');
              });
              $('#close-btn').on('click',function(){
                $('#modal').hide();
              });
            });
          </script>