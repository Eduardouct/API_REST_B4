# Uso de vistas y procedimientos almacenados 

## VISTAS


### **requisitos:**

1. Usar metodo GET

2. Como requisito para su funcion es necesario encender el servidor con el comando 
        
        ( php artisan serve) 


   En la ubicacion de la api donde  se le entregara una url como la siguiente:  

                                                                                                                                                  
        http://127.0.0.1:8000

Con la url entregada con el deberemos agregar lo siguiente **(/vistas)**, en donde nos entregara las vistas que fueron creadas en la base de datos **(opcionV)**.
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


Una vez teniendo una idea sobre que metodo usar para que funcione correctamente deberemos de agregar lo siguiente en la url entregada anteriormente:


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

    Deberemos de agregar lo siguientes valores en la lineas dadas.

    ### Linea 34  
-
        public function procedimiento($opcion,$seleccion,$id){
-
    Dentro del ( ) en la funcion procedimiento debremos agregar una coma( , ) seguido de $idN (donde N es el numero que se le asignara para la distincion de la variable). 
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


**donde en:**

        "/procedimientos/{opcion}/{seleccion}/{id}" 
            
       
debemos agregar las variables que fueron creadas anteriormente en procedimientos.php de la siguiente forma:  

            /{variabe}

**Ejemplo:**

        Route::get("/procedimientos/{opcion}/{seleccion}/{id}/{id1}/{id2}....",[procedimientos::class,"procedimiento"]);


De esta forma es que podemos agregar mas valores para poder usar nuestro pocedimiento almacenado.