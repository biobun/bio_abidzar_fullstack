# Bio Abidzar Gifari_Fullstack

## Run Locally
1. git clone
2. Run these command
    ```bash
    # Install Dependencies
    composer install

    # Copy configuration file
    cp .env.example .env

    # Generate Laravel Encryption Key
    php artisan key:generate

    # Create the symbolic link of Laravel Public Disk
    php artisan storage:link
    ```
3. Buat Database dan isikan semua pengaturan yang perlu kamu masukkan, biasanya yang penting adalah pengaturan koneksi database pada file .env
4. Migrate database table with initial data
    ```bash
    .php artisan migrate --seed
    ```
    untuk login bisa menggunakan:
    user: admin
    password: password
