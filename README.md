**Proyecto creado en PHP con el framework Laravel**

**Prerrequisitos**
-   PHP >= 7.1.3
-   MYSQL

**Pasos**
-   Abrir una ventana en la terminal e ingresar a la carpeta donde se encuentra el proyecto
-   composer install
-   npm install
-   Copiar el archivo .env.example en la misma ubicacion con el nombre .env
-   Colocar las credenciales de la base de datos (mysql)
-   php artisan key:generate
-   php artisan migrate --seed
-   Se creará automaticamente el primer usuario administrador (usuario: admin, contraseña: secret)
-   php artisan serve