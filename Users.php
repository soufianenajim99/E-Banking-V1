<?php
require_once("app/models/user.php");

$user = new Users();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  $username=$_POST['username'];
  $email=$_POST['email'];
  $gendre=$_POST['gendre'];
  $phone=$_POST['phone'];
  $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
  $rue=$_POST['rue'];
  $ville=$_POST['ville'];
  $quartier=$_POST['quartier'];
  $agency=$_POST['agency'];
  $role=$_POST['role'];
  $postal=$_POST['postal'];
  
  $user->addUser($username,$password,$gendre,$role,$ville,$quartier,$rue,$postal,$email,$phone);
    
  }

// ($username,$pw,$gendre,$role,$ville, $quartier,$rue,$codePostal,$email,$tel)


$data_users=$user->displayUser();  

// print_r($data_users);

?>








<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ========== Tailwind Css ========  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== AwesomeFonts Css ========  -->
    <script
      src="https://kit.fontawesome.com/d0fb25e48c.js"
      crossorigin="anonymous"
    ></script>
    <!-- ================ Css Stylesheet ================ -->
    <link rel="stylesheet" href="public/assets/css/client/admin.css" />
    <!-- ============ Declaration JS File ============-->
    <script src="./public/assets/js/dashboard_Admin.js" defer></script>
  </head>
  <body>
    <section class="flex items-center relative">
      <!-- =========== Aside bar =========== -->
      <aside class="bg-black h-[100vh] w-[320px] p-5 relative">
        <!-- ===== logo ===== -->
        <div>
          <img
            src="./public/assets/images/logo-white.png"
            alt="logo"
            class="pt-10"
          />
        </div>
        <ul class="p-5 mt-10">
          <h2 class="text-2xl font-bold my-5 text-white">General</h2>
          <li class="my-2">
            <a
              href="bank.php"
              class="text-lg font-medium block w-[full] rounded-md h-[60px] flex items-center text-white p-5 group hover:text-red-500"
            >
              <i
                class="fa-solid fa-building-columns mr-5 text-lg group-hover:text-red-500"
              ></i
              >Bank</a
            >
          </li>
          <li class="my-2">
            <a
              href="Users.php"
              class="active text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-red-500 bg-gray-900 bg-opacity-20"
            >
              <i
                class="fa-solid fa-user mr-5 text-lg group-hover:text-red-500"
              ></i
              >Users</a
            >
          </li>
          <li class="my-2">
            <a
              href="Accounts.html"
              class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-red-500 bg-gray-900 bg-opacity-20"
            >
              <i
                class="fa-solid fa-file mr-5 text-lg group-hover:text-red-500"
              ></i
              >Accounts</a
            >
          </li>
          <li class="my-2">
            <a
              href="Transactions.html"
              class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-red-500 bg-gray-900 bg-opacity-20"
            >
              <i
                class="fa-solid fa-right-left mr-5 text-lg group-hover:text-red-500"
              ></i
              >Transactions</a
            >
          </li>
          <li class="my-2">
            <a
              href="Agency.php"
              class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-red-500 bg-gray-900 bg-opacity-20"
            >
              <i
                class="fa-solid fa-building text-white mr-5 text-lg group-hover:text-red-500"
              ></i>
              Agnecy</a
            >
          </li>
          <li class="my-2">
            <a
              href="#"
              class="text-lf font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-red-500 bg-gray-900 bg-opacity-20"
            >
              <i
                class="fa-solid fa-credit-card text-white mr-5 text-lg group-hover:text-red-500"
              ></i>
              Distributer</a
            >
          </li>
        </ul>
      </aside>
      <!-- =========== Aside bar =========== -->
      <!-- =========== Content =========== -->
      <main class="bg-gray-100 flex-grow h-[100vh] relative">
        <!-- ============== header =========== -->
        <div class="bg-white flex items-center justify-between p-5">
          <h2 class="text-2xl tracking-widest font-bold">Dashboard</h2>
          <div class="flex gap-4 items-center mr-5">
            <div>
              <h3 class="font-medium text-lg mb-1">Abdelouahed Senane</h3>
              <span class="text-gray-500 text-md block text-right">Admin</span>
            </div>
            <img
              src="./public/assets/images/admin.jpg"
              alt="profile"
              class="w-[60px] h-[60px] rounded-full"
            />
          </div>
        </div>
        <!-- ========== End Header =========== -->
        <!-- ============ Content ============= -->
        <div class="p-6 bg-white m-5">
          <div class="flex items-center justify-between">
            <div>
              <h3
                class="text-orange-600 text-3xl font-bold tracking-widest mb-2"
              >
                Users
              </h3>
              <p class="text-xl">Our Users around The world</p>
            </div>
            <div>
              <button
                class="bg-slate-900 text-white w-[160px] h-[50px] rounded-md"
                id="addBank"
              >
                Add User
              </button>
            </div>
          </div>
          <!-- ========== table Banks ======== -->
          <div class="rounded-lg overflow-hidden mt-10">
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
                    <button
                      class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md"
                      
                    >
                    <a href="app/views/users/updateUser.php?user_id=<?= $duser->userId;?>"> <i class="fa-solid fa-pen"></i></a>
                     

                    </button>
                    <button
                      class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md"
                    >
                    <a href="app/views/users/deleteUser.php?user_id=<?= $duser->userId;?>"><i class="fa-solid fa-trash"></i></a>
                      
                    </button>

                    <button
                      class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md"
                    >
                    <a href="app/views/users/UserAcc.php?user_id=<?= $duser->userId;?>"><i class="fa-solid fa-file"></i></a>
                      
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
            <form
              action=""
              method="post"

              class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50 hidden"
              id="Add"
            >
              <h1 class="text-center font-semibold text-3xl my-5">
                Add new User
              </h1>
              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Username</label>
                  <input
                    type="text"
                    name="username"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Username "
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Email</label>
                  <input
                    type="email"
                    name="email"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter email "
                  />
                </div>
              </div>

              <!-- gender -->
              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Gendre</label>
                  <select
                    name="gendre"
                    id="gendre"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                  </select>
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Phone</label>
                  <input
                    type="tel"
                    name="phone"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Your Phone "
                  />
                </div>
              </div>
              <!-- phone -->

              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Password</label>
                  <input
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Confirm Password</label>
                  <input
                    type="password"
                    name="newpassword"
                    placeholder="Confirm your Password"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  />
                </div>
              </div>
              <div class="flex gap-5">
                <div class="w-full">
                  <label for="" class="text-xl">Rue</label>
                  <input
                    type="text"
                    name="rue"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Rue "
                  />
                </div>
                <div class="w-full">
                  <label for="" class="text-xl">Ville</label>
                  <input
                    type="text"
                    name="ville"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Ville"
                  />
                </div>
              </div>
              <div class="w-full">
                <label for="" class="text-xl">Quartier</label>
                <input
                  type="text"
                  name="quartier"
                  class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  placeholder="Enter  Quartier "
                />
              </div>

              <div class="flex gap-4">
                <div class="w-[33%]">
                  <label for="" class="text-xl">Agency</label>
                  <select
                    name="agency"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="">Select Agency :</option>
                    <option value="Center Ville">Center Ville</option>
                  </select>
                </div>
                <div class="w-[33%]">
                  <label for="" class="text-xl">Role</label>
                  <select
                    name="role"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="">Select Role :</option>
                    <option value="Admin">Admin</option>
                    <option value="Client">Client</option>

                  </select>
                </div>
                <div class="w-[33%]">
                  <label for="" class="text-xl">Code Postal</label>
                  <input
                    type="text"
                    name="postal"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Code postal "
                  />
                </div>
              </div>

              <div>
                <input
                  type="submit"
                  name="submit"
                  class="block w-full py-3 text-white text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900"
                />
              </div>
            </form>
          </div>
          <!-- ============ Form to add New Users ========= -->

          <!-- ============ Form to Update Users ========= -->

          <div>
            <form
              action=""
              method="get"
              class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50 hidden"
              id="Edit"
            >
              <h1 class="text-center font-semibold text-3xl my-5">
                Update User

              </h1>
              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Username</label>
                  <input
                    type="text"
                    name="username"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Username "
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Email</label>
                  <input
                    type="email"
                    name="email"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter email "
                  />
                </div>
              </div>
              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Gendre</label>
                  <select
                    name="gendre"
                    id="gendre"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Phone</label>
                  <input
                    type="tel"
                    name="phone"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Your Phone "
                  />
                </div>
              </div>

              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">Password</label>
                  <input
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Confirm Password</label>
                  <input
                    type="password"
                    name="newpassword"
                    placeholder="Confirm your Password"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  />
                </div>
              </div>
              <div class="flex gap-5">
                <div class="w-full">
                  <label for="" class="text-xl">Rue</label>
                  <input
                    type="text"
                    name="rue"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Rue "
                  />
                </div>
                <div class="w-full">
                  <label for="" class="text-xl">Ville</label>
                  <input
                    type="text"
                    name="ville"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Ville"
                  />
                </div>
              </div>
              <div class="w-full">
                <label for="" class="text-xl">Quartier</label>
                <input
                  type="text"
                  name="quartier"
                  class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  placeholder="Enter  Quartier "
                />
              </div>

              <div class="flex gap-4">
                <div class="w-[33%]">
                  <label for="" class="text-xl">Agency</label>
                  <select
                    name="agency"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="">Select Agency :</option>
                    <option value="Center Ville">Center Ville</option>
                  </select>
                </div>
                <div class="w-[33%]">
                  <label for="" class="text-xl">Role</label>
                  <select
                    name="role"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="">Select Role :</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
                <div class="w-[33%]">
                  <label for="" class="text-xl">Code Postal</label>
                  <input
                    type="text"
                    name="postal"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Code postal "
                  />
                </div>
              </div>

              <div>
               
                   <button type="submit" name="edit" value="Edit" class="block w-full py-3 text-white text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900"><a href="app/views/users/updateUser.php?user_id=">Edit</a></button>
    
              </div>
            </form>
          </div>
          <!-- ============ Form to Update Users ========= -->

        </div>
        <!-- ============ Content ============= -->
      </main>
      <!-- ========== overlay ================= -->
      <div
        class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden"
        id="overlayAdd"
      ></div>
      <div
        class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden"
        id="overlayEdit"
        onclick="updateForm()"
      ></div>
    </section>
    <script src="./public/assets/js/mainUser.js"></script>

  </body>
</html>
