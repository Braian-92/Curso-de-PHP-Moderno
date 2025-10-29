# Inicializar composer

composer init
Package name (vendor/name) [my-composer]: braian/test
Description []: pruebas para composer
Author [Braian <braianabramian@gmail.com>, n to skip]: braian
Minimum Stability []: dev
Package Type (e.g. library, project, metapackage, composer-plugin) []: project
License []: 

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? src/
Would you like to define your dev dependencies (require-dev) interactively [yes]? no
Add PSR-4 autoload mapping? Maps namespace 'BraianTest' to the entered relative path. [src/, n to skip]: src/

# pagina de assets de composer
https://packagist.org/

# paquete
https://packagist.org/packages/nesbot/carbon

# instala la biblioteca (realizar primero el fix de abajo)
composer require nesbot/carbon

## ERROR ## 
(tambien sumo gd para el excel)
## ⚙️ Cómo habilitar la extensión ZIP en XAMPP

1. Abrir el archivo de configuración de PHP:
   C:\\xampp\\php\\php.ini

2. Buscar la siguiente línea (puede estar comentada con un `;`):
   ;extension=zip
   ;extension=gd

3. Quitar el punto y coma `;` para habilitarla:
   extension=zip
   extension=gd

4. Guardar los cambios en el archivo php.ini.

5. Reiniciar Apache desde el panel de control de XAMPP.

## FIN ERROR


## paquete phpoffice

https://packagist.org/packages/phpoffice/phpspreadsheet


composer require phpoffice/phpspreadsheet
