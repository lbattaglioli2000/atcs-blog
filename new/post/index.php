<?php
    include_once '../../dbconfig.php';

    if(!isset($_SESSION['user_session'])){
      return $user->redirect('/login.php?redirectUrl=/new/post');
    }

    if(!empty($_POST['save'])){
        $title = trim($_POST['title']);
        $post = trim($_POST['user_posting']);
        $user->make_post($title, $post, $_SESSION['user_session']);
        $saved = true;
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="logo.png" sizes="x20">
    <title>New Blog Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=m3idcja8q9qgeygqd9671z3dsefu787srq3ogn4ii5cmyd1p"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/">The Blog</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <?php
          if(isset($_SESSION['user_session'])) {
              echo('<a class="btn btn-sm btn-outline-secondary" href="home.php" style="margin:2.5px;">Home</a>');
          }
          else {
            echo('<a class="btn btn-sm btn-outline-secondary" href="sign-up.php" style="margin:2.5px;">Sign up</a>
            <a class="btn btn-sm btn-outline-secondary" href="login.php" style="margin:2.5px;">Log in</a>');
          }
        ?>


      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    </nav>
  </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

      <?php if ($saved): ?>
        <div class="alert alert-success">
          Your post was posted via the POST method!!
        </div>
      <?php endif; ?>

      <h1>New Post</h1>

      <hr>

      <form method='post'>

        <label for="title">Post Title</label>
        <input type="text" class="form-control" name='title' id='title' placeholder = "Title of Post"/>

        <br>

        <label for="title">Post Body</label>
        <textarea name="user_posting">Write you post here!</textarea>

        <br>

        <button class="btn btn-lg btn-outline-primary" type = 'submit' name = 'save' id = 'save' value = '1' >Post your post!</button>

        <br>
        <br>

      </form>


    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="p-3">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">March</a></li>
          <li><a href="#">February</a></li>
          <li><a href="#">January</a></li>
          <li><a href="#">December</a></li>
          <li><a href="#">November</a></li>
          <li><a href="#">October</a></li>
          <li><a href="#">September</a></li>
          <li><a href="#">August</a></li>
          <li><a href="#">July</a></li>
          <li><a href="#">June</a></li>
          <li><a href="#">May</a></li>
          <li><a href="#">April</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script></body>
</html>
