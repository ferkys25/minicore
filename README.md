# Minicore — Cálculo de Comisiones de Ventas

Aplicación web desarrollada con **Laravel 12** que implementa el patrón **MVC** para calcular comisiones de vendedores basándose en reglas de umbral configurables.

## Descripción

El sistema permite:

- Visualizar la lista de **vendedores** registrados
- Consultar las **reglas de comisión** (umbrales y porcentajes)
- **Filtrar ventas** por rango de fechas
- **Calcular automáticamente** la comisión de cada vendedor según el monto total de sus ventas y las reglas definidas

### Lógica de Comisiones

Las comisiones se calculan con un sistema de **umbrales escalonados**. Se aplica el porcentaje de la regla cuyo `umbral_monto` sea el mayor que no supere el total de ventas del vendedor.

| Umbral | Porcentaje |
|--------|-----------|
| \$0 | 5% |
| \$3,000 | 7% |
| \$6,000 | 9% |
| \$10,000 | 12% |
| \$15,000 | 15% |

## Tecnologías

- **PHP 8.3+**
- **Laravel 12**
- **MySQL** (local) / **PostgreSQL** (producción)
- **Tailwind CSS** (CDN)
- **Blade** (motor de plantillas)

## Estructura del Proyecto

```
app/
├── Http/Controllers/
│   └── ComisionController.php    # Lógica de cálculo de comisiones
└── Models/
    ├── Vendedor.php               # Modelo de vendedores
    ├── Venta.php                  # Modelo de ventas
    └── Regla.php                  # Modelo de reglas de comisión

database/
├── migrations/
│   ├── create_vendedores_table
│   ├── create_reglas_table
│   └── create_ventas_table
└── seeders/
    ├── VendedoresTableSeeder.php
    ├── ReglasTableSeeder.php
    └── VentasTableSeeder.php

resources/views/
├── layouts/
│   └── app.blade.php              # Layout principal
└── comisiones/
    └── index.blade.php            # Vista del dashboard
```

## Instalación Local

### Requisitos

- PHP 8.3+
- Composer
- MySQL 8+
- Laragon (recomendado para Windows)

### Pasos

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/ferkys25/replicaminicore.git
   cd replicaminicore
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar el entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Crear la base de datos**
   ```sql
   CREATE DATABASE replicaminicore;
   ```

5. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

7. **Abrir en el navegador**
   ```
   http://localhost:8000/comisiones
   ```

## Configuración de Base de Datos

El archivo `.env.example` contiene la configuración de referencia:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=replicaminicore
DB_USERNAME=root
DB_PASSWORD=
```

## Uso

1. Acceder a `/comisiones`
2. Se muestran 3 secciones: **Vendedores**, **Reglas de Comisión** y **Cálculo de Comisiones**
3. Seleccionar un rango de fechas y hacer clic en **Calcular**
4. El sistema muestra el total de ventas y la comisión correspondiente por vendedor

## Vista Previa

La aplicación muestra un dashboard con 3 tarjetas:

-  **Vendedores** — Nombre y email de cada vendedor
-  **Reglas** — Tabla de umbrales y porcentajes
-  **Comisiones** — Formulario de filtro + resultados del cálculo

## Deploy

La aplicación está desplegada en **Render.com** con PostgreSQL.
https://minicore-t1vr.onrender.com

## Autor

Proyecto académico — UDLA

## Licencia

Este proyecto es de uso académico.
