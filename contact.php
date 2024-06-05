<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>
<body>
   <nav class="border-gray-200 bg-[#F1F1F1] z-[21]">
       <div class="max-w-screen-xl flex items-center mx-auto px-[20px] py-5 justify-center">
           <div>
               <ul class="font-medium items-center bg-[#F1F1F1] flex p-4 md:p-0 space-x-8 justify-start">
                   <li class="bg-[#F1F1F1]">
                       <a href="index.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Add contact</a>
                   </li>
                   <li class="bg-[#F1F1F1]">
                       <a href="contact.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">All contact</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
   <section>
       <div class="m-[100px] my-[50px]">
           <div id="contacts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
           </div>
           <div class="flex justify-center mt-4">
               <button id="loadMore" class="bg-blue-500 text-white px-4 py-2 rounded">Load More</button>
           </div>
       </div>
   </section>
   <script src="script.js"></script>
</body>
</html>