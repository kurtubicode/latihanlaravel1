## Cara Clone repository dari github

1. salin dulu reponya

    ```bash
    git clone https://github.com/kurtubicode/latihanlaravel1.git

2. abis prosesnya beres jalanin ini di terminal dalam folder reponya (/latihanlaravel1) atau apa aja namanya

    - install composer

        ```bash
        composer install


    - buat file .env

        ```bash

        ini nanti isinya harus disesuain (atau engga juga sih)

    - bikin key

        ```bash
        php artisan key:generate

    - bikin database

        ```bash
        php artisan migrate

    - bikin data dummy (data boongan)

        ```bash
        php artisan db:seed

    
