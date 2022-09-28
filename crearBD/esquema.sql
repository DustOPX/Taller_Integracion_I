CREATE DATABASE IF NOT EXISTS usuarios_login;
USE usuarios_login;
/* Luego crea la tabla de los usuarios */
CREATE TABLE IF NOT EXISTS usuarios(
    `id` bigint unsigned NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `rut` varchar(255) DEFAULT NULL,
    `correo` varchar(255) NOT NULL unique, /*UNIQUE para evitar la duplicidad de usuarios*/
    `keyword` varchar(255) NOT NULL,
    `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    primary key(id)
);

/* Nota: no borres la siguiente línea en blanco */
