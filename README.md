# 🧮 Kalkulator Matematika - CI/CD Praktikum

Aplikasi kalkulator berbasis PHP untuk praktikum CI/CD Pipeline menggunakan Docker dan GitHub Actions.

## 📁 Struktur Project

```
cicd-praktikum/
├── src/                        # Source code aplikasi
│   ├── Functions/              # Library fungsi
│   │   └── Math.php            # Class fungsi matematika (OOP)
│   ├── assets/                 # Static assets
│   │   ├── css/
│   │   │   └── style.css       # Stylesheet
│   │   └── js/
│   │       └── app.js          # JavaScript
│   ├── functions.php           # Helper functions (procedural)
│   └── index.php               # Entry point aplikasi
├── tests/                      # Unit tests
│   └── MathTest.php            # Test untuk fungsi matematika
├── .github/
│   └── workflows/
│       └── ci-cd.yml           # GitHub Actions workflow
├── Dockerfile                  # Docker configuration
├── .gitignore
└── README.md
```

## 🚀 Fitur

- **Operasi Dasar**: Penjumlahan, Pengurangan, Perkalian, Pembagian
- **Operasi Lanjutan**: Pangkat, Akar Kuadrat, Faktorial
- **Kalkulator Diskon**: Hitung potongan harga
- **Cek Bilangan Prima**: Validasi bilangan prima

## 🛠️ Menjalankan Aplikasi

### Dengan Docker

```bash
# Build image
docker build -t php-calculator .

# Run container
docker run -d -p 8080:80 --name calculator php-calculator

# Akses di browser
# http://localhost:8080
```

### Tanpa Docker (PHP CLI)

```bash
# Jalankan PHP built-in server
php -S localhost:8080 -t src/

# Akses di browser
# http://localhost:8080
```

## 🧪 Menjalankan Tests

```bash
# Run unit tests
php tests/MathTest.php
```

## 🔄 CI/CD Pipeline

Pipeline terdiri dari 3 job:

1. **Testing (CI)**: Linting dan unit test - dijalankan pada setiap Pull Request
2. **Build & Push**: Build Docker image dan push ke registry - dijalankan setelah merge ke main
3. **Deploy**: Deploy ke production servers - menggunakan self-hosted runners

## 📚 Teknologi

- PHP 8.2
- Docker
- GitHub Actions
- Self-Hosted Runners

---

**Praktikum CI/CD Pipeline - 2024**
