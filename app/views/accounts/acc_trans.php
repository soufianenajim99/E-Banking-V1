<?php
require_once("../../models/accounts.php");

$trans_id=$_GET['id'];

  $newAccount = new Accounts();
  $Accounts = $newAccount->displayAccTra($trans_id);


// var_dump($data_agence);
// echo '<br>';
// var_dump($bankdata);


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
        <aside class="bg-[#186F65] h-[100vh] w-[320px] p-5 relative">
            <!-- ===== logo ===== -->

            <ul class="p-5 mt-10">
                <h2 class="text-2xl font-bold my-5 text-white">General</h2>
                <li class="my-2">
                    <a href="../admin/bank.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] flex items-center text-white p-5 group hover:text-[#0F1A19]">
                        <i class="fa-solid fa-building-columns mr-5 text-lg group-hover:text-[#0F1A19]"></i>Bank</a>
                </li>
                <li class="my-2">
                    <a href="../admin/Users.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-user mr-5 text-lg group-hover:text-[#0F1A19]"></i>Users</a>
                </li>
                <li class="my-2">
                    <a href="../admin/Accounts.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-file mr-5 text-lg group-hover:text-[#0F1A19]"></i>Accounts</a>
                </li>
                <li class="my-2">
                    <a href="../admin/Transactions.php"
                        class=" text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-right-left mr-5 text-lg group-hover:text-[#0F1A19]"></i>Transactions</a>
                </li>
                <li class="my-2">
                    <a href="../admin/Agency.php"
                        class="text-lg font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-building text-white mr-5 text-lg group-hover:text-[#0F1A19]"></i>
                        Agnecy</a>
                </li>
                <li class="my-2">
                    <a href="../admin/Distributer.php"
                        class="text-lf font-medium block w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-[#0F1A19] bg-gray-900 bg-opacity-20">
                        <i class="fa-solid fa-credit-card text-white mr-5 text-lg group-hover:text-[#0F1A19]"></i>
                        Distributer</a>
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
                        <button class="bg-[#186F65] text-white w-[160px] h-[50px] rounded-md" id="addBank">
                            Add Transactions
                        </button>
                    </div>
                </div>
                <!-- ========== table Banks ======== -->
                <div class="rounded-lg overflow-hidden mt-10">
                    <table class="w-full table-auto">
                        <thead class="">
                            <tr class="bg-[#186F65] text-white h-[60px]">
                                <th class="">TransactionID</th>
                                <th class="">Type</th>
                                <th class="">Amount</th>
                                <th class="">AccountID</th>
                                <th class="">Username</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
              foreach($Accounts as $dagence) {
              ?>
                            <tr class="h-[50px]">
                                <td class="text-center"><?php echo $dagence->transactionId ?></td>
                                <td class="text-center"><?php echo $dagence->type ?></td>
                                <td class="text-center"><?php echo $dagence->amount ?></td>
                                <td class="text-center"><?php echo $dagence->accountId ?></td>
                                <td class="text-center"><?php echo $dagence->username ?></td>
                                <td class="text-center">
                                    <button class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md" id="addBank">
                                        <a
                                            href="../../../app/views/transaction/deleteTransaction.php?transaction_id=<?= $dagence->transactionId;?>"><i
                                                class="fa-solid fa-trash" style="color:#186F65"></i></a>
                                    </button>
                                </td>
                            </tr>
                            <?php 
              }
              ?>
                        </tbody>
                    </table>
                </div>
                <!-- ============ Form to Add Transaction ========= -->
                <div>
                    <form action="" method="post"
                        class="absolute top-[50%] left-[20%] translate-y-[-50%] bg-white p-5 w-[1000px] rounded-md shadow-sm z-50 hidden"
                        id="Add">
                        <h1 class="text-center font-semibold text-3xl my-5">
                            Add new Transaction
                        </h1>


                        <div class="flex gap-5">
                            <div class="w-[50%]">
                                <label for="" class="text-xl">Type</label>
                                <select name="type" id="type"
                                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                                    <option value="Debit">Debit</option>
                                    <option value="Credit">Credit</option>

                                </select>
                            </div>
                            <div class="w-[50%]">
                                <label for="" class="text-xl">Amount</label>
                                <input type="text" name="amount" placeholder="amount"
                                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-[50%]">
                                <label for="" class="text-xl">Account</label>
                                <select name="accountId" id=""
                                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">

                                    <?php 
                                            foreach($Accounts as $data) {
                                                echo "
                                                <option value='$data->accountId'>$data->accountId</option>
                                                ";
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div>
                            <input type="submit" name="submit"
                                class="block w-full py-3 text-white text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900" />
                        </div>
                    </form>
                </div>
                <!-- ============ Form to add Agency ========= -->
                <!-- ============ Form to Edit Agency ========= -->
                <div>
                    <form action="" method="get"
                        class="absolute top-[50%] left-[30%] translate-y-[-50%] bg-white p-5 w-[650px] rounded-md shadow-sm z-50 hidden"
                        id="Edit">
                        <div>
                            <label for="" class="text-xl">Latitude</label>
                            <input type="text" name="amount"
                                class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                                placeholder="Latitude..." />
                        </div>
                        <div>
                            <label for="" class="text-xl">Logitude</label>
                            <input type="text" name="amount"
                                class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                                placeholder="Logitude..." />
                        </div>
                        <div>
                            <input type="submit" name="submit" value="Edit"
                                class="block w-full py-3 text-white mt-5 text-xl px-1 cursor-pointer my-2 outline-none border-none bg-slate-900" />
                        </div>
                    </form>
                </div>
                <!-- ============ Form to add Transaction ========= -->
            </div>
            <!-- ============ Content ============= -->
        </main>
        <!-- ========== overlay ================= -->
        <div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayAdd"></div>
        <div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayEdit"
            onclick="updateForm()"></div>
    </section>
</body>

</html>