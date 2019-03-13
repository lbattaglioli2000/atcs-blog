<?php
class USER
{
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    public function register($fname,$lname,$uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);

           $stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass)
                                                       VALUES(:uname, :umail, :upass)");

           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);

           $stmt->execute();

           return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
    }

    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];

                //insert login table
                $q ="INSERT INTO logins SET user_id = :uid, ip_address = :ip";
                $params = array(':uid' => $userRow['user_id'] , ':ip' => $_SERVER['REMOTE_ADDR']);
                $stmt = $this->db->prepare($q);
                $stmt->execute($params);
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        $this->redirect('index.php?loggedOut=true');
   }

   public function make_post($title, $post, $uid){
       try {
                $q ="INSERT INTO blogpost SET title = :title, user_posting = :uposting, user_id = :uid";
                $params = array(':title' => $title , ':uposting' => $post, ':uid' => $uid);
                $stmt = $this->db->prepare($q);
                $stmt->execute($params);
       }
       catch(PDOException $e){
           echo $e->getMessage();
       }
   }

   public function edit_post($title, $post, $postID){
       try {
                $q ="UPDATE blogpost SET title = :title, user_posting = :uposting WHERE id = :id;";
                $params = array(':title' => $title , ':uposting' => $post, ':id' => $postID);
                $stmt = $this->db->prepare($q);
                $stmt->execute($params);
       }
       catch(PDOException $e){
           echo $e->getMessage();
       }
   }
}
?>
