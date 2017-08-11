
# Modulo Central de Calisoft


## Instalacion 

* `composer update`
* `copiar .env.example -> .env`
* `php artisan key:generate`
* `php artisan storage:link`
* `npm install --only=dev`
* correo: mailtrap en el .env
* notificaciones: pusher en el .env

## En desararrollo
* Servidor -> `php artisan serve`
* Mix Javascript -> `npm run watch`
* Cola -> `php artisan queue:work --tries=3` 

## para aceptar los seeders 
* `composer dump-autoload `