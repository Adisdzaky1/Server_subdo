

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
<body class="font-sans-serif p-4 bg-gray-900 text-sm" style="font-family: 'Ramabhadra', sans-serif;
font-family: 'Tilt Neon', sans-serif; padding-top: 5rem;">
<nav class="fixed z-50 top-0 left-0 right-0 flex flex-wrap border items-center justify-between bg-gray-800 p-2 mt-1 mx-auto rounded-lg" style="border-radius:20px;margin:5px;">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
            <path d="M12 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
        </svg>
        <a href="" class="font-semibold text-2xl tracking-tight ml-4 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">
            ホストコード
        </a>
    </div>
    <div class="block lg:hidden">
        <button id="menu-toggle" class="flex items-center px-4 py-2 border rounded-lg text-gray-200 border-gray-400 hover:text-white hover:border-white">
    <i class="fas fa-bars"></i> 
</button>
    </div>
    <div id="nav-menu" class="hidden w-full lg:block lg:flex-grow lg:w-auto" style="font-size: 12px;">
    	<div class="text-center lg:flex-grow border-b border-gray-700 pb-2 text-xs"></div>
            <div class="lg:flex-grow border-b border-gray-700 pb-2">
                <a href="../" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ CREATE SUBDOMAIN HOSTING
                </a>
            </div>
                <div class="lg:flex-grow border-b border-gray-700 pb-2">
                <a href="../panel.php" class="hover:bg-transparent block w-full border-gray-100 border py-2 px-6 rounded-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:text-teal-500 mr-4 font-bold">
                    ⟩⟩ CREATE SUBDOMAIN PTERODACTYL
                </a>
            </div>
            <div class="flex justify-center text-center items-center mt-2 mb-1">
                <a href="index.php" class="inline-block px-8 py-2 leading-none w-full rounded-full text-white bg-blue-500 hover:border-transparent hover:text-gray-100 hover:bg-blue-700 font-bold">BACK</a>
                </div>
                <div class="flex justify-center text-center items-center mb-2">
                <a href="logout.php" class="inline-block px-8 py-2 leading-none w-full rounded-full text-white bg-red-500 hover:border-transparent hover:text-gray-100 hover:bg-red-700 font-bold">LOGOUT</a>
            </div>
        </div>
