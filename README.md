# Eventomania
Prerrequisitos
Es necesario contar con la paquetería de software libre Xampp

¿Cómo inició el proyecto?

Para probar el software:
1. Importe el proyecto dentro de la carpeta htdocs de Xampp 
2. Encienda el módulo de Apache y MYSQL en el gestor de Xampp
2. Importe el script eventomania.sql dentro de una base de datos con el nombre de 'eventomania'; para ello haga uso del SGBD Mysql
3. Diríjase a http://localhost/FinalPHP/vistas/login_formulario.php

Ingresa el documento-> 1000999333 y la clave-> clave para acceder a la vista de administrador; o con el documento-> 822022 y clave-> clave para
conocer la vista de cliente.

Como administrador el software te permite crear actividades como conciertos o presentaciones y eventos vinculados a dichas actividades con una fecha, hora y
aforo concreto. Por otro lado puedes crear eventos conjuntos, esta funcionalidad te permitirá especificar una fecha hora y aforo concreto; dichas especificaciones crearán 
eventos de forma semanal hasta finalizar el mes, por lo cual podrías crear un evento conjunto un lunes y el sistema mostraría eventos iguales durante todos los lunes
del mes. Adicionalmente te ofrece la opción de publicar dichos eventos. Al estos ser publicados es posible para el cliente visualizarlos en el listado de 
eventos ofertados.

Como cliente puedes visualizar los eventos que se encuentren publicados e inscribirte a un evento por semana, al realizar la inscripción los cupos disponibles en el evento
disminuirán, el cliente también tiene la posibilidad de cancelar su asistencia.
