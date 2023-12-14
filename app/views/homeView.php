<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gradient-to-r from-indigo-950 to-purple-800 ">
     <nav class="flex justify-between text-white font-semibold h-[100px] items-center w-[80%] mx-auto">
        <img class="w-[20%]" src="public/assets/images/logo.png" alt="">

        <div class="flex gap-[30px] mr-[6rem]">
            <a href="">Home</a>
            <a href="">About Us</a>
            <a href="">Agency</a>
            <a href="">Test</a>
        </div>

        <a href="app/views/login.php" class="px-[2rem] py-[0.4rem] rounded-lg bg-gradient-to-r from-amber-500 to-amber-300 ">Login</a>
     </nav> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>BBank</title>
</head>

<body class=""
    style="background-image: url(public/assets/images/macbg.jpeg); background-repeat:no-repeat; background-size:cover">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BBank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/BBank/public/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Banks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn btn-light ms-3" href="app/views/login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid pt-5">
        <div class="row mb-4 mb-lg-5 justify-content-lg-between">
            <div class="col-3 col-md-1 col-lg-2 d-none d-md-flex align-items-center">
                <div class="lc-block ratio ratio-1x1">
                    <!-- <img src="../../public/assets/images/" alt=""> -->
                    <img src="public/assets/images/generalbg.png" alt="">
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
                <div class="lc-block  ratio ratio-1x1">
                    <img src="public/assets/images/agribg.png" alt="">
                </div><!-- /lc-block -->
                <div class="lc-block">
                    <img src="public/assets/images/cihbg.png" alt="">
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-4 col-md-4 col-lg-3" style="opacity: 0;"> <img class="img-fluid"
                    src="https://images.unsplash.com/photo-1526546334624-2afe5b01088d?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MzF8fGJ1aWxkaW5nfGVufDB8MXx8fDE2MzQ1NTE2NTE&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080"
                    style="object-fit:cover" alt="Photo by Simone Hutsch"></div><!-- /col -->
            <div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
                <div class="lc-block">
                    <img src="public/assets/images/removebg.png" alt="">
                </div><!-- /lc-block -->
                <div class="lc-block ratio ratio-1x1">
                    <img src="public/assets/images/bgbghs.png" alt="">
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-3 col-md-1 col-lg-2 d-none d-md-flex  align-items-center">
                <div class="lc-block ratio ratio-1x1">
                    <img src="public/assets/images/bpbg.png" alt="">
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="lc-block text-center col-md-8">
                <div editable="rich">
                    <h1 class="rfs-25 fw-bold text-dark">Welcome to BBank: Managing Multiple Banks, Seamlessly.</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="lc-block text-center col-xxl-6 col-md-8">
                <div editable="rich">
                    <p class="lead text-dark"> Streamlined Banking Management for Clients & Administrators.</p>
                </div>
            </div><!-- /lc-block -->
        </div>
    </div>

    <!-- main section-->


    <!-- <main class="flex justify-between mt-[4rem] w-[80%] mx-auto">
         <div class="w-[45%] text-white">
            <p class="text-[2.25rem] font-semibold ">Digital Banking Made For Digital Users</p>
            <p class="my-[1.5rem] text-zinc-300 font-semibold text-[1.05rem]">We are Partners of all the banks in Morocco . Through our app , u can handle ur bank accounts from ur home . </p>
            <div class="my-[2.5rem] flex gap-[1rem]">
               <a href="" class="px-[0.8rem] py-[0.7rem] rounded-lg bg-gradient-to-r from-amber-500 to-amber-300 font-semibold">Discover our features</a>
               <a href="" class="px-[1.5rem] py-[0.7rem] rounded-lg font-semibold bg-white text-black">join Us </a>
            </div>
            <div class=" flex gap-[40px] font-semibold">
                <div>
                    <p>+2M</p>
                    <p>Customers</p>
                </div>
                <div>
                    <p>+100</p>
                    <p>Agencies</p>
                </div>
                <div>
                    <p>+22</p>
                    <p>Cities</p>
                </div>
            </div>
         </div class="w-[40%]">
           <img src="public/assets/images/home-pic.gif" class="h-[350px] w-[45%] rounded-lg mt-[0.5rem]" alt="">
         </div>
        
    </main>
    <div class="relative w-[100%] mt-[4rem]">
       <div class="flex w-[60%] mx-auto justify-between h-[120px] items-center">
          <img class="w-[80px] h-[80px]" src="public/assets/images/cih.png" alt="">
          <img class="w-[60px] h-[60px]" src="public/assets/images/tijariBank.png" alt="">
          <img class="w-[60px] h-[60px]" src="public/assets/images/societeGeneral.jpg" alt="">
          <img class="w-[60px] h-[60px]" src="public/assets/images/postMaroc.png" alt="">
       </div>
    </div> -->
</body>

</html>