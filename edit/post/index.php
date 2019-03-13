<?php
    include_once '../../dbconfig.php';

    if(!isset($_SESSION['user_session'])){
      return $user->redirect('/login.php?redirectUrl=/edit/post?id=' . $_GET['id']);
    }

    if(!isset($_GET['id'])){
      echo "You didn't specify a Post ID.";
      exit;
    }

    if(!empty($_POST['save'])){
        echo "put in db duh";
        $title = trim($_POST['title']);
        $post = trim($_POST['user_posting']);
        $user->make_post($title, $post, $_SESSION['user_session']);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editing Blog Post: TITLE</title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=m3idcja8q9qgeygqd9671z3dsefu787srq3ogn4ii5cmyd1p"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
    <form method='post'>
    <input type="text" name='title' id='title' placeholder = "Title of Post"/>
    <textarea name="user_posting">Write a blog</textarea>
    <div class="left">
        <button type = 'submit' name = 'save' id = 'save' value = '1' >POST!</button>
    </div>
    </form>
    <div class="right">
        <a class="btn btn-sm btn-outline-secondary" href="/home.php" style="margin:2.5px;">Home</a>
    </div>
</body>
</html>
