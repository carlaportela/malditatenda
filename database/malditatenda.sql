-- =====================================
-- CREAR BASE DE DATOS
-- =====================================

DROP DATABASE IF EXISTS malditatenda;

CREATE DATABASE malditatenda
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE malditatenda;


-- =====================================
-- USERS (Laravel compatible)
-- =====================================

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(255),
    cp VARCHAR(10),
    localidad VARCHAR(100),
    provincia VARCHAR(100),
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);


-- =====================================
-- CATEGORIAS
-- =====================================

CREATE TABLE categorias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    slug VARCHAR(150) UNIQUE,
    descripcion TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);


-- =====================================
-- PRODUCTOS
-- =====================================

CREATE TABLE productos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    categoria_id BIGINT UNSIGNED,
    imagen VARCHAR(255),
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (categoria_id)
    REFERENCES categorias(id)
    ON DELETE SET NULL
);


-- =====================================
-- CARRITOS
-- =====================================

CREATE TABLE carritos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


-- =====================================
-- CARRITO ITEMS
-- =====================================

CREATE TABLE carrito_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    carrito_id BIGINT UNSIGNED,
    producto_id BIGINT UNSIGNED,
    cantidad INT DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (carrito_id)
    REFERENCES carritos(id)
    ON DELETE CASCADE,

    FOREIGN KEY (producto_id)
    REFERENCES productos(id)
    ON DELETE CASCADE
);


-- =====================================
-- PEDIDOS
-- =====================================

CREATE TABLE pedidos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    total DECIMAL(10,2) DEFAULT 0,
    estado ENUM(
        'pendiente',
        'pagado',
        'enviado',
        'entregado',
        'cancelado'
    ) DEFAULT 'pendiente',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


-- =====================================
-- PEDIDO ITEMS
-- =====================================

CREATE TABLE pedido_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pedido_id BIGINT UNSIGNED,
    producto_id BIGINT UNSIGNED,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (pedido_id)
    REFERENCES pedidos(id)
    ON DELETE CASCADE,

    FOREIGN KEY (producto_id)
    REFERENCES productos(id)
    ON DELETE SET NULL
);


-- =====================================
-- PAGOS
-- =====================================

CREATE TABLE pagos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pedido_id BIGINT UNSIGNED,
    metodo VARCHAR(50),
    estado VARCHAR(50),
    transaccion_id VARCHAR(255),
    monto DECIMAL(10,2),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (pedido_id)
    REFERENCES pedidos(id)
    ON DELETE CASCADE
);


-- =====================================
-- ENVIOS
-- =====================================

CREATE TABLE envios (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pedido_id BIGINT UNSIGNED,
    direccion VARCHAR(255),
    empresa VARCHAR(100),
    tracking VARCHAR(255),
    estado VARCHAR(50),
    fecha_envio DATETIME,
    fecha_entrega DATETIME,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (pedido_id)
    REFERENCES pedidos(id)
    ON DELETE CASCADE
);


-- =====================================
-- DATOS DE EJEMPLO
-- =====================================

INSERT INTO categorias (nombre,slug,descripcion) VALUES
('Cerámica','ceramica','Productos de cerámica artesanal'),
('Bordados','bordados','Bordados hechos a mano'),
('Ilustración','ilustracion','Láminas e ilustraciones');


INSERT INTO productos (nombre,slug,descripcion,precio,stock,categoria_id,imagen)
VALUES
('Bastidor Floral','bastidor-floral','Bordado artesanal hecho a mano',29.90,5,2,'productos/bastidor1.jpg'),
('Taza Artesanal','taza-artesanal','Taza de cerámica hecha a mano',19.90,8,1,'productos/taza1.jpg'),
('Lámina Botánica','lamina-botanica','Ilustración botánica decorativa',15.90,10,3,'productos/lamina1.jpg');