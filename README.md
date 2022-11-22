# Generador de Api Rest Dinamico 

Descripcion del Proyecto:
Se crea un modulo que permite seleccionar objetos (Tablas,Vistas,Procedimientos Almacenados) 
dentro de la base de datos y obtener su propiedades (columnas, parametros, etc.).
Con esto y los permisos otorgados por la ApiKeys creada dinamicamente se generaran metodos respectivos para la elaboracion de CRUD 
en formato JSON para nuestra Api Rest, nuestro modulo tambien se encarga de administrar las APIs ya creadas
en un repositorio permitiendo asi acceder a sus parametros y salidas.

Estado de Proyecto:
El proyecto se encuentra en su version Final.

Los Requisitos del Entorno:
-Sql Server 2008 R2 o Sql Server 2019
-Php 7
-Laravel 9
-Postman(Para realizar pruebas)

Instalacion:


Bugs o Errores:
- Al realizar dos veces el comando php artisan Generar:modelos se generan rutas y líneas que no deberían estar en "routes/api.php"

Trabajo Realizado por:

Estudiantes de 4to
-Eduardo
-Fracisca

Estudiantes de 2do
-Kevin Cortes 
-Armin Fierro
-Moises Miño
-Diego Sanhueza
-Benjamin Sobarzo


Información general
* Para todo comando estar en el directorio API_REST_GEN
* Para conocer las rutas de APIs se puede ejecutar el comando php artisan route:list
* Funcionará para todo SQLServer en configuración de administrador, si se quiere aplicar este programa como un usuario hijo del administrador simplemente se puede cambiar el archivo ".env" su nombre de usuario y contraseña de la base de datos.
* Se recomienda no tener tablas de nombres iguales a los que están en las migraciones, por su posible eliminación de datos, laravel y las api-keys requieren de algunas migraciones para el funcionamiento, revisar nombres.


Para el proceso de la creación de todo el programa, que se inicializa con el comando "app/Console/Commands/Generar.php" son necesarios algunos requisitos de laravel para el funcionamiento inicial de este.
- Estar en la carpeta principal y en consola aplicar el comando "composer install".
- En la carpeta principal en el archivo ".env" cambiar el nombre de su base de datos SQLServer en "DB_DATABASE=", ejemplo: "DB_DATABASE=apiRest".
- Ejecutar el comando "php artisan Generar:modelos" para generar automáticamente los CRUD de cada tabla en la base de datos. Se les dará una api-key de User y Admin, el administrador puede generar toda petición y el usuario solo puede hacer get a las tablas. Esta api-key se debe pasar a postman con un parámetro de query llamado api_key.
- Ejecutar el comando php artisan serve, aqui se inicia el servidor y ya se puede ir a postman para hacer las consultas que se quieran.


Como funciona el comando principal "Generar.php":
- Por si hay algun bug en composer se ejecuta al inicio el comando "composer install"
- Se ejecuta un controlador llamado "Query.php" el cual nos entrega los nombres y cantidad de tablas de la base de datos para ejecutar otros comandos.
- Se ejecutan los comandos "php artisan migrate" para migrar a la base de datos las tablas requeridas para el funcionamiento de esta aplicación, principalmente api-keys y "php artisan passport:install" para instalar e inicializar el paquete que se usará para la creación de api-keys.
- Por cada tabla en la base de datos que no sea de las migraciones primero se crean los modelos automáticamente llamando a la librería krlove con el comando "krlove:generate:model", para su uso en los CRUD.
- Por cada tabla en la base de datos que no sea de las migraciones se crean las rutas CRUD en "routes/api.php", los controladores de cada tabla siendo el funcionamiendo de cada CRUD y sus recursos como colecciones para el funcionamiento de estos controladores anteriores gracias al paquete "bhavingajjar api:generate", generador de apis. 

    Ejemplo de ubicaciones luego de aplicar estos comandos con una tabla llamada "Usuarios":
        app/Models/Usuarios.php
        app/Http/Controllers/Api/UsuariosController.php
        app/Http/Resources/UsuariosResource.php
        app/Http/Resources/UsuariosCollection.php

    app/routes/api.php
        Ultima línea
        Route::apiResource('usuarios', UsuariosController::class);

- Luego de este cambio en todo el proyecto, se llama al comando "php artisan optimize" para actualizar los valores de rutas y del proyecto, ya que despues de cambiar algunos aspectos del proyecto como por ejemplo en este caso las rutas, se debe actualizar la información para poder acceder a lo creado o cambiado.
- Por cada modelo en la carpeta "app/Models" exceptuando "User.php" y "api_Key.php" se actualizan los controladores creados de cada una de las tablas, debido a que en el estado en el que estaban no funcionaban los métodos que requerían una ID para actualizar, eliminar o ver. Especificamente ocurría por un manejo inadecuado de estas mismas IDs, no llegaban al controlador y este controlador no buscaba ninguna ID que fuera esa para aplicar el CRUD.
- Las rutas se cambian para un manejo adecuado de las api-keys, en donde se le asigna un middleware que requiere la api-key o permisos de administrador a todas las rutas excepto GET y GET por ID, y a estas dos ultimas se requiere cualquier api-key ya existente, debido a que el rango más bajo de estas llaves es el de usuario.
- Se crea el token de admin y ususario dentro de passport y estos se muestran por consola para guardarlos y usarlos, el token de Admin se guarda con rol de Admin en la tabla migrada apikey y el token de Usuario se guarda con rol de User.


Llamadas desde passport al CRUD:
- Si se llamo al comando Generar.php con una tabla "Usuarios", se llama desde passport con la ruta http://127.0.0.1:8000/api/usuarios y http://127.0.0.1:8000/api/usuarios/ID
