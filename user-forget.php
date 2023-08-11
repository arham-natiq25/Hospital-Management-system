<?php
  include "confile.php";
  include "Pheader.php";
  if(isset($_POST['submit']))
  {
    $name=$_POST['username'];
    $email=$_POST['email'];
   

    $sql="SELECT * FROM patient_reg WHERE name= '$name' and email= '$email' ";

    $query=mysqli_query($con,$sql);
    if(mysqli_num_rows($query)>0)
    {
        $row=mysqli_fetch_array($query);
        $n=$row['name']; $e=$row['email'];
        $_SESSION['email']=$row['email'];
        $i=$row['id'];
        if($name==$n && $email==$e)
        {
            header("location:user-resetpass.php");
        }
        else
        {
            echo "<div class='text-danger text-center'>You have entered wrong email or username</div> <br> ";   
        }
         
    }
}
  
  
?>

<body>
    <div class="container mt-5">
        <div class="row p-5">
            <div class="offset-sm-4 col-sm-4">
                <h3>HMS | PATIENT Recovery account </h3>
                <p class="text-primary">
                    Recover your account
                </p>
                <form action="" class="p-3" method="post" style="border:1px solid rgb(196, 191, 191)">
                    <p class="small text-secondary">
                        Please Enter your Full name and Email to recover Your password
                    </p>
                    <input type="text" class="form-control my-2" name="username"
                        placeholder="Please Enter Your Full Name " required>
                    <input type="email" class="form-control" name="email"
                        placeholder="Please Enter Your Email " required>
                    <br>
                
                 
                   <button type="submit" class="btn btn-primary text-white float-end" name="submit">Reset</button>
                    <br> <br>

                    <span class="small text-secondary">Already have account ?</span><span><a href="user-login.php"
                            class="text-decoration-none small">login</a></span>
            </div>
            </form>

            <br>
            <br>
            <p class="small text-center">© 2022 HMS. All rights reserved</p>
        </div>
    </div>
    </div>
</body>
