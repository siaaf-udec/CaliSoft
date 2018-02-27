
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

## para generar archivos proyectos
* `php artisan factory:proyectos --cantidad=30`
## codigo para traer muchas cosas en codificacion
* `php artisan tinker`
* `$query=DB::table('TBL_Proyectos')->join('TBL_Scripts','TBL_Scripts.FK_ProyectoId','=','TBL_Proyectos.PK_Id')->join('TBL_NotaCodificacion','TBL_NotaCodificacion.FK_ScriptsId','=','TBL_Scripts.PK_Id')->join('TBL_ItemsCodificacion','TBL_NotaCodificacion.FK_ItemsId','=','TBL_ItemsCodificacion.PK_Id')->select('TBL_Proyectos.PK_Id','TBL_NotaCodificacion.nota','TBL_ItemsCodificacion.item','TBL_ItemsCodificacion.valor','TBL_NotaCodificacion.total')->where('TBL_NotaCodificacion.total','<>','0')->where('TBL_Proyectos.PK_id','=','1')->where('TBL_NotaCodificacion.FK_ItemsId','=','1')->get()`
