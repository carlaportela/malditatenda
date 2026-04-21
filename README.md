# 🛍️ Maldita Carlita - Tienda Online Artesanal

![Laravel](https://img.shields.io/badge/Laravel-Backend-red)
![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Tailwind](https://img.shields.io/badge/TailwindCSS-UI-38B2AC)
![Stripe](https://img.shields.io/badge/Stripe-Payments-635BFF)
![Status](https://img.shields.io/badge/status-in%20development-yellow)
![License](https://img.shields.io/badge/license-MIT-green)

Aplicación web e-commerce desarrollada para la marca artesanal **Maldita Carlita**, enfocada en la venta de productos hechos a mano como cerámica, bordados e ilustraciones.

---

## 🚀 Demo

🔗 Próximamente (deploy en Render)

---

## 📌 Descripción del Proyecto

Este proyecto consiste en el desarrollo completo de una tienda online que permite:

* Visualizar productos artesanales
* Gestionar usuarios (clientes y administrador)
* Realizar pedidos online
* Integrar pagos seguros mediante Stripe
* Administrar productos, pedidos y descuentos

La aplicación está diseñada como una solución escalable, accesible y centrada en la experiencia de usuario.

---

## 🎯 Objetivos

* Aumentar la visibilidad de la marca
* Facilitar la venta directa sin intermediarios
* Mejorar la gestión de pedidos
* Ofrecer una experiencia de compra rápida, segura y responsive

---

## 👥 Roles de Usuario

### 🧑 Usuario Invitado

* Ver productos
* Añadir al carrito
* Contactar con la tienda

### 👤 Usuario Registrado (Cliente)

* Gestión de perfil
* Historial de pedidos
* Compra rápida

### 🛠️ Administrador

* CRUD de productos
* Gestión de pedidos
* Gestión de usuarios
* Gestión de descuentos
* Gestión de mensajes

---

## 🧱 Stack Tecnológico

### Frontend

* HTML5
* CSS3
* JavaScript
* Tailwind CSS

### Backend

* PHP
* Laravel (arquitectura MVC)

### Base de Datos

* MySQL
* phpMyAdmin

### Pagos

* Stripe

### Herramientas

* Visual Studio Code
* Git & GitHub

---

## ⚙️ Arquitectura

El proyecto sigue una arquitectura **MVC (Model-View-Controller)**:

```
Frontend (Cliente)
   ↓
Controladores (Laravel)
   ↓
Modelos (Eloquent)
   ↓
Base de Datos (MySQL)
```

---

## 🔐 Seguridad

* Validación en frontend y backend
* Protección contra XSS y CSRF (Laravel)
* Encriptación de datos
* Autenticación de usuarios
* Uso de HTTPS (SSL)

---

## 🧩 Funcionalidades Principales

* 🛒 Carrito de compra
* 💳 Pasarela de pago (Stripe)
* 👤 Autenticación de usuarios
* 📦 Gestión de pedidos
* 🏷️ Sistema de descuentos
* 📬 Formulario de contacto
* 📱 Diseño responsive

---

## 🎨 Diseño UI/UX

Principios aplicados:

* Diseño limpio y minimalista
* Responsive design (mobile-first)
* Accesibilidad (atributos `alt`, contraste)
* Jerarquía visual clara
* Estética "handmade"

---

## 📊 Base de Datos

Entidades principales:

* Users
* Products
* Orders
* Discounts
* Payments

Relaciones clave:

* Un usuario → múltiples pedidos
* Un pedido → múltiples productos
* Un pedido → un pago

---

## 🚀 Despliegue

Plataforma recomendada:

* Render (PaaS)

Ventajas:

* Deploy automático desde Git
* SSL incluido
* Escalabilidad
* Soporte Laravel

---

## 📈 Estrategia de Marketing

* SEO (optimización web)
* Social Media (Instagram)
* Email Marketing
* SEM (Google Ads)

---

## 📅 Roadmap / Futuras Mejoras

### 🔧 Técnicas

* API REST
* Optimización con caching
* Lazy loading

### 🧪 Funcionales

* Valoraciones de productos
* Lista de favoritos
* Personalización de pedidos

### 🌍 Negocio

* Integración con redes sociales
* Blog
* Expansión omnicanal

---

## 📦 Instalación Local

```bash
# Clonar repositorio
git clone https://github.com/tuusuario/tu-repo.git

cd tu-repo

# Instalar dependencias PHP
composer install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env

# Migraciones
php artisan migrate

# Servidor local
php artisan serve
```

---

## 🧪 Testing

* Validación manual de formularios
* Pruebas responsive
* Test de flujo de compra

---

## 💰 Coste del Proyecto (estimado)

* 💻 Desarrollo: ~5000€
* 🛠️ Mantenimiento anual: ~1500€
* 📢 Marketing inicial: ~300€

---

## 📚 Aprendizajes Clave

* Desarrollo full stack completo
* Integración de pasarela de pago
* Diseño centrado en el usuario
* Gestión de un proyecto real end-to-end

---

## 📄 Licencia

Este proyecto es de uso educativo y portfolio.

---

## 👩‍💻 Autor

**Carla Portela Ubeira**

---

## ⭐ Contribuciones

Las contribuciones son bienvenidas:

1. Haz un fork del proyecto
2. Crea una rama (`feature/nueva-feature`)
3. Abre un Pull Request

---

## 📬 Contacto

Para dudas o colaboración:

* GitHub
* Email (opcional)

---
