<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: ../login.php");
    exit;
}
// Tampilkan halaman dashboard jika session login ditemukan

$config_file = file_get_contents('config/data.json');
$config = json_decode($config_file, true);

$api_token = $config['api_token']; // Mendapatkan API token yang telah di-hash
$zone_ids = $config['zone_ids']; // Daftar zone_ids
$entries = isset($_GET['entries']) ? intval($_GET['entries']) : 25; // Jumlah entri per halaman
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Halaman saat ini
$start = ($page - 1) * $entries; // Index data awal untuk halaman ini

// Inisialisasi daftar subdomain
$subdomains = [];

// Loop melalui setiap zone_id
foreach ($zone_ids as $zone_id) {
    $url = 'https://api.cloudflare.com/client/v4/zones/' . $zone_id . '/dns_records?type=A&proxied=true';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Authorization: Bearer " . $api_token,
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    // For debugging purposes only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    $p = json_decode($resp, true);

    // Tambahkan subdomain dari hasil API ke daftar subdomain
    foreach ($p['result'] as $item) {
        $subdomains[] = $item;
    }
}

$total = count($subdomains); // Total data di database
$total_pages = ceil($total / $entries); // Total halaman yang diperlukan

// Batasi index data akhir agar tidak melebihi jumlah data di database
$end = $start + $entries;
if ($end > $total) {
    $end = $total;
}

// Jika tombol delete ditekan
if (isset($_POST['delete'])) {
    $ids = $_POST['delete_list'];
    
    foreach ($ids as $id) {
        // Loop melalui setiap zone_id untuk menghapus subdomain
        foreach ($zone_ids as $zone_id) {
            $url = 'https://api.cloudflare.com/client/v4/zones/' . $zone_id . '/dns_records/' . $id;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Authorization: Bearer " . $api_token,
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            // For debugging purposes only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);
        }
    }

    // Redirect kembali ke halaman ini setelah penghapusan
    header("Location: " . $_SERVER['PHP_SELF'] . "?page=" . $page);
    exit();
}

?>
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
    <title>Dashboard - ホストコード</title>
    <meta name="base_url" content="index.php">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="index.php">
    <link rel="icon" href="asset/favicon-32x32.png" type="image/png">
    <meta name='description' itemprop='description' content='X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.'>
    <meta property="og:title" content="X-TOOLS VIP">
    <meta property="og:description" content="X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.">
    <meta property="og:url" content="index.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="asset/thumbnail.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="index.php">
    <meta property="twitter:title" content="X-TOOLS VIP">
    <meta property="twitter:description" content="X-TOOLS VIP adalah sebuah website untuk membuat sebuah subdomain yang dapat digunakan untuk melakukan pointing ip server hosting anda ke subdomain kami.">
    <meta property="twitter:image" content="asset/thumbnail.jpg">
    <link rel="icon" href="asset/favicon-32x32.png" type="image/png">
</head>
<body class="font-sans-serif p-2 bg-gray-900 text-sm" style="font-family: 'Ramabhadra', sans-serif;
font-family: 'Tilt Neon', sans-serif; padding-top: 2rem;">
<nav class="fixed z-50 top-0 left-0 right-0 flex flex-wrap border items-center justify-between bg-gray-800 p-2 mt-1 mx-auto rounded-lg" style="border-radius:20px;margin:5px;">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
            <path d="M12 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
        </svg>
        <a href="../" class="font-semibold font-bold text-2xl tracking-tight ml-4 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">
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
                <a href="../" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ CREATE SUBDOMAIN HOSTING
                </a>
                <a href="../panel.php" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-1 mb-2 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ CREATE SUBDO PANEL PTERODACTYL
                </a>
                <a href="update.php" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-1 mb-2 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ UPDATE DATA
                </a>
            </div>
            <div class="flex justify-center text-center items-center mt-2 mb-4">
                <a href="logout.php" class="inline-block px-8 py-2 leading-none rounded-full text-white bg-red-500 hover:border-transparent hover:text-gray-100 hover:bg-red-700 font-bold">LOGOUT</a>
            </div>
        </div>
