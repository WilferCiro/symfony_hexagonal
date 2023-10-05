# Proyecto Symfony con arquitectura hexagonal

Este es un proyecto Symfony desarrollado en PHP 8.2, una poderosa combinación para construir aplicaciones web robustas y eficientes. Symfony es un framework PHP de alto rendimiento y flexible que permite desarrollar aplicaciones web modernas y escalables. En este proyecto, hemos aprovechado las características avanzadas de Symfony junto con las mejoras y optimizaciones de PHP 8.2 para crear una aplicación web de alto nivel.

## Requisitos del Sistema

- PHP 8.2
- Composer
- Symfony CLI
- MySQL (u otro sistema de gestión de bases de datos compatible)

## Estructura del Proyecto

Este proyecto sigue una arquitectura hexagonal, también conocida como Arquitectura de Puertos y Adaptadores. La arquitectura hexagonal se basa en la separación de las preocupaciones y la dependencia de las capas de la aplicación. La estructura del proyecto se organiza en tres carpetas principales:

### `Domain`

La carpeta `Domain` contiene las entidades del dominio y las reglas de negocio. Aquí, definimos las clases que representan los conceptos clave de negocio de nuestra aplicación. Estas clases no dependen de ninguna otra capa y encapsulan la lógica de negocio pura.

### `Application`

La carpeta `Application` contiene los casos de uso de la aplicación. Estos casos de uso representan las interacciones específicas del usuario con la aplicación y orquestan las operaciones utilizando las entidades del dominio. Esta capa depende de la capa de dominio y define las interfaces de los servicios que serán implementados en la capa de infraestructura.

### `Infrastructure`

La carpeta `Infrastructure` contiene los detalles técnicos y las implementaciones concretas. Incluye adaptadores para bases de datos, servicios externos y cualquier otra infraestructura externa. También contiene las implementaciones de los servicios definidos en la capa de aplicación. La capa de infraestructura depende tanto de la capa de dominio como de la capa de aplicación.


## Instalación

1. **Clona el Repositorio:**

```bash
git clone https://github.com/WilferCiro/symfony_hexagonal.git
```

2. **Instala las Dependencias:**

```bash
cd symfony_hexagonal
composer install
```

3. **Configura la Base de Datos:**

ve al archivo .env y modifica la variable DATABASE_URL

4. **Ejecuta las Migraciones y Carga los Datos Iniciales:**

```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

5. **Inicia el Servidor de Desarrollo:**

```bash
symfony serve
```

Ahora puedes acceder a la aplicación en http://localhost:8000.

