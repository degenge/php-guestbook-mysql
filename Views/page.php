<?php


?>

<!DOCTYPE html>
<html lang="en" >

<head >
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer ></script >

    <title >Challenge PHP Guestbook</title >

    <style >
        [x-cloak] {
            display: none;
        }
    </style >

</head >

<body class="" >

<div class="" >

    <?php require 'header.php'; ?>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6" >

        <div class="flex flex-wrap -mx-3 mt-4 mb-2" >

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >

                <?php require 'view_posts.php'; ?>

            </div >

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >
                    <?php require 'form_guestbook.php'; ?>
                </form >

            </div >

        </div >

    </main >

    <?php require 'footer.php'; ?>

</div >

</body >

</html >