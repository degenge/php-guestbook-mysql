<?php

$guestbookItems = Guestbook::getPosts();

foreach ($guestbookItems as $guestbookItem) {
    ?>

    <div class="rounded shadow-lg" >

        <div class="px-6 pt-4 pb-2" >

            <div class="font-bold text-xl mb-2 text-green-500" >
                <?php echo $guestbookItem['title']; ?>
            </div >

            <p class="text-gray-700 text-base" >
                <?php echo $guestbookItem['message']; ?>
            </p >

            <div class="flex flex-wrap -mx-3 mt-4 mb-2" >

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 text-left" >

                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" >
                    <?php echo $guestbookItem['name']; ?>
                </span >

                </div >

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 text-right" >

                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" >
                    <?php echo $guestbookItem['date']; ?>
                </span >

                </div >

            </div >

        </div >

    </div >

    <?php
}
?>