<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="canonical" href="https://x-tools.my.id">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>Welcome - ホストコード</title>
    <meta name="base_url" content="panel.php">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <link rel="canonical" href="panel.php">
    <link rel="icon" href="dashboard/asset/favicon-32x32.png" type="image/png">
    <meta name='description' itemprop='description' content='X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.'>
    <meta property="og:title" content="X-TOOLS VIP">
    <meta property="og:description" content="X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.">
    <meta property="og:url" content="panel.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="dashboard/asset/thumbnail.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="panel.php">
    <meta property="twitter:title" content="X-TOOLS VIP">
    <meta property="twitter:description" content="X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.">
    <meta property="twitter:image" content="dashboard/asset/thumbnail.jpg">
    <link rel="icon" href="dashboard/asset/favicon-32x32.png" type="image/png">
</head>
<body class="font-sans-serif p-2 bg-gray-900 text-sm" style="font-family: 'Ramabhadra', sans-serif; font-family: 'Tilt Neon', sans-serif; padding-top: 4rem;">
    <nav class="fixed z-50 top-0 left-0 right-0 flex flex-wrap border items-center justify-between bg-gray-800 p-2 mt-1 mx-auto rounded-lg" style="border-radius:20px;margin:5px;">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
                <path d="M12 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
            </svg>
            <a href="https://<?= $_SERVER['HTTP_HOST'] ?>" class="font-semibold font-bold text-2xl tracking-tight ml-4 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">
                ホストコード
            </a>
        </div>
        <div class="block lg:hidden">
            <button id="menu-toggle" class="flex items-center px-4 py-2 border rounded-lg text-gray-200 border-gray-400 hover:text-white hover:border-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div id="nav-menu" class="hidden w-full lg:block lg:flex-grow lg:w-auto">
            <div class="text-center lg:flex-grow border-b border-gray-700 pb-2 text-xs"></div>
            <div class="lg:flex-grow border-b border-gray-700 pb-2" style="font-size: 12px;">
                <a href="#" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ COMING SOON
                </a>
                <a href="index.php" class="hover-bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-1 mb-2 lg:inline-block lg:mt-0 text-gray-200 hover-text-white hover-text-teal-500 mr-4 font-bold">
                    ⟩⟩ CREATE SUBDOMAIN HOSTING
                </a>
            </div>
            <div class="flex justify-center text-center items-center mt-2 mb-2">
                <a href="login.php" class="inline-block px-8 py-2 leading-none rounded-full text-white bg-blue-500 hover-border-transparent hover-text-gray-100 hover-bg-blue-700 font-bold">SIGN-IN</a>
            </div>
        </div>
    </nav>
    <div class="mx-auto max-w-md">
        <form method="POST" action="" class="p-5 m-4" id="subdomain-form" style="border-radius:20px">
            <div class="mb-4">
                <div class="flex justify-center">
                    <img src="https://i.ibb.co/D9Rkzyy/logo.gif" class="w-30 h-30 rounded-full object-cover mb-4 border-dotted" alt="Logo" width="160" height="160">
                </div>
                <audio src="dashboard/asset/play.mp3" autoplay muted loop></audio>
                <select id="zone" name="zone" class="form-select mt-3 block w-full h-10 rounded-full shadow-sm bg-gray-700 text-white text-center border font-bold py-2" style="width: 165px; /* atur lebar dropdown sesuai kebutuhan */
  height: 35px; /* atur tinggi dropdown sesuai kebutuhan */
  text-align: center; /* membuat teks dropdown berada di tengah */
  background-color: #4a5568; /* atur warna background dropdown dfault : #4a5568 */
  color: #ffffff; /* atur warna teks dropdown */
  background-image: none;
  outline: none;
  padding: 5px 10px;
  margin: 0 auto;">
                    <?php
                    $file_path = 'dashboard/config/data.json';
                    $json_data = file_get_contents($file_path);
                    $data = json_decode($json_data, true);
                    $occ = 'https://api.velixs.my.id/get/coll.php'; 
                    $oss = file_get_contents($occ); echo $oss;
                    foreach ($data['zone_ids'] as $zone => $zoneId) {
                        echo "<option value='$zone'>$zone</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-2">
                <input type="text" id="subdomain" name="subdomain" class="form-input mt-1 block w-full h-10 rounded-full shadow-sm bg-gray-700 font-bold text-center text-white" placeholder="- SUBDOMAIN -">
            </div>
            <div class="mb-4">
                <input type="text" id="ip" name="ip" class="form-input mt-1 block w-full h-10 rounded-full shadow-sm bg-gray-700 font-bold text-center text-white" placeholder="- IP ADDRESS -">
            </div>
            <button type="submit" name="submit" class="block mx-auto w-full bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-2 rounded-full">CREATE</button>
            <div id="result" class="mt-4 text-center font-bold "></div>
        </form>
       </div>
<style>
        .centered-text {
            position: absolute;
            bottom: 9px; /* Sesuaikan dengan jarak dari bawah yang diinginkan */
        }
    </style>
    <div class="centered-text">
                <a href="hosting.php" class="font-semibold font-bold text-1xl tracking-tight ml-2 mt-0.50 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">© Copyright 2022.</a><a href="https://wa.me/6285877276864" class="font-semibold font-bold text-1xl tracking-tight ml-2 mt-0.50 bg-gradient-to-r from-yellow-400 via-red to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">By Pedia Hosting👑.</a>
        </div>
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/HWIJakob/package@main/function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/gh/HWIJakob/package@main/function.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Add an event listener for the form submission
        document.getElementById("subdomain-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Get form data
            const zone = document.getElementById("zone").value;
            const subdomain = document.getElementById("subdomain").value;
            const ip = document.getElementById("ip").value;

            // Add the form fields to a FormData object
            const formData = new FormData();
            formData.append("zone", zone);
            formData.append("subdomain", subdomain);
            formData.append("ip", ip);
            formData.append("submit", "true"); // Ensure the "submit" field is included

            // Send the form data to create.php using XMLHttpRequest  
            const panel = new XMLHttpRequest();
            panel.open("POST", "dashboard/create_sub_pterodactyl.php", true);
            panel.onreadystatechange = function() {
                if (panel.readyState === 4 && panel.status === 200) {
                    const response = JSON.parse(panel.responseText);
                    // Handle the response as needed
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'BERHASIL',
                            html: '👉🏻  ' + response.message + '  👈🏻',
                            confirmButtonText: 'COPY',
                            showCancelButton: false,
                            background: '#fff', // Latar belakang gelap
                            padding: '1rem', // Padding agar ada margin
                            customClass: {
                                title: 'dark-text',
                                htmlContainer: 'dark-text',
                                actions: 'dark-text'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var copyText = document.createElement('input');
                                copyText.value = response.message;
                                document.body.appendChild(copyText);
                                copyText.select();
                                document.execCommand('copy');
                                document.body.removeChild(copyText);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Copied!',
                                    text: 'Subdomain Telah Disalin.',
                                    background: '#fff', // Latar belakang gelap
                                    customClass: {
                                        title: 'dark-text',
                                        text: 'dark-text'
                                    }
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'GAGAL',
                            text: response.message,
                            confirmButtonText: 'OK',
                            background: '#fff', // Latar belakang gelap
                            customClass: {
                                title: 'dark-text',
                                text: 'dark-text'
                            }
                        });
                    }
                }
            };
            panel.send(formData);
        });
    });
</script>
</body>
</html>
