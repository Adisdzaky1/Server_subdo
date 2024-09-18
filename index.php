<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Pilih Jenis Subdomaim - ホストコード</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>
<body class="bg-gradient-to-br from-gray-830 bg-gray-900" style="font-size:13px;   
                   font-family: 'Open Sans', sans-serif;">
  <div id="login-modal" class="absolute top-0 left-0 w-full h-full flex justify-center items-center p-5">
    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-14 border-2 border-gray-800 ">
    	<div class="flex justify-center">
  <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>">
    <img src="dashboard/asset/logo.gif" class="w-30 h-30 rounded-full object-cover mb-4" alt="Logo" width="160" height="160">
  </a>
</div>
      <h2 class="text-2xl font-bold mb-8 text-center text-white">- PILIH OPSI -</h2>
        <div class="bg-red-400 border justify-content-center text-center text-white font-bold rounded-lg mb-6">
      </div>
      <form action="" method="post">
            <div class="flex justify-center text-center items-center mt-2 mb-2">
                <a href="hosting.php" class="inline-block px-8 py-2 leading-none rounded-full text-white bg-blue-500 hover-border-transparent hover-text-gray-100 hover-bg-blue-700 font-bold">CREATE SUBDOMAIN HOSTING</a>
        </div>
        <div class="flex justify-center text-center items-center mt-2 mb-2">
                <a href="panel.php" class="inline-block px-8 py-2 leading-none rounded-full text-white bg-blue-500 hover-border-transparent hover-text-gray-100 hover-bg-blue-700 font-bold">CREATE SUBDOMAIN PTERODACTYL</a>
        </div>
         <div class="flex justify-center text-center items-center mt-2 mb-5">
                <a href="panel.php" class="inline-block px-8 py-2 leading-none rounded-full text-white bg-blue-500 hover-border-transparent hover-text-gray-100 hover-bg-blue-700 font-bold">CREATE SHORTLINK URL WEB</a>
        </div>
        <div class="flex justify-center">
                <a href="login.php" class="bg-blue-500 hover:bg-teal-700 text-white font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline border border-gray-100">
            👑 LOGIN 👑</a>
          </button>
       </div>
      </form>
    </div>
  </div>
</body>
</html>
