<?php 

    require_once '../../models/accounts.php';
    require_once '../../models/user.php';
    require_once '../../models/DataProvider.php';
    require_once './check.php';


    // FEtch Users
    $user = new Users();
    $users = $user->displayUser();

    // Fetch Accounts
    $newAccount = new Accounts();
    $Accounts = $newAccount->displayAccounts();
?>



<?php include './aside.php'?>

<!-- ========== End Header =========== -->
<!-- ============ Content ============= -->

<div class="md:p-6 bg-white md:m-5">
    <div class="flex items-center justify-between">

        <div>
            <button class="bg-[#186F65] text-white w-[160px] h-[50px] rounded-md" id="addBank">
                Add Account
            </button>
        </div>
    </div>

    <!-- ========== table-Banks-desktop ======== -->

    <div class="hidden md:block rounded-lg overflow-hidden mt-10">
        <table class="w-full " id="table1">
            <thead class="">
                <tr class="bg-[#186F65] text-white h-[60px]">
                    <th class="">AccountID</th>
                    <th class="">Balance</th>
                    <th class="">R.I.B</th>
                    <th class="">Account owner</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="h-[50px]">
                    <?php foreach($Accounts as $account) { ?>


                    <td class="text-center"><?php echo $account->accountId ?></td>
                    <td class="text-center"><?php echo $account->balance ?></td>
                    <td class="text-center"><?php echo $account->RIB ?></td>

                    <?php
                                            $db = new DataProvider();
                                            $db_connect = $db->connect();
                                            if ($db_connect == null) {
                                                return null;
                                            }
                                            $sql = "SELECT * FROM users WHERE userId = $account->userId";

                                            $stmt = $db_connect->query($sql);
                                            $stmt->execute();

                                            $usernames = $stmt->fetchAll(PDO::FETCH_OBJ);

                                        
                                        ?>

                    <?php foreach($usernames as $username)  { ?>
                    <td class="text-center"><?= $username->username  ?></td>


                    <?php   } ?>


                    <td class="text-center">
                        <a href="../../controllers/accounts/update_account.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px] "
                            onclick="updateForm()">
                            <i class="fa-solid fa-pen" style="color:#186F65"></i>
                        </a>
                        <a href="../../controllers/accounts/delete_account.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                            <i class="fa-solid fa-trash" style="color:#186F65"></i>
                        </a>
                        <a href="../accounts/acc_trans.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                            <i class="fa-solid fa-right-left" style="color:#186F65"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <!-- ========== table-Banks-mobile ======== -->
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
                <?php foreach($Accounts as $account) { 
                    ?>

                <tr class=" block pt-10   w-full">



                    <td data-label="AccountID"
                        class="pt-4 pr-3 border-b before:content-['AccountID']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                        <?php echo $account->accountId ?></td>
                    <td data-label="Balance"
                        class="pt-4 pr-3 border-b before:content-['Balance']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                        <?php echo $account->balance ?></td>
                    <td data-label="RIB"
                        class="pt-4 pr-3 border-b before:content-['RIB']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2   block    text-right">
                        <?php echo $account->RIB ?></td>

                    <?php
                                            $db = new DataProvider();
                                            $db_connect = $db->connect();
                                            if ($db_connect == null) {
                                                return null;
                                            }
                                            $sql = "SELECT * FROM users WHERE userId = $account->userId";

                                            $stmt = $db_connect->query($sql);
                                            $stmt->execute();

                                            $usernames = $stmt->fetchAll(PDO::FETCH_OBJ);

                                        
                                        ?>

                    <?php foreach($usernames as $username)  { ?>
                    <td data-label="AccountOwner"
                        class="pt-4 pr-3 border-b before:content-['Acount-Owner']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2  block    text-right">
                        <?= $username->username  ?></td>


                    <?php   } ?>


                    <td data-label="Action"
                        class="pt-4 pr-3 border-b before:content-['Action']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2  block    text-right">
                        <a href="../../controllers/accounts/update_account.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px] "
                            onclick="updateForm()">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="../../controllers/accounts/delete_account.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="../accounts/acc_trans.php?id=<?php echo $account->accountId ?>"
                            class="bg-[#B5CB99] text-white w-[35px] h-[35px] rounded-md inline-block leading-[35px]">
                            <i class="fa-solid fa-right-left"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


    <!--============Form to add Accounts=========-->

    <div>
        <form action="../../controllers/accounts/add_account.php" method="post"
            class="absolute  -left-20 top-[50%] md:left-[35%] translate-y-[-50%] bg-white p-5 w-[80%] md:w-[500px] rounded-md shadow-sm z-50 hidden"
            id="Add">

            <h1 class="text-center font-semibold text-base md:text-xl my-5">

                Add Account
            </h1>

            <div class="">
                <label for="" class="text-base md:text-xl">Balance</label>
                <input type="text" name="Balance"
                    class="block w-full py-3 text-base md:text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Balance " />
            </div>
            <!-- <div class="">
                <label for="" class="text-base md:text-xl">R.I.B</label>
                <input type="text" name="rib"

                    class="block w-full py-3 text-base md:text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"

                    placeholder="Enter R.I.B" />
            </div> -->
            <!-- ========= fetch users ======= -->



            <div>
                <label for="" class="text-base md:text-xl">Account owner</label>
                <select name="accountOwner" id=""
                    class="block w-full py-3 text-base md:text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                    <option value="">Select Account owner :</option>
                    <?php 
                                            foreach($users as $user) {
                                                echo "
                                                <option value='$user->userId'>$user->username</option>
                                                ";
                                            }   
                                        ?>


                </select>
            </div>

            <div>
                <input type="submit" name="submit"
                    class="block w-full py-3 text-white text-base md:text-xl px-1 cursor-pointer mt-5 outline-none border-none bg-slate-900" />

            </div>
        </form>
    </div>
    <!-- ============ Form to Add Accounts ========= -->

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