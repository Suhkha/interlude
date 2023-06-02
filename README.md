# Proyecto de Chat con Laravel

Este es un proyecto de chat desarrollado con Laravel, Jetstream, Vue.js, Laravel Pusher y Echo. Implementando un chat en tiempo real donde los usuarios pueden comunicarse entre sí.

## Instalación

1- Clonar el repositorio del proyecto y ejecutar:

`composer install`

2- Crear el archivo de entorno .env y configura la conexión a la base de datos y las credenciales de Pusher. Se tiene el archivo .env.example como base.

3- Generar una clave de aplicación:

`php artisan key:generate`

Ejecuta las migraciones para crear las tablas de la base de datos:

4- Correr migraciones y el seeder con información de algunos chat base:

`php artisan migrate`

`php artisan db:seed`

5- Instalar las dependencias de JavaScript utilizando npm:

`npm install`

6- Configurar de Laravel Echo y Pusher.

Para este ejercicio se realizó una cuenta en Pusher y creó una nueva aplicación. Las variables utilizadas para Pusher se encuentran en el archivo .env_example

## Ejecutar el proyecto

Para ejecutar el proyecto, sigue los pasos a continuación:

1- Iniciar el servidor de desarrollo de Laravel:

`php artisan serve`

2- Compilar los assets:

`npm run dev`

3- Acceder a http://localhost:8000.

## Rutas

El proyecto proporciona las siguientes rutas para la funcionalidad del chat:

**/dashboard:** Ruta para el panel de control - por default con Jetstream.
**/chat:** Ruta para la interfaz de chat en tiempo real.
**/chats:** Ruta para obtener la lista de chats.
**/chat/{chatId}/messages:** Ruta para obtener los mensajes de un chat específico.
**/chat/{chatId}/message:** Ruta para enviar un mensaje a un chat específico.

## Comandos personalizados

El proyecto incluye un comando personalizado para enviar el historial del chat por correo electrónico al final del día.

`php artisan send:chatHistory`

Este comando encola el envío de correos en la cola de Laravel para su procesamiento posterior.

## Ejecución de la cola de correos

Para procesar la cola de correos y enviar los correos electrónicos encolados, ejecutar el siguiente comando:

`php artisan queue:work`

## Puntos del ejercicios realizados en este proyecto:

1- Chats entre usuarios

2- Multiples chats

3- Comandos y colas

_Cualquier duda al respecto quedo al pendiente._