</nav>
    <style>
        @media screen and (max-width: 800px) {
            .bg-red-400,
            .bg-green-400,
            .bg-gray-800 {
                border-radius: 20px;
                padding: 8px;
                margin: 4px;
                button.rounded-sm {
                    border-radius: 10px;
                }
                button.text-sm {
                    font-size: 0.875rem;
                    line-height: 1rem;
                }
                .bg-green-uuu {
                    background-color: #48bb78;
                    width: auto;
                    display: inline-block;
                    margin-right: 10px;
                    border-radius: 5px;
                }
    </style>
    
<div class="max-w-full mx-auto bg-gray-800 text-white text-center rounded-lg shadow-lg p-6 mt-14" style="margin-top: 2%">
    <form method="POST" class="p-5 space-y-3">
        <label for="api_token" class="block font-bold mb-2 text-xl">-- MENU SETTING WEB --</label>
        <input type="text" name="api_token" id="api_token"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="Api Token">
        <input type="text" name="username" id="username"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="Username">
        <input type="password" name="password" id="password"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="Password">
        <div class="flex items-center justify-center">
            <input type="submit" name="submit" value="UPDATE"
                class="bg-blue-600 hover:bg-gray-700 border text-white font-bold py-2 px-8 rounded-full focus:outline-none focus:shadow-outline transition duration-200 mb-4">
        </div>
    </form>
    <?php
function generateHash($password) {
    
    $options = ['cost' => 12];

    
    return password_hash($password, PASSWORD_BCRYPT, $options);
}
    if(isset($_POST["submit"])) {
            $data_path = 'config/data.json';
            $data = json_decode(file_get_contents($data_path), true);
            $api_token = $_POST["api_token"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!empty($api_token)) {
                $data["api_token"] = $api_token;
            }
            if (!empty($username)) {
                $data["users"][0]["username"] = $username;
            }
            if (!empty($password)) {
                // Generate hash from the password and save it
                $hashedPassword = generateHash($password);
                $data["users"][0]["password"] = $hashedPassword;
            }

            if (file_put_contents($data_path, json_encode($data))) {
                echo '<b><span class="success">|| DATA BERHASIL DIPERBARUI ||</span></b>';
            } else {
                echo '<span class="error">GAGAL MEMPERBARUI DATA. SILAKAN COBA LAGI NANTI.</span>';
            }
        }
    ?>
</div>
<div class="max-w-full mx-auto bg-gray-800 text-white text-center rounded-lg shadow-lg p-6 mt-6">
    <form method="POST" class="p-5 space-y-3">
        <label for="domain" class="block font-bold mb-5 text-xl">-- UPDATE ZONE IDs --</label>
        <select name="domain" id="domain"
            class="block w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight text-center focus:outline-none focus:shadow-outline transition duration-200">
            <option value="" disabled selected>- Select Domain -</option>
            <?php
            $file_path = 'config/data.json';
            $json_data = file_get_contents($file_path);
            $data = json_decode($json_data, true);
            foreach ($data['zone_ids'] as $zone => $zoneId) {
                echo "<option value='$zone'>$zone</option>";
            }
            ?>
        </select>
        <input type="text" name="new_zone_ids" id="new_zone_ids"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="New Zone IDs">
        <div class="flex items-center justify-center space-x-4">
            <input type="submit" name="update_domain_zone" value="UPDATE ZONE IDs"
                class="mt-4 bg-blue-600 hover:bg-gray-700 border text-white font-bold py-2 px-4 rounded-full focus:outline-none text-center focus:shadow-outline transition duration-200 mx-auto block">
        </div>
    </form>
    <?php
    if (isset($_POST["update_domain_zone"])) {
        $selected_domain = $_POST["domain"];
        $new_zone_ids = $_POST["new_zone_ids"];
        if (!empty($selected_domain)) {
            if (isset($data["zone_ids"][$selected_domain])) {
                // Update zone IDs logic
                $data["zone_ids"][$selected_domain] = $new_zone_ids;
                // Save data back to data.json
                if (file_put_contents($file_path, json_encode($data))) {
                    echo '<b><span class="success">|| DATA BERHASIL DIPERBARUI ||</span></b>';
                } else {
                    echo '<span class="error">GAGAL MEMPERBARUI DATA. SILAKAN COBA LAGI NANTI.</span>';
                }
            } else {
                echo '<span class="error">Domain not found.</span>';
            }
        } else {
            echo '<span class="error">Please select a domain to update.</span>';
        }
    }
    ?>
</div>

<div class="max-w-full mx-auto bg-gray-800 text-white text-center rounded-lg shadow-lg p-6 mt-6">
    <form method="POST" class="p-5 space-y-3">
        <label for="domain" class="block font-bold mb-5 text-xl">-- ADD DOMAIN & ZONE --</label>
        <input type="text" name="new_domain" id="new_domain"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="New Domain">
        <!-- Perbaikan: Menambahkan atribut "name" yang hilang pada elemen input zone_ids -->
        <input type="text" name="zone_ids" id="zone_ids"
            class="w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight focus:outline-none focus:shadow-outline transition text-center duration-200"
            placeholder="Zone IDs">
        <input type="submit" name="add_domain_zone" value="ADD DOMAIN & ZONE"
            class="mt-4 bg-green-600 hover:bg-green-700 border text-white font-bold py-2 px-4 rounded-full focus:outline-none text-center focus:shadow-outline transition duration-200 mx-auto block">
    </form>
    <?php
    $data_path = 'config/data.json'; // Define the data path
    $data = json_decode(file_get_contents($data_path), true); // Read data from JSON

    if (isset($_POST["add_domain_zone"])) {
        $new_domain = $_POST["new_domain"];
        $new_zone_ids = $_POST["zone_ids"];
        // Add domain logic
        if (!empty($new_domain) && !empty($new_zone_ids)) {
            $data["zone_ids"][$new_domain] = $new_zone_ids;
            // Save data back to data.json
            if (file_put_contents($data_path, json_encode($data))) {
                echo '<b><span class="success">|| DATA BERHASIL DITAMBAHKAN ||</span></b>';
            } else {
                echo '<span class="error">GAGAL MENAMBAHKAN DATA. SILAKAN COBA LAGI NANTI.</span>';
            }
        } else {
            echo '<span class="error">Isi semua kolom untuk menambahkan data.</span>';
        }
    }
    ?>
</div>

<div class="max-w-full mx-auto bg-gray-800 text-white text-center rounded-lg shadow-lg p-6 mt-6"> 
    <form method="POST" class="p-5 space-y-3">
        <label for="domain" class="block font-bold mb-5 text-xl">-- DELETE DOMAIN & ZONE --</label>
        <select name="domain_to_delete" id="domain_to_delete"
            class="block w-full border px-4 py-2 bg-gray-700 rounded-full leading-tight text-center focus:outline-none focus:shadow-outline transition duration-200">
            <option value="" disabled selected>- Select Domain to Delete -</option>
            <?php
            foreach ($data['zone_ids'] as $zone => $zoneId) {
                echo "<option value='$zone'>$zone</option>";
            }
            ?>
        </select>
        <input type="submit" name="delete_domain_zone" value="DELETE DOMAIN & ZONE"
            class="mt-4 bg-red-600 hover:bg-red-700 border text-white font-bold py-2 px-4 rounded-full focus:outline-none text-center focus:shadow-outline transition duration-200 mx-auto block">
    </form>
    <?php
    if (isset($_POST["delete_domain_zone"])) {
        $domain_to_delete = $_POST["domain_to_delete"];
        if (!empty($domain_to_delete)) {
            if (isset($data["zone_ids"][$domain_to_delete])) {
                // Remove the selected domain and its associated zone IDs
                unset($data["zone_ids"][$domain_to_delete]);

                // Save data back to data.json
                if (file_put_contents($data_path, json_encode($data))) {
                    echo '<b><span class="success">|| DATA BERHASIL DIHAPUS ||</span></b>';
                } else {
                    echo '<span class="error">GAGAL MENGHAPUS DATA. SILAKAN COBA LAGI NANTI.</span>';
                }
            } else {
                echo '<span class="error">Domain not found.</span>';
            }
        } else {
            echo '<span class="error">Pilih domain yang akan dihapus.</span>';
        }
    }
    ?>
</div>

    <div class="text-center lg:flex-grow border-t border-t border-gray-700 mt-4 pb-2 text-xs"></div>
<div class="container max-w-full py-10">
    <div class="overflow-x-auto border-2 border-gray-100 rounded-lg">
        <table class="table-auto border-collapse bg-gray-100 border border-gray-100 w-full">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-2 rounded-t-lg text-center text-white">-- || API TOKEN || --</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <tr>
                    <td class='border border-gray-800 px-4 py-2 text-left text-center'>⟨    <?php echo substr($data["api_token"], 0, 10) . '••••••••••★••••••••••' . substr($data["api_token"], -10); ?>     ⟩</td>                    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto border-2 border-gray-100 mt-2 rounded-lg">
        <table class="table-auto border-collapse bg-gray-100 border border-gray-100 w-full">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-2 rounded-t-lg text-center text-white">- DOMAIN -</th>
                    <th class="px-4 py-2 rounded-t-lg text-center text-white">- ZONE IDs -</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <?php
// Display updated zone_ids data in the table
foreach ($data["zone_ids"] as $domain => $zone_id) {
    echo "<tr>";
    echo "<td class='border truncate border-gray-800 px-4 py-2 text-left'>⟩⟩ $domain</td>";
    echo "<td class='border truncate border-gray-800 px-4 py-2 text-center'>" . substr($zone_id, 0, 8) . '•••••••★•••••••' . substr($zone_id, -8) . "</td>";
    echo "</tr>";
}
?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/HWIJakob/package@main/function.js"></script>
</body>
</html>
