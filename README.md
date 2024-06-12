# Restaurant Tables Module

Módulo de Mesas para Restaurante

Este módulo de mesas para restaurante proporciona una solución completa para gestionar eficientemente las mesas en un entorno de restaurante. Con capacidades para asignar o reservar mesas, generar facturas, mantener un historial de acciones en el sistema y gestionar tipos de mesas y clientes, es una herramienta imprescindible para cualquier establecimiento gastronómico.

## Características Principales

-   💼 **Gestión de Mesas:** Asigna o reserva mesas de forma intuitiva y eficiente.
-   🧾 **Generación de Facturas:** Crea facturas fácilmente para cada mesa ocupada.
-   📜 **Historial de Acciones:** Registra todas las acciones realizadas en el sistema para un seguimiento completo.
-   🪑 **Gestión de Tipos de Mesas:** Define diferentes tipos de mesas según las necesidades del restaurante.
-   👥 **Gestión de Clientes:** Administra la información de los clientes para un servicio personalizado.

## Gestión de Mesas

El módulo de mesas para restaurante permite asignar o reservar mesas de manera sencilla y eficiente. Puedes realizar las siguientes acciones:

-   🍽️ **Asignar Mesa:** Marca una mesa como ocupada cuando un cliente se sienta en ella.
-   📅 **Reservar Mesa:** Bloquea una mesa para una reserva futura, indicando la fecha y hora de la reserva.

## Instalación

Sigue estos pasos para instalar y configurar el módulo en tu proyecto Laravel:

### Requisitos Previos

-   💻 [PHP](https://www.php.net/) >= 8.2
-   📦 [Composer](https://getcomposer.org/)
-   📦 [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/) (para compilar los recursos frontend)

### Pasos de Instalación

1. Clona este repositorio en tu máquina local:

    ```bash
    git clone https://github.com/StevenU21/restaurant_table_module.git
    ```

2. Navega hasta el directorio del proyecto:

    ```bash
    cd restaurant_table_module
    ```

3. Instala las dependencias de PHP utilizando Composer:

    ```bash
    composer install
    ```

4. Copia el archivo de configuración `.env.example` a `.env`:

    ```bash
    cp .env.example .env
    ```

5. Genera una nueva clave de aplicación:

    ```bash
    php artisan key:generate
    ```

6. Configura tu base de datos en el archivo `.env`. Por ejemplo:

    ```plaintext
    DB_CONNECTION=mysql o sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

7. Ejecuta las migraciones y los seeders para crear la estructura de la base de datos y poblarla con datos de prueba:

    ```bash
    php artisan migrate --seed
    ```

8. Compila los recursos frontend (JavaScript, CSS, etc.):

    ```bash
    npm install && npm run dev
    ```

9. ¡Listo! Puedes iniciar el servidor de desarrollo de Laravel y empezar a utilizar el módulo:

    ```bash
    php artisan serve
    ```

## Contribución

Si encuentras algún error o tienes alguna sugerencia para mejorar este módulo, ¡no dudes en contribuir! Abre un issue o envía una pull request con tus cambios.
