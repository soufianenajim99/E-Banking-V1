<?php

    //  session_start();
    $username = $_SESSION["username"];

?>

<section class="w-[17.5%] h-full bg-[#186F65] text-white">
    <div class="w-[70%] m-auto mt-16">

        <h2 class="rounded-b-lg text-center text-base md:text-xl text-black p-2 font-bold bg-white"><?=$username?></h2>
    </div>
    <div class="w-[70%] m-auto flex flex-col justify-between mt-10 text-black text-xl">
        <a href="index.php?id=<?=$id ?>" class="h-[5vh] bg-white rounded-lg"><button
                class="w-full flex items-center h-full" type="button"><span class="w-[70%] md:w-[20%]"><i
                        class="fa-solid fa-table" style="color: #000;"></i></span><span
                    class=" h-full border-black border-l-8"></span><span
                    class="hidden md:block w-[80%] font-extrabold">Comptes</span></button></a>
        <a href="transaction.php?id=<?=$id ?>" class="h-[5vh] bg-white rounded-lg mt-10"><button
                class="w-full flex items-center h-full" type="button"><span class="w-[70%] md:w-[20%]"><i
                        class="fa-solid fa-arrow-right-arrow-left" style="color: #000;"></i></span><span
                    class=" h-full border-black border-l-8"></span><span
                    class="hidden md:block w-[80%] font-extrabold">Tranasctions</span></button></a>

    </div>
</section>