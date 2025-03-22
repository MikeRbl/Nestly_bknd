# 🚀 Backend - Nestly

Este es el backend de **Nestly**, desarrollado con **Laravel**.

## 🛠️ Tecnologías Usadas

- **Lenguaje**: PHP
- **Framework**: Laravel 10
- **Base de Datos**: MySQL 


### 1️⃣ Requisitos
- PHP 8+
- Composer
- MySQL

### 2️⃣ Instalación
```sh
git clone https://github.com/TU-USUARIO/nestly.git
cd nestly/backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
