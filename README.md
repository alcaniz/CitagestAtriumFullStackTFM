# Instrucciones de Implementación

Este documento proporciona una guía detallada para la configuración y despliegue de la aplicación. Se asume una familiaridad básica con los entornos de servidor web y bases de datos MySQL.

## Paso 1: Preparación del Entorno del Servidor

Inicialmente, debe preparar el entorno del servidor para alojar los componentes de la aplicación:

- Extraiga los contenidos del archivo comprimido, htdocs.rar o .zip, localizado en `htdocs`.
- Deposite estos archivos en el directorio raíz del servidor, asignándoles el nombre `citagest`.

## Paso 2: Configuración de la Base de Datos MySQL

La aplicación requiere la instalación de una base de datos específica:

- Ubique el archivo `citagest.sql`, que se encuentra en el directorio `\citagest\db\` dentro del paquete del proyecto.
- Utilice dicho archivo para instalar y configurar la base de datos `citagest` en su sistema de gestión de bases de datos MySQL.

## Paso 3: Establecimiento de la Conexión con la Base de Datos

Es esencial configurar adecuadamente la conexión a la base de datos:

- Acceda al archivo `/api/db.php` en la estructura de archivos de la aplicación.
- Modifique las credenciales del servidor (dirección del servidor, nombre de usuario, contraseña) para que coincidan con las configuraciones de su instancia de MySQL.

**Sugerencia:** Se aconseja encarecidamente la creación de un usuario exclusivo para esta aplicación en su sistema de base de datos, por ejemplo, `citagest`.

## Paso 4: Verificación Final y Activación

Tras completar los pasos anteriores, proceda a:

- Revisar exhaustivamente que todas las configuraciones sean correctas.
- Iniciar la aplicación.

Si se han seguido las instrucciones con precisión, la aplicación debería operar de manera óptima.

---

En caso de enfrentar dificultades o para consultas adicionales, por favor, inicie un issue en este repositorio de GitHub.
