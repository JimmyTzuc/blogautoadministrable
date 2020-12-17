# Correr Proyecto Laravel v1 

Pequeño proceso para correr el proyecto **Sin Docker** despues de hacer un git clone

## Instalar las dependencias usando Composer

Una vez clonado nuestro proyecto, abriremos una terminal y nos situaremos en dicha carpeta. Una vez estando ahí ejecutaremos:
>composer install

Automáticamente composer leerá el archivo **composer.json** y comenzará a instalar todas las dependencias.
Una vez que termine podemos seguir con el siguiente paso

## Crear el archivo .env

Por defecto, y por razones de seguridad, el archivo **.env** no es tomado en cuenta en el proyecto (ya que cada contribuidor puede tener diferentes contraseñas que no deberíamos saber) así que tenemos que generar uno por nosotros mismos. Podemos hacerlo desde la terminal (si estamos en Windows) escribiendo:

>copy NUL .env

Con eso se crea el Archivo **.env** para Laravel
También podemos hacerlo con nuestro editor favorito, o incluso con el bloc de notas; el punto es crear el archivo.
Una vez creado, procederemos a editarlo. Pero para ahorrarnos tiempo, también abriremos el archivo **.env.example** que contiene un ejemplo de las variables.

Copiaremos todo el contenido en el archivo creado anteriormente, **.env**

A éste es el que editaremos. Pondremos nuestras contraseñas, usuarios, rutas, etcétera. Por lo regular sólo se editan las credenciales de las bases de datos.

Cuando terminemos, sólo guardaremos el fichero para proceder con el paso final.

## Generar una clave

Laravel necesita una clave única para nuestros proyectos. La generaremos usando el comando:
>php artisan key:generate

Esperaremos un momento y se habrá creado nuestra clave.

Y, si miramos nuestro archivo **.env**, veremos que tiene la clave dentro de él.