</nav>
    <div class="container mx-auto mt-4 p-5">
        <div class="flex justify-between">
            <h1 class="text-3xl text-white font-bold">DNS Records</h1>            
            <div class="relative">
                <form action="#" method="get" id="search-form">
    <div class="relative flex items-center">
        <input type="text" name="search" placeholder="Cari subdomain..." class="w-full rounded-full border-2 border-gray-700 focus:ring-2 focus:ring-gray-700 focus:border-transparent px-4 py-2" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" oninput="search()">
        <button type="button" id="search-button" class="search-btn absolute right-0 top-0 bottom-0 bg-gray-700 border border-gray-700 text-white px-4 py-2 rounded-full" onclick="submitSearch()">
            <i class="fa-solid fa-search"></i>
        </button>
    </div>
</form>
   

<script>
    const searchInput = document.querySelector('input[name="search"]');
    const searchButton = document.querySelector('.search-btn');
    const searchForm = document.getElementById('search-form');
    const searchResults = document.getElementById('search-results');
    
    function search() {
        const searchTerm = searchInput.value;

        if (searchTerm !== '') {
            searchButton.classList.remove('hidden');
        } else {
            searchButton.classList.remove('hidden');
        }
    }

    function submitSearch() {
        searchForm.submit();
    }

    // Event listener untuk input pencarian
    searchInput.addEventListener('input', search);

    // Event listener untuk tombol "Search"
    searchButton.addEventListener('click', submitSearch);
</script>

            </div>
        </div>
        <form action="#" method="post" class="mt-5">
            <div class="flex text-center justify-center items-center mb-4 p-2 bg-gray-800 rounded-full border border-gray-100">
                <div class="text-center items-center">
                    <span class="text-white ">Show |</span>
                    <select id="datatable-length" class="bg-gray-600 font-bold text-center text-white justify-center items-center rounded-lg border border-gray-100" style="width:100px; height:30px; appearance: none; -webkit-appearance: none; -moz-appearance: none; background-image: none;">
                        <option value="25" <?= isset($_GET['entries']) && $_GET['entries'] == 25 ? 'selected' : '' ?>>25</option>
                        <option value="40" <?= isset($_GET['entries']) && $_GET['entries'] == 40 ? 'selected' : '' ?>>40</option>
                        <option value="65" <?= isset($_GET['entries']) && $_GET['entries'] == 65 ? 'selected' : '' ?>>65</option>
                        <option value="100" <?= isset($_GET['entries']) && $_GET['entries'] == 100 ? 'selected' : '' ?>>100</option>
                        <option value="150" <?= isset($_GET['entries']) && $_GET['entries'] == 150 ? 'selected' : '' ?>>150</option>
                        <option value="200" <?= isset($_GET['entries']) && $_GET['entries'] == 200 ? 'selected' : '' ?>>200</option>
                    </select>
                    <span class="text-white">| Entries</span>
                </div>
            </div>
            <script>
                var selectBox = document.getElementById("datatable-length");
                selectBox.addEventListener("change", function() {
                    // Get the selected value from the select box
                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                    // Perform any necessary actions based on the selected value
                    console.log("Selected value:", selectedValue);
                    // For example, you could submit a form or make an AJAX request to fetch new data

                    // Reload the page with the new entries value
                    window.location.search = '?entries=' + selectedValue;
                });
            </script>
        </form>
        <form method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus subdomain yang dipilih ?')">
            <div class="flex justify-center text-center mt-4 mb-4">
                <button type="submit" name="delete" class="bg-red-500 hover:bg-transparent text-white border-gray-100 font-bold px-10 py-2 rounded-full">HAPUS</button>
            </div>
            <div class="overflow-x-auto border-2 border-gray-100 mt-2 rounded-lg">
                <table class="table-auto border-collapse bg-gray-100 border border-gray-100 w-full">
                    <thead>
                        <tr class="bg-gray-800 text-gray-100 justify-center text-center">
                            <th class="px-3 py-2 text-left whitespace-nowrap border border-gray-100 rounded-lg">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="select_all" id="select_all">
                                </label>
                            </th>
                            <th class="px-3 py-2 text-center border border-gray-100 rounded-lg">SUBDOMAIN</th>
                            <th class="px-3 py-2 text-left border border-gray-100 rounded-lg">IP ADDRESS</th>
                            <th class="px-3 py-2 text-left border border-gray-100 rounded-lg">TYPE</th>
                            <th class="px-3 py-2 text-left border border-gray-100 rounded-lg">PROXY</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
