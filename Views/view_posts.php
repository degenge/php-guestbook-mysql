<?php

//namespace Php_guestbook_mysql;

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

            <div class="text-gray-700 text-base text-left" >
                <blockquote class="relative p-4 text-l italic bg-neutral-100 text-neutral-600 border-neutral-500 quote" >
                    <div class="font-mono absolute leading-none text-gray-500 text-4xl" style="right: 96%; top: 0.75rem;" aria-hidden="true" >&ldquo;</div >
                    <p class="ml-1" ><?php echo $guestbookItem['name']; ?></p >
                </blockquote >
            </div >

            <div class="flex flex-wrap -mx-3 mt-4 mb-2" >

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 text-left" >

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >
                        <button type="submit" id="update" name="update" value="<?php echo $guestbookItem['ID']; ?>"
                                class="bg-green-500 hover:bg-blue-400 text-white  py-2 px-2 rounded-full inline-flex items-center" >
                            <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                            </svg >
                        </button >
                    </form >

                </div >

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 text-center" >

                <span class="inline-block text-sm text-gray-700 align-center" >
                    <?php echo $guestbookItem['date']; ?>
                </span >

                </div >

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 text-right" >

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >
                        <button type="submit" id="delete" name="delete" value="<?php echo $guestbookItem['ID']; ?>"
                                class="bg-green-500 hover:bg-blue-400 text-white  py-2 px-2 rounded-full inline-flex items-center" >
                            <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg >
                        </button >
                    </form >

                </div >

            </div >

        </div >

    </div >

    <?php
}
?>