<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<p align="center">Administrador de tareas paginadas con Laravel, VueJS y Axios</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Acerca del proyecto

El administrador de tareas es una aplicación desarrollada con el Framework Laravel en el Backend, VueJS como Framework en el Frontend, y Axios como la librería HTTP para hacer peticiones asincronas al servidor. 

- Laravel 6.x
- MySQL 5.x 
- VueJS 2.6
- Axios

Otras librerías o frameworks implementadas en el proyecto mediante el gestor de paquetes **NPM** y la tecnología de **Laravel Mix** son:

- Bootstrap 4.x
- jQuery 3.x
- FontAwesome 5.x
- Toastrjs


#### Instrucciones de instalación

Configurar permisos en el directorio storage de la aplicación
~~~
sudo chmod 755 -R storage
~~~

Instalar las dependencias del proyecto
~~~
composer install
~~~

Crear una copia del archivo .env.example con la configuración correcta del proyecto. **Por ejemplo, credenciales de acceso a la Base de Datos**
~~~
cp .env.example .env
~~~

Crear un nuevo API Key para la aplicación
~~~
php artisan key:generate
~~~

Crear la base de datos para el proyecto mediante algún Sistema Administrador de Bases de Datos Relacionales soportado por Laravel. **Por ejemplo, MySQL.** Finalmente, registre las credenciales de acceso en el archivo de configuración .env
~~~
mysql> CREATE DATABASE nombre_db;
~~~

Ejecutar las migraciones y sembrar los datos de prueba
~~~
php artisan migrate --seed
~~~

Ejecutar la aplicación. **Por ejemplo, mediante el servidor HTTP integrado**
~~~
php artisan serve
~~~