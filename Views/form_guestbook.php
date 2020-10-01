<div class="flex flex-wrap -mx-3 mb-1" >

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
        <label for="name-first" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >First Name</label >
        <input type="text" id="name-first" name="name-first" value="<?php echo $nameFirst; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameFirstError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $nameFirstError; ?>
    </div >

    <div class="w-full md:w-1/2 px-3" >
        <label for="name-last" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Last Name</label >
        <input type="text" id="name-last" name="name-last" value="<?php echo $nameLast; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameLastError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $nameLastError; ?>
    </div >

</div >

<div class="flex flex-wrap -mx-3 mb-1" >
    <div class="w-full px-3" >
        <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" > Title </label >
        <input type="text" id="title" name="title" value="<?php echo $title; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($titleError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $titleError; ?>
    </div >
</div >

<div class="flex flex-wrap -mx-3 mb-1" >
    <div class="w-full px-3" >
        <label for="message" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" > Message </label >
        <textarea id="message" name="message" rows="4" cols="50"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($messageError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" ><?php echo $message; ?></textarea >
        <?php echo $messageError; ?>
    </div >
</div >

<div class="flex flex-wrap -mx-3 mb-1" >

    <div class="w-full px-3 text-center" >
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <?php $buttonText = (isset($_POST['update'])) ? "Update" : "Post"; ?>
        <button type="submit" id="submit" name="submit" value="<?php echo strtolower($buttonText); ?>"
                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
            <?php echo $buttonText; ?>
        </button >
    </div >

</div >