<?php
/**
 * MathTest.php - Unit Test untuk fungsi matematika
 * Praktikum CI/CD Pipeline
 */

require_once __DIR__ . '/../src/functions.php';

class TestRunner {
    private $passed = 0;
    private $failed = 0;
    private $tests = [];

    public function assertEqual($expected, $actual, $testName) {
        if ($expected === $actual) {
            $this->passed++;
            $this->tests[] = ['name' => $testName, 'status' => 'PASS', 'message' => ''];
            return true;
        } else {
            $this->failed++;
            $this->tests[] = [
                'name' => $testName, 
                'status' => 'FAIL', 
                'message' => "Expected: $expected, Got: $actual"
            ];
            return false;
        }
    }

    public function assertTrue($condition, $testName) {
        return $this->assertEqual(true, $condition, $testName);
    }

    public function assertFalse($condition, $testName) {
        return $this->assertEqual(false, $condition, $testName);
    }

    public function getResults() {
        return [
            'passed' => $this->passed,
            'failed' => $this->failed,
            'total' => $this->passed + $this->failed,
            'tests' => $this->tests
        ];
    }

    public function printResults() {
        echo "\n========================================\n";
        echo "       UNIT TEST RESULTS\n";
        echo "========================================\n\n";

        foreach ($this->tests as $test) {
            $icon = $test['status'] === 'PASS' ? '✓' : '✗';
            echo "[$icon] {$test['name']}: {$test['status']}";
            if ($test['message']) {
                echo " - {$test['message']}";
            }
            echo "\n";
        }

        echo "\n----------------------------------------\n";
        echo "Total: {$this->passed} passed, {$this->failed} failed\n";
        echo "========================================\n";

        return $this->failed === 0;
    }
}

// Jalankan tests
$test = new TestRunner();

echo "\n🧪 Running Math Function Tests...\n";

// ============================================
// Test Operasi Dasar
// ============================================
echo "\n📊 Testing Basic Operations...\n";

// Test fungsi tambah
$test->assertEqual(5, tambah(2, 3), "tambah(2, 3) = 5");
$test->assertEqual(0, tambah(-5, 5), "tambah(-5, 5) = 0");
$test->assertEqual(-10, tambah(-5, -5), "tambah(-5, -5) = -10");

// Test fungsi kurang
$test->assertEqual(5, kurang(10, 5), "kurang(10, 5) = 5");
$test->assertEqual(-5, kurang(5, 10), "kurang(5, 10) = -5");
$test->assertEqual(0, kurang(5, 5), "kurang(5, 5) = 0");

// Test fungsi kali
$test->assertEqual(15, kali(3, 5), "kali(3, 5) = 15");
$test->assertEqual(-15, kali(-3, 5), "kali(-3, 5) = -15");
$test->assertEqual(0, kali(0, 100), "kali(0, 100) = 0");

// Test fungsi bagi
$test->assertEqual(5, bagi(10, 2), "bagi(10, 2) = 5");
$test->assertEqual(2.5, bagi(5, 2), "bagi(5, 2) = 2.5");
$test->assertEqual("Error: Tidak bisa membagi dengan nol", bagi(10, 0), "bagi(10, 0) = Error");

// ============================================
// Test Operasi Persentase & Diskon
// ============================================
echo "\n💰 Testing Percentage & Discount...\n";

// Test fungsi persentase
$test->assertEqual(50, persentase(50, 100), "persentase(50, 100) = 50%");
$test->assertEqual(25, persentase(25, 100), "persentase(25, 100) = 25%");
$test->assertEqual(0, persentase(0, 100), "persentase(0, 100) = 0%");

// Test fungsi hitungDiskon
$diskon = hitungDiskon(100000, 20);
$test->assertEqual(100000, $diskon['harga_asli'], "hitungDiskon - harga_asli = 100000");
$test->assertEqual(20, $diskon['persen_diskon'], "hitungDiskon - persen_diskon = 20");
$test->assertEqual(20000, $diskon['potongan'], "hitungDiskon - potongan = 20000");
$test->assertEqual(80000, $diskon['harga_diskon'], "hitungDiskon - harga_diskon = 80000");

// ============================================
// Test Operasi Lanjutan
// ============================================
echo "\n📐 Testing Advanced Operations...\n";

// Test fungsi pangkat
$test->assertEqual(8, pangkat(2, 3), "pangkat(2, 3) = 8");
$test->assertEqual(1, pangkat(5, 0), "pangkat(5, 0) = 1");
$test->assertEqual(100, pangkat(10, 2), "pangkat(10, 2) = 100");

// Test fungsi akarKuadrat
$test->assertEqual(5, akarKuadrat(25), "akarKuadrat(25) = 5");
$test->assertEqual(10, akarKuadrat(100), "akarKuadrat(100) = 10");

// Test fungsi faktorial
$test->assertEqual(1, faktorial(0), "faktorial(0) = 1");
$test->assertEqual(1, faktorial(1), "faktorial(1) = 1");
$test->assertEqual(120, faktorial(5), "faktorial(5) = 120");

// ============================================
// Test Bilangan Prima
// ============================================
echo "\n🔢 Testing Prime Numbers...\n";

// Test fungsi isPrima
$test->assertTrue(isPrima(2), "isPrima(2) = true");
$test->assertTrue(isPrima(7), "isPrima(7) = true");
$test->assertTrue(isPrima(13), "isPrima(13) = true");
$test->assertFalse(isPrima(1), "isPrima(1) = false");
$test->assertFalse(isPrima(4), "isPrima(4) = false");
$test->assertFalse(isPrima(10), "isPrima(10) = false");

// Print dan exit dengan code sesuai hasil
$success = $test->printResults();
exit($success ? 0 : 1);
