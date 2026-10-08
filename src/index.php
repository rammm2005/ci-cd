<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Matematika - CI/CD Praktikum</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>🧮 Kalkulator Matematika</h1>
        <p class="subtitle">Praktikum CI/CD Pipeline - PHP Docker Application</p>

        <div class="card">
            <div class="tab-buttons">
                <div class="tab-btn active" onclick="showTab('basic')">Operasi Dasar</div>
                <div class="tab-btn" onclick="showTab('advanced')">Operasi Lanjutan</div>
                <div class="tab-btn" onclick="showTab('diskon')">Hitung Diskon</div>
                <div class="tab-btn" onclick="showTab('prima')">Cek Bilangan Prima</div>
            </div>

            <!-- Tab: Operasi Dasar -->
            <div id="tab-basic" class="tab-content active">
                <h2>➕ Operasi Dasar</h2>
                <form method="POST" action="">
                    <div class="grid">
                        <div class="form-group">
                            <label>Angka Pertama</label>
                            <input type="number" name="angka1" step="any" required value="<?= $_POST['angka1'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Operasi</label>
                            <select name="operasi">
                                <option value="tambah" <?= ($_POST['operasi'] ?? '') == 'tambah' ? 'selected' : '' ?>>Tambah (+)</option>
                                <option value="kurang" <?= ($_POST['operasi'] ?? '') == 'kurang' ? 'selected' : '' ?>>Kurang (-)</option>
                                <option value="kali" <?= ($_POST['operasi'] ?? '') == 'kali' ? 'selected' : '' ?>>Kali (×)</option>
                                <option value="bagi" <?= ($_POST['operasi'] ?? '') == 'bagi' ? 'selected' : '' ?>>Bagi (÷)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Angka Kedua</label>
                            <input type="number" name="angka2" step="any" required value="<?= $_POST['angka2'] ?? '' ?>">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="basic">
                    <button type="submit">Hitung</button>
                </form>

                <?php
                require_once __DIR__ . '/functions.php';
                if (isset($_POST['action']) && $_POST['action'] == 'basic') {
                    $a = floatval($_POST['angka1']);
                    $b = floatval($_POST['angka2']);
                    $op = $_POST['operasi'];
                    
                    switch($op) {
                        case 'tambah': $result = tambah($a, $b); $symbol = '+'; break;
                        case 'kurang': $result = kurang($a, $b); $symbol = '-'; break;
                        case 'kali': $result = kali($a, $b); $symbol = '×'; break;
                        case 'bagi': $result = bagi($a, $b); $symbol = '÷'; break;
                    }
                    echo "<div class='result'>";
                    echo "<div class='result-value'>$a $symbol $b = $result</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Tab: Operasi Lanjutan -->
            <div id="tab-advanced" class="tab-content">
                <h2>📐 Operasi Lanjutan</h2>
                
                <!-- Pangkat -->
                <form method="POST" action="" style="margin-bottom: 20px;">
                    <h4 style="margin-bottom: 10px;">Pangkat (x^n)</h4>
                    <div class="grid">
                        <div class="form-group">
                            <label>Bilangan (x)</label>
                            <input type="number" name="base" step="any" required>
                        </div>
                        <div class="form-group">
                            <label>Pangkat (n)</label>
                            <input type="number" name="exp" step="any" required>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="pangkat">
                    <button type="submit">Hitung Pangkat</button>
                </form>

                <?php
                if (isset($_POST['action']) && $_POST['action'] == 'pangkat') {
                    $base = floatval($_POST['base']);
                    $exp = floatval($_POST['exp']);
                    $result = pangkat($base, $exp);
                    echo "<div class='result'>";
                    echo "<div class='result-value'>$base ^ $exp = $result</div>";
                    echo "</div>";
                }
                ?>

                <!-- Akar Kuadrat -->
                <form method="POST" action="" style="margin-bottom: 20px;">
                    <h4 style="margin-bottom: 10px;">Akar Kuadrat (√x)</h4>
                    <div class="form-group" style="max-width: 300px;">
                        <label>Bilangan</label>
                        <input type="number" name="sqrt_num" step="any" required>
                    </div>
                    <input type="hidden" name="action" value="sqrt">
                    <button type="submit">Hitung Akar</button>
                </form>

                <?php
                if (isset($_POST['action']) && $_POST['action'] == 'sqrt') {
                    $num = floatval($_POST['sqrt_num']);
                    $result = akarKuadrat($num);
                    echo "<div class='result'>";
                    echo "<div class='result-value'>√$num = $result</div>";
                    echo "</div>";
                }
                ?>

                <!-- Faktorial -->
                <form method="POST" action="">
                    <h4 style="margin-bottom: 10px;">Faktorial (n!)</h4>
                    <div class="form-group" style="max-width: 300px;">
                        <label>Bilangan (n)</label>
                        <input type="number" name="fact_num" min="0" required>
                    </div>
                    <input type="hidden" name="action" value="faktorial">
                    <button type="submit">Hitung Faktorial</button>
                </form>

                <?php
                if (isset($_POST['action']) && $_POST['action'] == 'faktorial') {
                    $num = intval($_POST['fact_num']);
                    $result = faktorial($num);
                    echo "<div class='result'>";
                    echo "<div class='result-value'>$num! = $result</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Tab: Hitung Diskon -->
            <div id="tab-diskon" class="tab-content">
                <h2>🏷️ Kalkulator Diskon</h2>
                <form method="POST" action="">
                    <div class="grid">
                        <div class="form-group">
                            <label>Harga Asli (Rp)</label>
                            <input type="number" name="harga" step="any" required placeholder="100000">
                        </div>
                        <div class="form-group">
                            <label>Persentase Diskon (%)</label>
                            <input type="number" name="diskon_persen" min="0" max="100" step="any" required placeholder="20">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="diskon">
                    <button type="submit">Hitung Diskon</button>
                </form>

                <?php
                if (isset($_POST['action']) && $_POST['action'] == 'diskon') {
                    $harga = floatval($_POST['harga']);
                    $persen = floatval($_POST['diskon_persen']);
                    $result = hitungDiskon($harga, $persen);
                    echo "<div class='result'>";
                    echo "<div class='result-label'>Harga Asli</div>";
                    echo "<div style='font-size: 1.2rem; margin-bottom: 10px;'>Rp " . number_format($result['harga_asli'], 0, ',', '.') . "</div>";
                    echo "<div class='result-label'>Potongan ({$result['persen_diskon']}%)</div>";
                    echo "<div style='font-size: 1.2rem; color: #e74c3c; margin-bottom: 10px;'>- Rp " . number_format($result['potongan'], 0, ',', '.') . "</div>";
                    echo "<div class='result-label'>Harga Setelah Diskon</div>";
                    echo "<div class='result-value'>Rp " . number_format($result['harga_diskon'], 0, ',', '.') . "</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Tab: Cek Prima -->
            <div id="tab-prima" class="tab-content">
                <h2>🔢 Cek Bilangan Prima</h2>
                <form method="POST" action="">
                    <div class="form-group" style="max-width: 300px;">
                        <label>Masukkan Bilangan</label>
                        <input type="number" name="prima_num" min="1" required placeholder="17">
                    </div>
                    <input type="hidden" name="action" value="prima">
                    <button type="submit">Cek Prima</button>
                </form>

                <?php
                if (isset($_POST['action']) && $_POST['action'] == 'prima') {
                    $num = intval($_POST['prima_num']);
                    $isPrima = isPrima($num);
                    echo "<div class='result'>";
                    if ($isPrima) {
                        echo "<div class='result-value' style='color: #27ae60;'>✓ $num adalah Bilangan Prima</div>";
                    } else {
                        echo "<div class='result-value' style='color: #e74c3c;'>✗ $num bukan Bilangan Prima</div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>

            <div class="info-box">
                <h4>ℹ️ Tentang Aplikasi</h4>
                <p>Aplikasi kalkulator ini dibuat untuk praktikum CI/CD Pipeline. 
                Aplikasi berjalan di dalam Docker container menggunakan PHP 8.2 CLI built-in server.</p>
                <p style="margin-top: 10px;"><strong>Server Info:</strong> PHP <?= phpversion() ?> | 
                <?= php_uname('s') ?> | <?= date('Y-m-d H:i:s') ?></p>
            </div>
        </div>

        <div class="footer">
            <p>Praktikum CI/CD Pipeline - 2026</p>
            <p>Docker + GitHub Actions + Self-Hosted Runner</p>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
