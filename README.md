<p align="center">
  <img src="public/images/logo.png" width="200" alt="FlashTech Logo">
</p>

<h1 align="center">⚡ FlashTech - Cửa hàng công nghệ</h1>

<p align="center">
  <strong>Hệ thống quản lý và bán hàng thiết bị công nghệ</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/DaisyUI-4.x-5A0EF8?style=for-the-badge&logo=daisyui&logoColor=white" alt="DaisyUI">
  <img src="https://img.shields.io/badge/MongoDB-6.x-47A248?style=for-the-badge&logo=mongodb&logoColor=white" alt="MongoDB">
</p>

---

## 📋 Giới thiệu

**FlashTech** là một hệ thống thương mại điện tử chuyên bán các sản phẩm công nghệ như laptop, linh kiện máy tính và phụ kiện. Được xây dựng với Laravel và Livewire, hệ thống mang lại trải nghiệm người dùng mượt mà và hiện đại.

### ✨ Tính năng chính

- 🛒 **Giỏ hàng & Thanh toán** - Quản lý giỏ hàng realtime với Livewire
- 💻 **Quản lý sản phẩm** - Laptop, linh kiện, phụ kiện
- 👥 **Quản lý khách hàng** - Đăng ký, đăng nhập, lịch sử đơn hàng
- 📦 **Quản lý đơn hàng** - Theo dõi trạng thái đơn hàng
- 🏷️ **Quản lý thương hiệu** - Brand management
- 🔐 **Phân quyền Admin** - Hệ thống quản trị viên

---

## 🛠️ Yêu cầu hệ thống

| Công cụ | Phiên bản |
|---------|-----------|
| PHP | >= 8.2 |
| Composer | >= 2.0 |
| Node.js | >= 18.x |
| NPM | >= 9.x |
| MongoDB | >= 6.0 |

---

## 🚀 Hướng dẫn cài đặt

### 1️⃣ Clone dự án

```bash
git clone https://github.com/FlashTM123/FlashTech.git
cd FlashTech
```

### 2️⃣ Cài đặt MongoDB Driver cho PHP

#### 🪟 Windows

**Bước 1:** Tải MongoDB PHP Driver
- Truy cập: https://pecl.php.net/package/mongodb
- Tải phiên bản phù hợp với PHP của bạn (ví dụ: `php_mongodb-1.17.0-8.2-ts-vs16-x64.zip`)
- **Lưu ý:** Chọn đúng phiên bản:
  - `ts` = Thread Safe (cho Apache)
  - `nts` = Non Thread Safe (cho Nginx/CLI)
  - `x64` hoặc `x86` tùy hệ thống

**Bước 2:** Copy file DLL
```
Giải nén file zip đã tải
Copy file `php_mongodb.dll` vào thư mục ext của PHP
Ví dụ: C:\xampp\php\ext\php_mongodb.dll
       C:\laragon\bin\php\php-8.2\ext\php_mongodb.dll
```

**Bước 3:** Kích hoạt extension trong `php.ini`
```ini
; Thêm dòng sau vào php.ini
extension=mongodb
```

**Bước 4:** Khởi động lại Apache/PHP server

**Bước 5:** Kiểm tra cài đặt
```bash
php -m | findstr mongodb
```
Nếu hiện `mongodb` nghĩa là đã cài thành công!

#### 🐧 Linux (Ubuntu/Debian)

```bash
# Cài đặt dependencies
sudo apt-get update
sudo apt-get install php-dev php-pear

# Cài đặt MongoDB driver qua PECL
sudo pecl install mongodb

# Thêm extension vào php.ini
echo "extension=mongodb.so" | sudo tee /etc/php/8.2/mods-available/mongodb.ini
sudo phpenmod mongodb

# Khởi động lại PHP-FPM
sudo systemctl restart php8.2-fpm

# Kiểm tra
php -m | grep mongodb
```

#### 🍎 macOS

```bash
# Sử dụng Homebrew
brew install php
pecl install mongodb

# Thêm vào php.ini
echo "extension=mongodb.so" >> $(php --ini | grep "Loaded Configuration" | cut -d: -f2 | xargs)

# Kiểm tra
php -m | grep mongodb
```

### 3️⃣ Cài đặt MongoDB Server

#### 🪟 Windows
1. Tải MongoDB Community Server: https://www.mongodb.com/try/download/community
2. Cài đặt theo hướng dẫn (chọn "Complete")
3. MongoDB sẽ tự động chạy như Windows Service

#### 🐧 Linux
```bash
# Import MongoDB GPG key
curl -fsSL https://www.mongodb.org/static/pgp/server-7.0.asc | sudo gpg -o /usr/share/keyrings/mongodb-server-7.0.gpg --dearmor

# Add MongoDB repo
echo "deb [ signed-by=/usr/share/keyrings/mongodb-server-7.0.gpg ] http://repo.mongodb.org/apt/ubuntu jammy/mongodb-org/7.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list

# Install MongoDB
sudo apt-get update
sudo apt-get install -y mongodb-org

# Start MongoDB
sudo systemctl start mongod
sudo systemctl enable mongod
```

### 4️⃣ Cài đặt dependencies

```bash
# Cài đặt PHP dependencies
composer install

# Cài đặt Node.js dependencies
npm install
```

### 5️⃣ Cấu hình môi trường

```bash
# Copy file .env mẫu
cp .env.example .env

# Tạo application key
php artisan key:generate
```

Chỉnh sửa file `.env`:

```env
APP_NAME=FlashTech
APP_URL=http://localhost:8000

# MongoDB Configuration
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=flashtech
DB_USERNAME=
DB_PASSWORD=
```

### 6️⃣ Khởi tạo database

```bash
# Chạy migrations
php artisan migrate

# Seed dữ liệu mẫu (tùy chọn)
php artisan db:seed
```

### 7️⃣ Build assets

```bash
# Development (với hot reload)
npm run dev

# Production
npm run build
```

### 8️⃣ Chạy ứng dụng

```bash
php artisan serve
```

🎉 Truy cập: http://localhost:8000

---

## 📁 Cấu trúc thư mục

```
FlashTech/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Livewire/             # Livewire components
│   ├── Models/               # Eloquent models
│   └── Policies/             # Authorization policies
├── database/
│   ├── factories/            # Model factories
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── routes/
│   └── web.php               # Web routes
└── public/                   # Public assets
```

---

## 🧑‍💻 Lệnh hữu ích

```bash
# Xóa cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Tạo Livewire component
php artisan make:livewire ComponentName

# Chạy tests
php artisan test

# Xem routes
php artisan route:list

# Tạo model với migration
php artisan make:model ModelName -m

# Refresh database
php artisan migrate:fresh --seed
```

---

## ❓ Xử lý lỗi thường gặp

### MongoDB Extension not found
```bash
# Kiểm tra extension đã được load chưa
php -m | findstr mongodb

# Kiểm tra đường dẫn php.ini
php --ini
```

### Connection refused to MongoDB
```bash
# Kiểm tra MongoDB đang chạy
# Windows:
sc query MongoDB

# Linux:
sudo systemctl status mongod
```

### Composer dependencies conflict
```bash
composer update --with-all-dependencies
```

---

## 👥 Đội ngũ phát triển

| Thành viên | Vai trò |
|------------|---------|
| FlashTM123 | Developer |

---

## 📄 License

Dự án này được phát triển cho mục đích học tập và nộp CV thực tập.

---

<p align="center">
  Made with ❤️ by <strong>FlashTech Team</strong>
</p>
