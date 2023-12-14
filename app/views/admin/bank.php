<?php

    require_once("../../controllers/bank/controller.php");
    require_once './check.php';

    // var_dump($banks);

?>

<?php include './aside.php'?>
<!-- ========== End Header =========== -->
<!-- ============ Content ============= -->
<div class="p-6 bg-white m-5">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-orange-600 text-3xl font-bold tracking-widest mb-2">
                Bank


            </h3>
            <p class="text-xl">Our Banks around The world</p>
        </div>
        <div>
            <?php if( $_SESSION["role"] == "admin" ) {  ?>
            <button class="bg-[#186F65] text-white w-[160px] h-[50px] rounded-md" id="addBank">
                Add Bank
            </button>
            <?php } ?>
        </div>
    </div>
    <!-- ========== table Banks ======== -->
    <div class="rounded-lg overflow-hidden mt-10">
        <table class="w-full table-auto" id="table1">
            <thead class="">
                <tr class="bg-[#186F65] text-white h-[60px]">
                    <th class="">ID</th>
                    <th class="">Denomination</th>
                    <th class="">Logo</th>

                    <?php if( $_SESSION["role"] =="admin" ) {  ?>
                    <th class="">Actions</th>
                    <?php } ?>

                </tr>
            </thead>
            <tbody>
                <?php foreach($banks as $bank): ?>
                <tr class="h-[50px]">
                    <td class="text-center"><?=$bank->bankId?></td>
                    <td class="text-center"><?=$bank->name?></td>
                    <td class="text-center" style="width: 25%;"><img src="<?=$bank->logo?>" alt="" width="200"></td>
                    <?php if( $_SESSION["role"] =="admin" ) {  ?>
                    <td class="text-center">

                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md" onclick="">
                            <a href=<?php echo "Bank.php?id=" . $bank->bankId ?>><i class="fa-solid fa-pen"></i></a>
                        </button>
                        <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md" id="addBank">
                            <a href=<?php echo "../../controllers/bank/controller.php?bankId=" . $bank->bankId ?>><i
                                    class="fa-solid fa-trash"></i></a>
                        </button>

                    </td>
                    <?php } ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- ============ Form to add New Bank ========= -->
    <div>
        <form action="../../controllers/bank/controller.php" method="post"
            class="absolute top-[50%] left-[30%] translate-y-[-50%] bg-white p-5 w-[650px] rounded-md shadow-sm z-50 hidden"
            id="Add" enctype="multipart/form-data">
            <div>
                <label for="" class="text-xl ">Denomination</label>
                <input type="text" name="name"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    placeholder="Enter Dènomination ">
            </div>
            <div>
                <label for="" class="text-xl ">Image</label>
                <input type="file" name="image"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
            </div>
            <input type="text" name="mode"
                class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100 hidden"
                value="add">
            <div>
                <input type="submit" name="submit"
                    class="block w-full py-3 text-white text-xl px-1 cursor-pointer my-2 outline-none border-none bg-slate-900">
            </div>
        </form>
    </div>
    <!-- ============ Form to add New Bank ========= -->

    <!-- ============ Form to Edit Bank ========= -->
    <div>
        <?php if(isset($_GET['id'])) { ?>
        <form action="../../controllers/bank/controller.php" method="post"
            class="absolute top-[50%] left-[30%] translate-y-[-50%] bg-white p-5 w-[650px] rounded-md shadow-sm z-50"
            id="Edit" enctype="multipart/form-data">
            <div>
                <?php foreach($banks as $bank): ?>
                <?php if($bank->bankId == $_GET['id']){ ?>
                <label for="" class="text-xl ">Denomination</label>
                <input type="text" name="name"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100"
                    value=<?=$bank->name?>>
                <input type="text" name="id"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100 hidden"
                    value=<?=$bank->bankId?>>
                <?php } ?>
                <?php endforeach; ?>
                <input type="text" name="mode"
                    class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100 hidden"
                    value="edit">
                <div>
                    <label for="" class="text-xl ">Image</label>
                    <input type="file" name="image"
                        class="block w-full py-3 text-xl px-1 placeholder:text-lg my-2 outline-none border-none bg-gray-100">
                </div>
            </div>
            <div>
                <input type="submit" name="submit" value="Edit"
                    class="block w-full py-3 text-white text-xl px-1 cursor-pointer my-2 outline-none border-none bg-slate-900">
            </div>
        </form>
        <?php } ?>
    </div>
    <!-- ============ Form Edit Bank ========= -->
</div>
<!-- ============ Content ============= -->

</main>
<!-- ========== overlay ================= -->
<div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0 hidden" id="overlayAdd"></div>
<?php if(isset($_GET['id'])) { ?>
<div class="bg-black bg-opacity-60 w-full h-[100vh] absolute top-0 left-0" id="overlayEdit" onclick="updateForm()">
</div>
<?php } ?>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#table1').DataTable();
});
</script>
</body>

</html>