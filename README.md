podcast-loader
==============

Script de apoyo para recuperar el ultimo podcast via RSS

== Metodo de uso ==

php index.php --slug=<slug_del_config> | wget -i - -O <ruta_de_destino>

== TODO ==

* Enviar información a carpeta de descarga como fallbacl
* Generar versión web y cli independientes
* Crear controlador interno para unificar llamadas cron
* Permitir la copia o movimiento directo del archivo desde el script
* Optimizar la gestión de la cache de simplepie
* Generar diferenciación de distinto tipos de descargas independiente