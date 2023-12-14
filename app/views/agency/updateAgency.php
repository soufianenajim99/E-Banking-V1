<?php
require_once("../../models/agency.php");



$agence = new Agency();
$agencyup= new Agency();

$agence_id= $_GET['agence_id'];

$agence_edit= $agencyup->displayAgencyOne($agence_id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $longitude=$_POST['longitude'];
  $email=$_POST['email'];
  $latitude=$_POST['latitude'];
  $phone=$_POST['phone'];
  $rue=$_POST['rue'];
  $ville=$_POST['ville'];
  $quartier=$_POST['quartier'];
  $bank=$_POST['bank'];
  $postal=$_POST['postal'];
  

  $agence->updateAgence($agence_id,$longitude,$latitude,$bank,$ville,$quartier,$rue,$postal,$email,$phone);
  header("Location: ../../views/admin/agency.php");

    
  }
  // print_r($agence_edit);

 

// ($username,$pw,$gendre,$role,$ville, $quartier,$rue,$codePostal,$email,$tel)


$data_agence=$agence->displayAgency();  

// print_r($data_agence);

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
    <link rel="stylesheet" href="../../../public/assets/css/client/admin.css" />
    <!-- ============ Declaration JS File ============-->
    <script src="../../../public/assets/js/dashboard_Admin.js" defer></script>
  </head>
  <body>
    <section class="flex items-center relative">
      <!-- =========== Aside bar =========== -->
      <aside class="bg-black h-[100vh] w-[320px] p-5 relative">
        <!-- ===== logo ===== -->
        <div>
          <img
            src="../../../public/assets/images/logo-white.png"
            alt="logo"
            class="pt-10"
          />
        </div>
        <ul class="p-5 mt-10">
          <h2 class="text-2xl font-bold my-5 text-white">General</h2>
          <li class="my-2">
            <a
              href="../admin/bank.php"
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
              href="../admin/Users.php"
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
              href="../admin/Accounts.php"
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
              href="../admin/Transactions.php"
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
              href="../admin/Agency.php"
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
              href="../admin/Distributer.php"
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
                    <h2 class="text-2xl tracking-widest font-bold">
                        Dashboard
                    </h2>
                    <div class="flex gap-4 items-center mr-5">
                        <div>
                            <h3 class="font-medium text-lg mb-1">
                                Abdelouahed Senane
                            </h3>
                            <span class="text-gray-500 text-md block text-right"
                                >Admin</span
                            >
                        </div>
                        <img
                            src="../../../public/assets/images/admin.jpg"
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
                                Agency
                            </h3>
                            <p class="text-xl">Our Banks around The world</p>
                        </div>
                        <div>
                            <button
                                class="bg-slate-900 text-white w-[160px] h-[50px] rounded-md"
                                id="addBank"
                            >
                                Add Agency
                            </button>
                        </div>
                    </div>
                    <!-- ========== table Banks ======== -->
                    <div class="rounded-lg overflow-hidden mt-10">
                        <table class="w-full table-auto">
                            <thead class="">
                                <tr class="bg-slate-900 text-white h-[60px]">
                                    <th class="">AgencyID</th>
                                    <th class="">Longitude</th>
                                    <th class="">Latitude</th>
                                    <th class="">BankID</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
              foreach($data_agence as $dagence) {
              ?>
                                <tr class="h-[50px]">
                                <td class="text-center"><?php echo $dagence->agencyId ?></td>
                  <td class="text-center"><?php echo $dagence->longitude ?></td>
                  <td class="text-center"><?php echo $dagence->latitude ?></td>
                  <td class="text-center"><?php echo $dagence->name ?></td>
                                    <td class="text-center">
                                        <button
                                            class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md"
                                            onclick="updateForm()"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                        <button
                                            class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md"
                                            id="addBank"
                                        >
                                        <a href="app/views/agency/deleteAgency.php?agency_id=<?= $dagence->agencyId;?>"><i class="fa-solid fa-trash"></i></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php 
              }
              ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ============ Form to Add Agency ========= -->
                    <div>
            <form
              action=""
              method="post"
              class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50 hidden"
              id="Add"
            >
              <h1 class="text-center font-semibold text-3xl my-5">
                Add new Agency
              </h1>
              <div class="flex gap-5">
                <div class="w-[50%]">
                <label for="" class="text-xl">Phone</label>
                  <input
                    type="tel"
                    name="phone"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Your Phone "
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
                  <label for="" class="text-xl">latitude</label>
                  <input
                    type="text"
                    name="latitude"
                    placeholder="latitude"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">longitude</label>
                  <input
                    type="text"
                    name="longitude"
                    placeholder="longitude"
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
                <div class="w-[50%]">
                  <label for="" class="text-xl">Bank</label>
                  <select
                    name="bank"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                  >
                    <option value="1">Cih</option>
                  </select>
                </div>
                <div class="w-[50%]">
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
                    <!-- ============ Form to add Agency ========= -->
                    <!-- ============ Form to Edit Agency ========= -->
                    <div>
                    <form
              action=""
              method="post"
              class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50"
              id="Edit"
            >
              <h1 class="text-center font-semibold text-3xl my-5">
                Edit Agency
              </h1>
              <div class="flex gap-5">
                <div class="w-[50%]">
                <label for="" class="text-xl">Phone</label>
                  <input
                    type="tel"
                    name="phone"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Your Phone "
                    value="<?= $agence_edit[0]->phone;?>"
                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Email</label>
                  <input
                    type="email"
                    name="email"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter email "
                    value="<?= $agence_edit[0]->email;?>"
                  />
                </div>
              </div>


              <div class="flex gap-5">
                <div class="w-[50%]">
                  <label for="" class="text-xl">latitude</label>
                  <input
                    type="text"
                    name="latitude"
                    placeholder="latitude"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    value="<?= $agence_edit[0]->latitude;?>"

                  />
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">longitude</label>
                  <input
                    type="text"
                    name="longitude"
                    placeholder="longitude"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    value="<?= $agence_edit[0]->longitude;?>"

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
                    value="<?= $agence_edit[0]->rue;?>"

                  />
                </div>
                <div class="w-full">
                  <label for="" class="text-xl">Ville</label>
                  <input
                    type="text"
                    name="ville"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Ville"
                    value="<?= $agence_edit[0]->ville;?>"

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
                  value="<?= $agence_edit[0]->quartier;?>"

                />
              </div>

              <div class="flex gap-4">
                <div class="hidden w-[50%]">
                  <label for="" class="text-xl">Bank</label>
                  <select
                    name="bank"
                    id=""
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    value="<?= $agence_edit[0]->bankId;?>"

                  >
                    <option value="1">Cih</option>
                    
                  </select>
                </div>
                <div class="w-[50%]">
                  <label for="" class="text-xl">Code Postal</label>
                  <input
                    type="text"
                    name="postal"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Code postal "
                    value="<?= $agence_edit[0]->codePostal;?>"

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
                    <!-- ============ Form to add Transaction ========= -->
                </div>
                <!-- ============ Content ============= -->
            </main>
            <!-- ========== overlay ================= -->
            <div
                class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden"
                id="overlayAdd"
            ></div>
            <div
                class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0"
                id="overlayEdit"
                onclick="updateForm()"
            ></div>
        </section>
    <script src="../../../public/assets/js/mainUser.js"></script>
    </body>
</html>
