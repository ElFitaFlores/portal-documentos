**Proyecto creado en PHP con el framework Laravel**

**Prerrequisitos**
-   PHP >= 7.1.3
-   MYSQL

**Pasos**
-   Abrir una ventana en la terminal e ingresar a la carpeta donde se encuentra el proyecto
-   Instalar paquetes de PHP con `composer install`
-   Copiar el archivo .env.example en la misma ubicacion con el nombre .env
-   Crear una base de datos vacia
-   Colocar las credenciales de la base de datos (mysql) en el nuevo archivo (.env)
-   Generar clave para validar la aplicacion de Laravel `php artisan key:generate`
-   Crear tablas en la base de datos `php artisan migrate --seed`
-   Se creará automaticamente el primer usuario administrador (usuario: admin, contraseña: secret)
-   Levantar el servidor `php artisan serve`


**Consideraciones**
-   Por cuestiones de practicidad se dejaron unicamente dos opciones en el menú (Documentos y Usuarios)
-   En "Documentos" se muestra la opción para crear, buscar y el reporte de documentos creados
-   En "Usuarios" se muestra la administracion completa de los usuarios
-   Un usuario administrador no puede eliminarse a si mismo
-   La aplicación cumple con las lista de requerimientos del documento provisto