composer init

composer require phpoffice/phpspreadsheet

# agregar definiciones y archivo de configuración en el archivo composer.json

"psr-4": {
    "Braian\\Test\\": "src/",
    "app\\interfaces\\": "interfaces/",
    "app\\data\\": "data/",
    "app\\excel\\": "excel/",
    "app\\business\\": "business/"
},
"files": [
    "config/database.php"
]

# ejecutar el comando despues de cambiar lo de arriba

composer dump-autoload