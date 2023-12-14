<?php
require_once("../../models/user.php");
require_once("../../models/DataProvider.php");
require_once("../admin/check.php");

$user = new Users();
$userup = new Users();

$user_id= $_GET['user_id'];


$user_edit=$userup->displayUserOne($user_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username=$_POST['username'];
  $email=$_POST['email'];
  $gendre=$_POST['gendre'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $rue=$_POST['rue'];
  $ville=$_POST['ville'];
  $quartier=$_POST['quartier'];
  $agency=$_POST['agency'];
  $role=$_POST['role'];
  $postal=$_POST['postal'];
  
  $userup->updateUser($user_id,$username,$password,$gendre,$agency,$role,$ville,$quartier,$rue,$postal,$email,$phone);
header("Location: ../../views/admin/users.php");


  
    
  }



$data_users=$user->displayUser();  





?>






<?php include './aside.php'?>



<!-- =========== Aside bar =========== -->
<!-- =========== Content =========== -->
<main class="bg-gray-100 flex-grow h-[100vh] relative">

    <!-- ============ Content ============= -->
    <div class="md:p-6 bg-white md:m-5">

        <!-- ========== table Banks ======== -->
        <div class="hidden md:block rounded-lg overflow-hidden mt-10">
            <table class="w-full table-auto">
                <thead class="">
                    <tr class="bg-slate-900 text-white h-[60px]">
                        <th class="">ID</th>
                        <th class="">Username</th>
                        <th class="">Role</th>
                        <th class="">Email</th>
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody>



                    <?php 
                              foreach($data_users as $duser) {
                              ?>
                    <tr class="h-[50px]">

                        <td class="text-center"><?php echo $duser->userId ?></td>
                        <td class="text-center"><?php echo $duser->username ?></td>
                        <td class="text-center"><?php echo $duser->roleName ?></td>
                        <td class="text-center"><?php echo $duser->email ?></td>
                        <td class="text-center">
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md" onclick="updateForm()">
                                <a href="../../../app/views/users/updateUser.php?user_id=<?= $duser->userId;?>">
                                    <i class="fa-solid fa-pen"></i></a>

                            </button>
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                <a href="../../../app/views/users/deleteUser.php?user_id=<?= $duser->userId;?>"><i
                                        class="fa-solid fa-trash"></i></a>

                            </button>
                        </td>

                    </tr>
                    <?php 
                                    }
                                    ?>
                </tbody>
            </table>
        </div>
        <!-- =================TABLE-mobile==================== -->
        <div class="block md:hidden rounded-lg overflow-hidden mt-10">
            <table class="block w-full border-2   " id="table2">
                <thead class="hidden">
                    <tr>
                        <th class=""></th>
                        <th class=""></th>
                        <th class=""></th>
                        <th class=""></th>
                        <th class=""></th>


                    </tr>
                </thead>

                <tbody class="block w-full">



                    <?php 
  foreach($data_users as $duser) {
  ?>
                    <tr class="block pt-10   w-full">

                        <td data-label="userId"
                            class="pt-4 pr-3 border-b before:content-['userId']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                            <?php echo $duser->userId ?></td>
                        <td data-label="username"
                            class="pt-4 pr-3 border-b before:content-['username']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                            <?php echo $duser->username ?></td>
                        <td data-label="roleName"
                            class="pt-4 pr-3 border-b before:content-['roleName']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                            <?php echo $duser->roleName ?></td>
                        <td data-label="email"
                            class="pt-4 pr-3 border-b before:content-['email']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                            <?php echo $duser->email ?></td>
                        <td data-label="Action"
                            class="pt-4 pr-3 border-b before:content-['Action']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md" onclick="updateForm()">
                                <a href="../../../app/views/users/updateUser.php?user_id=<?= $duser->userId;?>">
                                    <i class="fa-solid fa-pen"></i></a>

                            </button>
                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                <a href="../../../app/views/users/deleteUser.php?user_id=<?= $duser->userId;?>"><i
                                        class="fa-solid fa-trash"></i></a>

                            </button>
                        </td>

                    </tr>
                    <?php 
        }
        ?>
                </tbody>




            </table>
        </div>
        <!-- ============ Form to add New Users ========= -->
        <div>
            <form action="" method="post"
                class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50 hidden"
                id="Add">
                <h1 class="text-center font-semibold text-3xl my-5">
                    Add new User
                </h1>
                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Username</label>
                        <input type="text" name="username"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Username " />
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Email</label>
                        <input type="email" name="email"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter email " />
                    </div>
                </div>

                <!-- gender -->
                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Gendre</label>
                        <select name="gendre" id="gendre"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Phone</label>
                        <input type="tel" name="phone"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Your Phone " />
                    </div>
                </div>
                <!-- phone -->

                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Password</label>
                        <input type="password" name="password" placeholder="Enter Password"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Confirm Password</label>
                        <input type="password" name="newpassword" placeholder="Confirm your Password"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="w-full">
                        <label for="" class="text-xl">Rue</label>
                        <input type="text" name="rue"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Rue " />
                    </div>
                    <div class="w-full">
                        <label for="" class="text-xl">Ville</label>
                        <input type="text" name="ville"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Ville" />
                    </div>
                </div>
                <div class="w-full">
                    <label for="" class="text-xl">Quartier</label>
                    <input type="text" name="quartier"
                        class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                        placeholder="Enter  Quartier " />
                </div>

                <div class="flex gap-4">
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Agency</label>
                        <select name="agency" id=""
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                            <option value="">Select Agency :</option>
                            <option value="Center Ville">Center Ville</option>
                        </select>
                    </div>
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Role</label>
                        <select name="role" id=""
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                            <option value="">Select Role :</option>
                            <option value="Admin">Admin</option>
                            <option value="Client">Client</option>
                        </select>
                    </div>
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Code Postal</label>
                        <input type="text" name="postal"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Code postal " />
                    </div>
                </div>

                <div>
                    <input type="submit" name="submit"
                        class="block w-full py-3 text-white text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900" />
                </div>
            </form>
        </div>
        <!-- ============ Form to add New Users ========= -->

        <!-- ============ Form to Update Users ========= -->
        <div>
            <form action="" method="post"
                class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50"
                id="Edit">
                <h1 class="text-center font-semibold text-3xl my-5">
                    Update User
                </h1>
                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Username</label>
                        <input type="text" name="username"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Username " value="<?= $user_edit[0]->username;?>" />
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Email</label>
                        <input type="email" name="email"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter email " value="<?= $user_edit[0]->email;?>" />
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Gendre</label>
                        <select name="gendre" id="gendre"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            value="<?= $user_edit[0]->username;?>">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Phone</label>
                        <input type="tel" name="phone"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Your Phone " value="<?= $user_edit[0]->phone;?>" />
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Password</label>
                        <input type="password" name="password" placeholder="Enter Password"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                    </div>
                    <div class="w-[50%]">
                        <label for="" class="text-xl">Confirm Password</label>
                        <input type="password" name="newpassword" placeholder="Confirm your Password"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="w-full">
                        <label for="" class="text-xl">Rue</label>
                        <input type="text" name="rue"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Rue " value="<?= $user_edit[0]->rue;?>" />
                    </div>
                    <div class="w-full">
                        <label for="" class="text-xl">Ville</label>
                        <input type="text" name="ville"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Ville" value="<?= $user_edit[0]->ville;?>" />
                    </div>
                </div>
                <div class="w-full">
                    <label for="" class="text-xl">Quartier</label>
                    <input type="text" name="quartier"
                        class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                        placeholder="Enter  Quartier " value="<?= $user_edit[0]->quartier;?>" />
                </div>

                <div class="flex gap-4">
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Agency</label>
                        <select name="agency" id=""
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                            <?php 
                                            foreach($user_edit as $user) {
                                                echo "
                                                <option value='$user->agencyId'>$user->agencyId</option>
                                                ";
                                            }
                                        ?>
                        </select>
                    </div>
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Role</label>
                        <select name="role" id=""
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            disabled>

                            <option value="client">client</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="w-[33%]">
                        <label for="" class="text-xl">Code Postal</label>
                        <input type="text" name="postal"
                            class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                            placeholder="Enter Code postal " value="<?= $user_edit[0]->codePostal;?>" />
                    </div>
                </div>

                <div>

                    <button type="submit" name="edit" value="Edit"
                        class="block w-full py-3 text-white text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900">Edit</button>

                </div>
            </form>
        </div>
        <!-- ============ Form to Update Users ========= -->
    </div>
    <!-- ============ Content ============= -->
</main>
<!-- ========== overlay ================= -->
<div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayAdd"></div>
<div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0" id="overlayEdit" onclick="updateForm()">
</div>
</section>
<script src="./public/assets/js/mainUser.js"></script>
</body>

</html>