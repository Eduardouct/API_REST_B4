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
- Sql Server 2008 R2 o Sql Server 2019
- Php 7.4
- Laravel 7.X
- Postman(Para realizar pruebas)

Instalacion:
- Obtener el proyecto Eduardouct/API_REST_B4/ en la rama main en github
- Seguir las instrucciones del punto 1.-

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


1.- Para el proceso de la creación de todo el programa, que se inicializa con el comando "app/Console/Commands/Generar.php" son necesarios algunos requisitos de laravel para el funcionamiento inicial de este:
- Estar en la carpeta principal y en consola aplicar el comando "composer install".
- En la carpeta principal en el archivo ".env" cambiar el nombre de su base de datos SQLServer en "DB_DATABASE=", ejemplo: "DB_DATABASE=apiRest".
- Ejecutar el comando "php artisan Generar:modelos" para generar automáticamente los CRUD de cada tabla en la base de datos. Se les dará una api-key de User y Admin, el administrador puede generar toda petición y el usuario solo puede hacer get a las tablas. Esta api-key se debe pasar a postman con un parámetro de query llamado api_key.
- Ejecutar el comando php artisan serve, aqui se inicia el servidor y ya se puede ir a postman para hacer las consultas que se quieran.


2.- Como funciona el comando principal "Generar.php":
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


3.- Llamadas desde passport al CRUD:
- Si se llamo al comando Generar.php con una tabla "Usuarios", se llama desde passport con la ruta http://127.0.0.1:8000/api/usuarios y http://127.0.0.1:8000/api/usuarios/ID


# Uso de vistas y procedimientos almacenados 

## VISTAS


### **requisitos:**

1. Usar metodo GET

2. Como requisito para su funcion es necesario encender el servidor con el comando 
        
        ( php artisan serve) 


   En la ubicacion de la api donde  se le entregara una url como la siguiente:  

                                                                                                                                                  
        http://127.0.0.1:8000

Con la url entregada con el debemos agregar lo siguiente **(/vistas)**, en donde nos entregara las vistas que fueron creadas en la base de datos **(opcionV)**.
Para el uso de la vista a elegir se debe de agregar lo siguiente en la url entregada anterior:
                    
    /opcionV

**Donde**

    opcionv = es el valor que se le tiene asignado a la vista que usted seleccionara. 
La url final deberia quedar de la siguiente forma:

    http://127.0.0.1:8000/api/vistas/opcionV



## PROCEDIMIENTOS ALMACENADOS

### **requisitos:**

1. Usar metodo GET

2. Como requisito para su funcion es necesario encender el servidor con el comando 
        
        ( php artisan serve) 


   En la ubicacion de la api donde  se le entregara una url como la siguiente:  

                                                                                                                                                  
        http://127.0.0.1:8000



Con la url entregada con el comando anterior debemos agregar **(/procedimientos)**, en donde nos entregara los procedimientos que fueron creados en la base de datos, mas la opcion de metodo select o update para poder usar la consulta donde a continuacion le explicaremos en que tipo de ocaciones se debe usar.

    SELECT : Para los procedimientos cuya funcion es mostrar datos de las tablas o tabla de en la base 
    de datos.

    UPDATE : Para los procedimientos cuya funcion es eliminar o modificar datos en la base de datos.


Una vez teniendo una idea sobre que metodo usar para que funcione correctamente debemos de agregar lo siguiente en la url entregada anteriormente:


        /opcionP/opcionSU/valor

**Donde:**

    opcionP  = valor del procedimiento seleccionado
    opcionSU = metodo a usar (SELECT o UPDATE)
    valor    = valor o parametro a cambiar o eliminar

La url final deberia quedar de la siguiente forma:

-
        http://127.0.0.1:8000/api/procedimientos/opcionP/opcionSU/valor 

## IMPORTANTE
En caso de necesitar mas valores para el procedimiento se debera de hacer lo siguiente:

### En el archivo procedimientos.php ubicado en 

-
        App\Http\Controllers\procedimientos.php 

    Se debe de agregar lo siguientes valores en la lineas dadas.

    ### Linea 34  

        public function procedimiento($opcion,$seleccion,$id){

    Dentro del ( ) en la funcion procedimiento debemos agregar una coma( , ) seguido de $idN (donde N es el numero que se le asignara para la distincion de la variable). 
         Puede hacer esto tantas veces sean necesarias.

    EJEMPLO:    

        public function procedimiento($opcion,$seleccion,$id,$id1,$id2,...){


    ### Linea 40 y linea 47
        $consulta = DB::update("exec $valor '$id' ");


    Dentro del ( ) debera de de agregar la variables que creo en la linea anterior (linea 34) entre comillas simples ( '').

    EJEMPLO:  

        $consulta = DB::update("exec $valor '$id' '$id1' '$id2' ....");

Una vez agregado los valores que se desean usar para la consulta debemos ademas modificar la ruta de los procedimientos haciendo lo siguiente:

### En el archivo api.php ubicado en : 
            
        routes/api.php  
            


Debemos ubicar la siguiente ruta:

        Route::get("/procedimientos/{opcion}/{seleccion}/{id}",[procedimientos::class,"procedimiento"]);


**Donde en:**

        "/procedimientos/{opcion}/{seleccion}/{id}" 
            
       
Debemos agregar las variables que fueron creadas anteriormente en procedimientos.php de la siguiente forma:  

            /{variabe}

Ejemplo:

        Route::get("/procedimientos/{opcion}/{seleccion}/{id}/{id1}/{id2}....",[procedimientos::class,"procedimiento"]);


De esta forma es que podemos agregar mas valores para poder usar nuestro pocedimiento almacenado.