$search_term = isset($_GET['search']) ? $_GET['search'] : '';

for ($i = $start; $i < $end; $i++) {
    $item = $subdomains[$i];
    if ($search_term == '' || stripos($item['name'], $search_term) !== false) {
        ?>
                        <tr class="bg-gray-700 text-gray-100 justify-center text-center">
                            <td class="px-3 py-2 text-left whitespace-nowrap border border-gray-600 rounded-lg">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="delete_list[]" value="<?= $item['id'] ?>">
                                </label>
                            </td>
                            <td class="px-4 py-2 text-left border border-gray-600 rounded-lg overflow-hidden">
    <a href="https://<?= $item['name'] ?>" class="text-blue-400 truncate" style="text-decoration: none;" target="_blank"><?= $item['name'] ?></a>
</td>
<td class="px-4 py-2 text-left border border-gray-600 rounded-lg overflow-hidden">
    <span class="truncate"><?= $item['content'] ?></span>
</td>
<td class="px-4 py-2 text-left text-center border border-gray-600 rounded-lg overflow-hidden">
    <span class="truncate"><?= $item['type'] ?></span>
</td>
<td class="px-4 py-2 text-left text-center border border-gray-600 rounded-lg overflow-hidden">
    <span class="truncate"><?= $item['proxied'] ? 'Yes' : 'No' ?></span>
</td>
                        </tr>
                        <?php
    }
}
?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
            <div class="flex justify-center items-center">
    <div class="flex items-center">
        <span class="mx-1 text-white">Showing <?= $start ?> to <?= $end ?> of <?= $total ?> Entries</span>
    </div>
</div>
<div class="flex items-center justify-center my-4">
    <div id="pagination" class="flex items-center justify-center">
        <?php if ($page > 1) : ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=1&entries=<?= $entries ?>" class="block bg-white border border-gray-500 gradient-text font-bold rounded-lg w-10 h-10 flex items-center justify-center <?= $page == 1 ? 'text-blue-500' : '' ?>">1</a>
            <?php if ($page > 2) : ?>
                <span class="block bg-gray-200 gradient-text border rounded-md w-10 h-10 font-bold text-center">...</span>
            <?php endif; ?>
        <?php endif; ?>
        <?php
        $startPage = max(1, $page - 2);
        $endPage = min($total_pages, $page + 2);
        for ($i = $startPage; $i <= $endPage; $i++) :
        ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $i ?>&entries=<?= $entries ?>" class="block bg-white border border-gray-500 gradient-text font-bold rounded-lg w-10 h-10 flex items-center justify-center <?= $page == $i ? 'text-blue-500' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
        <?php if ($page < $total_pages) : ?>
            <?php if ($page < $total_pages - 1) : ?>
                <span class="block bg-gray-200 gradient-text border rounded-md w-10 h-10 font-bold text-center">...</span>
            <?php endif; ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $total_pages ?>&entries=<?= $entries ?>" class="block bg-white border border-gray-500 gradient-text font-bold rounded-lg w-10 h-10 flex items-center justify-center <?= $page == $total_pages ? 'text-blue-500' : '' ?>"><?= $total_pages ?></a>
        <?php endif; ?>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/gh/HWIJakob/package@main/select.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/HWIJakob/package@main/function.js"></script>
    
        </div>
         <div style="height: 10vh; display: flex; flex-direction: column; justify-content: flex-end;">
                <h1 href="hosting.php" class="font-semibold font-bold text-1xl tracking-tight ml-2 mt-0.50 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">© Copyright 2022.</h1><a href="https://wa.me/6285877276864" class="font-semibold font-bold text-1xl tracking-tight ml-2 mt-0.50 bg-gradient-to-r from-yellow-400 via-red to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">By Pedia Hosting👑.</a>
        </div>
</body>
</html>