/**
 * app.js - JavaScript untuk Kalkulator Matematika
 * Praktikum CI/CD Pipeline
 */

/**
 * Menampilkan tab yang dipilih
 * @param {string} tabName - Nama tab yang akan ditampilkan
 */
function showTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab
    document.getElementById('tab-' + tabName).classList.add('active');
    event.target.classList.add('active');
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Kalkulator Matematika - Ready!');
});
