<?php
require_once("../../models/user.php");


$user = new Users();

$user_id= $_GET['user_id'];

$data_acc=$user->displayUserAcc($user_id);




// ($username,$pw,$gendre,$role,$ville, $quartier,$rue,$codePostal,$email,$tel)



// print_r($data_acc);

?>








<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ========== Tailwind Css ========  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== AwesomeFonts Css ========  -->
    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
    <!-- ================ Css Stylesheet ================ -->
    <link rel="stylesheet" href="../../../public/assets/css/client/admin.css" />
    <!-- ============ Declaration JS File ============-->
    <script src="../../../public/assets/js/dashboard_Admin.js" defer></script>
</head>

<body>
    <section class="flex items-center relative">
        <!-- =========== Aside bar =========== -->
        <aside class="bg-[#186F65] h-[100vh] w-[20%] sm:w-[320px] sm:p-5 relative">
            <!-- ===== logo ===== -->
            <!-- <div>
          <img
            src="../../../public/assets/images/logo-white.png"
            alt="logo"
            class="pt-10"
          />
        </div> -->
            <ul class="p-5 mt-10">
                <h2 class="text-base sm:text-2xl font-bold sm:my-5 text-white">General</h2>
                <li class="my-2">
                    <a href="../admin/bank.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] flex items-center text-white p-5 group hover:text-[#0F1A19]">
                        <i class="fa-solid fa-building-columns mr-5 text-lg group-hover:text-[#0F1A19]"></i><span
                            class="hidden sm:inline-block">Bank</span>
                    </a>
                </li>
                <li class="my-2">
                    <a href="../admin/Users.php"
                        class=" text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-user mr-5 text-lg group-hover:text-[#0F1A19]"></i><span
                            class="hidden sm:inline-block">Users</span></a>
                </li>
                <li class="my-2">
                    <a href="../admin/Accounts.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-file mr-5 text-lg group-hover:text-[#0F1A19]"></i><span
                            class="hidden sm:inline-block">Accounts</span></a>
                </li>
                <li class="my-2">
                    <a href="../admin/Transactions.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-right-left mr-5 text-lg group-hover:text-[#0F1A19]"></i><span
                            class="hidden sm:inline-block">Transactions</span></a>
                </li>
                <li class="my-2">
                    <a href="../admin/Agency.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-building text-white mr-5 text-lg group-hover:text-[#0F1A19]"></i>
                        <span class="hidden sm:inline-block"> Agnecy</span></a>
                </li>
                <li class="my-2">
                    <a href="../admin/Distributer.php"
                        class="text-lf font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-credit-card text-white mr-5 text-lg group-hover:text-[#0F1A19]"></i>
                        <span class="hidden sm:inline-block"> Distributer</span>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- =========== Aside bar =========== -->
        <!-- =========== Content =========== -->
        <main class="bg-gray-100 flex-grow h-[100vh] relative">

            <!-- ============ Content ============= -->
            <div class="p-6 bg-white m-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-orange-600 text-base sm:text-3xl font-bold tracking-widest mb-2">
                            <?php  if(!empty($data_acc)){
                                echo $data_acc[0]->username;
                                              }else{
                                                echo "This User Has No Accounts Yet";
                                              } ?>
                        </h3>
                    </div>

                </div>
                <!-- ========== table-Banks-descktop ======== -->
                <div class="hidden sm:block rounded-lg overflow-hidden mt-10">
                    <table class="w-full table-auto">
                        <thead class="">
                            <tr class="bg-[#186F65] text-white h-[60px]">
                                <th class="">ID</th>
                                <th class="">Balance</th>
                                <th class="">RIB</th>
                                <th class="">User_Id</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                  if(!empty($data_acc)){

                                    foreach($data_acc as $duser) {
                                  
                                  ?>
                            <tr class="h-[50px]">

                                <td class="text-center"><?php echo $duser->accountId ?></td>
                                <td class="text-center"><?php echo $duser->balance ?></td>
                                <td class="text-center"><?php echo $duser->RIB ?></td>
                                <td class="text-center"><?php echo $duser->username?></td>
                                <td class="text-center">
                                    <a href="../../controllers/accounts/update_account.php?id=<?php echo $duser->accountId ?>"
                                        class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px] "
                                        onclick="updateForm()">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="../../controllers/accounts/delete_account.php?id=<?php echo $duser->accountId ?>"
                                        class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a href="../accounts/acc_trans.php?id=<?php echo $duser->accountId ?>"
                                        class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                                        <i class="fa-solid fa-right-left"></i>
                                    </a>
                                </td>

                            </tr>
                            <?php 
                      }} else {
                      
                      }
                      ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <!--=======TABLE-MOBILE======-->
            <div class=" block sm:hidden rounded-lg overflow-hidden mt-10">
                <table class="border-5 block w-full  border-2">
                    <thead>
                        <tr>
                            <th class=""></th>
                            <th class=""></th>
                            <th class=""></th>
                            <th class=""></th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody class="block  w-full">

                        <?php 
                                  if(!empty($data_acc)){

                                    foreach($data_acc as $duser) {
                                  
                                  ?>
                        <tr class="block pt-8   w-full ">

                            <td data-label="ID"
                                class="pt-4 pr-3 border-b before:content-['ID']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden  block    text-right">
                                <?php echo $duser->accountId ?></td>
                            <td data-label="Balance"
                                class="pt-4 pr-3 border-b before:content-['Balance']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden  block    text-right">
                                <?php echo $duser->balance ?></td>
                            <td data-label="RIB"
                                class="pt-4 pr-3 border-b before:content-['RIB']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden  block    text-right">
                                <?php echo $duser->RIB ?></td>
                            <td data-label="UserName"
                                class="pt-4 pr-3 border-b before:content-['UserName']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden  block    text-right">
                                <?php echo $duser->username?></td>
                            <td data-label="Action"
                                class="pt-4 pr-3 border-b before:content-['Action']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden  block    text-right">
                                <a href="../../controllers/accounts/update_account.php?id=<?php echo $duser->accountId ?>"
                                    class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px] "
                                    onclick="updateForm()">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="../../controllers/accounts/delete_account.php?id=<?php echo $duser->accountId ?>"
                                    class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="../accounts/acc_trans.php?id=<?php echo $duser->accountId ?>"
                                    class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                                    <i class="fa-solid fa-right-left"></i>
                                </a>
                            </td>

                        </tr>
                        <?php 
                      }} else {
                      
                      }
                      ?>
                    </tbody>
                </table>
            </div>


            </div>
            <!--============Content=============-->
        </main>
        <!-- ========== overlay ================= -->
        <div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayAdd"></div>
        <div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayEdit"
            onclick="updateForm()"></div>
    </section>
    <script src="./public/assets/js/mainUser.js"></script>
</body>

</html>