<?php
require_once("../../models/accounts.php");
require_once("../../models/transaction.php");
require_once './check.php';


$transaction = new transaction();


  // Fetch Accounts
  $newAccount = new Accounts();
  $Accounts = $newAccount->displayAccounts();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type=$_POST['type'];
  $amount=$_POST['amount'];
  $accountId=$_POST['accountId'];
 
  $transaction->addTransaction($type,$amount,$accountId);
    
  }


$data_trans=$transaction->displayTransaction();

// var_dump($data_agence);
// echo '<br>';
// var_dump($bankdata);


?>

<?php include './aside.php'?>

<!-- ========== End Header =========== -->
<!-- ============ Content ============= -->
<div class="md:p-6 bg-white md:m-5">
    <div class="flex items-center justify-between">

        <div>
            <button class="bg-[#186F65] text-white w-[160px] h-[50px] rounded-md" id="addBank">
                Add Transactions
            </button>
        </div>
    </div>
    <!-- ========== table-Banks-desktop ======== -->
    <div class="hidden md:block rounded-lg overflow-hidden mt-10">
        <table class="w-full table-auto" id="table1">
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
              foreach($data_trans as $dagence) {
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
    <!-- ========== table-Banks-mobile ======== -->
    <div class="block md:hidden rounded-lg overflow-hidden mt-10">
        <table class="block border-2 w-full table-auto" id="table2">
            <thead class="hidden">
                <tr>
                    <th class="">TransactionID</th>
                    <th class="">Type</th>
                    <th class="">Amount</th>
                    <th class="">AccountID</th>
                    <th class="">Username</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody class="block w-full">
                <?php 
              foreach($data_trans as $dagence) {
              ?>
                <tr class="block pt-10   w-full ">
                    <td data-label="ID"
                        class="pt-4 pr-3 border-b before:content-['ID']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <?php echo $dagence->transactionId ?></td>
                    <td data-label="Type"
                        class="pt-4 pr-3 border-b before:content-['Type']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <?php echo $dagence->type ?></td>
                    <td data-label="Amount"
                        class="pt-4 pr-3 border-b before:content-['Amount']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <?php echo $dagence->amount ?></td>
                    <td data-label="AccountId"
                        class="pt-4 pr-3 border-b before:content-['AccountId']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <?php echo $dagence->accountId ?></td>
                    <td data-label="UserName"
                        class="pt-4 pr-3 border-b before:content-['UserName']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <?php echo $dagence->username ?></td>
                    <td data-label="Action"
                        class="pt-4 pr-3 border-b before:content-['Action']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md" id="addBank">
                            <a
                                href="../../../app/views/transaction/deleteTransaction.php?transaction_id=<?= $dagence->transactionId;?>"><i
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
    <!-- ============ Form to Add Transaction ========= -->
    <div>
        <form action="" method="post"
            class="absolute top-[50%] -left-20 md:left-[20%] translate-y-[-50%] bg-white p-5 w-full  md:w-[1000px] rounded-md shadow-sm z-50 hidden"
            id="Add">
            <h1 class="text-center font-semibold text-sm sm:text-xlmy-5">
                Add new Transaction
            </h1>


            <div class="flex gap-5">
                <div class="w-[50%]">
                    <label for="" class="text-sm sm:text-xl">Type</label>
                    <select name="type" id="type"
                        class="block w-full py-3 text-sm sm:text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                        <option value="Debit">Debit</option>
                        <option value="Credit">Credit</option>

                    </select>
                </div>
                <div class="w-[50%]">
                    <label for="" class="text-sm sm:text-xl">Amount</label>
                    <input type="text" name="amount" placeholder="amount"
                        class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100" />
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-[50%]">
                    <label for="" class="text-sm sm:text-xl">Account</label>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#table1').DataTable();
});
$(document).ready(function() {
    $('#table2').DataTable();
});
</script>
</body>

</html>