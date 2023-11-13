<?php
  include_once 'connect.php';
  if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=='' || $password==''){
      echo"<script>alert('ยังกรอกไม่ครบ usename or password')</script>";
    }else{
      $sql = "SELECT * FROM user WHERE username='$username' && password='$password'";
      // $result = mysqli_query($con,$sql);
      $result = $con->query($sql);
      $row = mysqli_fetch_array($result);
      $num = mysqli_num_rows($result);
      if($num != 1){
        //echo "<script>alert('Login notyed')</script>";
        $message = "ชื่อผู้ให้ไม่ถูกต้อง";
      }else{
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        header('location:index.php');
       // echo "<script>alert('Login True')</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>DKUB</title>
</head>

<body>

    <div class="container">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="username">
                <label for=" floatingInput">Usename</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>
        </form>
        <div class="text-center text-danger my-3">
            <?php
    if(isset($message)){
      echo "$message";
    }
    ?>
        </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>