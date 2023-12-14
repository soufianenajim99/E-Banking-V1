<?php

include("../controllers/userController.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pw = $_POST["pw"];
    // $pw = password_hash($_POST["pw"], PASSWORD_BCRYPT);


    $loggingUser = new UserController();
    $loggingUser->login($username,$pw);
}






?>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <title>Login</title>
</head>

<body>
    
    
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://i.pinimg.com/564x/10/c7/56/10c756e166be6af77a89ed4fd8b71b5e.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    
                                    <form action="" method="post">
                                        
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span>
                                    </div>
                                    
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                    
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example17" class="form-control form-control-lg" name="username"/>
                                        <label class="form-label" for="form2Example17">Username</label>
                                    </div>
                                    
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example27" class="form-control form-control-lg" name="pw"/>
                                        <label class="form-label" for="form2Example27">Password</label>
                                    </div>
                                    
                                    <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block">Login</button>
                </div>
                
                <a class="small text-muted" href="#!">Forgot password?</a>
                <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                style="color: #393f81;">Register here</a></p>
                <a href="#!" class="small text-muted">Terms of use.</a>
                <a href="#!" class="small text-muted">Privacy policy</a>
            </form>
            
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

</body>

<!-- <body class="bg-gradient-to-r from-indigo-950 to-purple-800 h-screen">
    <form method="post" class="flex flex-col gap-[2rem] w-[40%] mx-auto h-[90vh] justify-center ">
        <h1 class="text-center text-[1.75rem] text-amber-300 font-semibold">Login Page</h1>
        <div class="flex flex-col gap-[1rem] text-zinc-300 w-[50%] mx-auto">
            <input type="text" name="username" placeholder="Enter Your Username" class="rounded-lg  py-[0.35rem] px-[0.45rem]  bg-zinc-300 color-black  focus:outline-none text-indigo-800 font-medium placeholder:text-indigo-800 font-medium">
        </div>
        <div  class="flex flex-col gap-[0.75rem] text-zinc-300 w-[50%] mx-auto">
            <input type="password"  placeholder="Enter Your Password" name="pw" class="rounded-lg  py-[0.35rem] px-[0.45rem]  bg-zinc-300 color-black  focus:outline-none text-indigo-800 font-medium placeholder:text-indigo-800 font-medium">
         </div>
         <div class="w-[20%] mx-auto">
            <input type="submit" value="submit" class="w-full text-white bg-gradient-to-r from-amber-500 to-amber-300 py-[0.25rem] rounded-lg font-semibold cursor-pointer">
         </div>
         <div class="flex w-full justify-center">
        
         </div>
     </form>
</body> -->
</html>