<?php
session_start();
// Cek apakah pengguna sudah login
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  // Jika sudah login, redirect ke halaman dashboard
  header('Location: dashboard/');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Ambil data dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Ambil data username dan password dari file json
  $data = file_get_contents('dashboard/config/data.json');
  $users = json_decode($data, true)['users'];

  // Cek apakah username ditemukan
  $userFound = false;
  $hashedPassword = '';

  foreach ($users as $user) {
    if ($username === $user['username']) {
      $userFound = true;
      $hashedPassword = $user['password'];
      break;
    }
  }

  if ($userFound && password_verify($password, $hashedPassword)) {
    // Login sukses, redirect ke dashboard
    $_SESSION["login"] = true; // membuat session login
    header('Location: dashboard/');
    exit;
  } else {
    // Login gagal, tampilkan pesan error
    $error = 'Invalid username or password';

    // Redirect ke halaman login lagi
    header("Location: ".$_SERVER['PHP_SELF']."?error=".urlencode($error));
    exit;
  }
}
// Jika belum login atau login salah, tampilkan halaman login
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Login Dashboard - ホストコード</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>
<body class="bg-gradient-to-br from-gray-800 bg-gray-900" style="font-size:13px;   
                   font-family: 'Open Sans', sans-serif;">
  <div id="login-modal" class="absolute top-0 left-0 w-full h-full flex justify-center items-center p-5">
    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-14 border-2 border-gray-800 ">
    	<div class="flex justify-center">
  <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>">
    <img src="dashboard/asset/logo.gif" class="w-30 h-30 rounded-full object-cover mb-4" alt="Logo" width="160" height="160">
  </a>
</div>
      <h2 class="text-2xl font-bold mb-8 text-center text-white">- LOGIN ADMIN -</h2>
      <?php if (isset($error)) { ?>
        <div class="bg-red-400 border justify-content-center text-center text-white font-bold rounded-lg mb-6">
          <?php echo $error; ?>
        </div>
      <?php } ?>
      <form action="" method="post">
        <div class="mb-2">
          <input class="bg-gray-900 font-bold text-center border-2 border-gray-800 rounded-lg py-3 px-10 text-gray-300 leading-tight focus:outline-none focus:border-teal-500 w-full" id="username" type="text" name="username" placeholder="USERNAME ">
        </div>
        <div class="mb-4">
          <input class="bg-gray-900 font-bold text-center border-2 border-gray-800 rounded-lg py-3 px-10 text-gray-300 leading-tight focus:outline-none focus:border-teal-500 w-full" id="password" type="password" name="password" placeholder="PASSWORD">
        </div>
        <div class="flex justify-center">
          <button class="bg-blue-500 hover:bg-teal-700 text-white font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline border border-gray-100" type="submit">
            MASUK
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
