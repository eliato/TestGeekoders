# Host: 127.0.0.1  (Version 5.5.5-10.3.22-MariaDB-1ubuntu1)
# Date: 2020-07-27 16:55:53
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "empresas"
#

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(45) DEFAULT NULL COMMENT 'nombre de empresa',
  `nit` varchar(45) DEFAULT NULL COMMENT 'nit de la empresa',
  `telefono` varchar(45) DEFAULT NULL COMMENT 'telefono de la empresa',
  `direccion` varchar(45) DEFAULT NULL COMMENT 'direccion de la empresa',
  `id_municipio` varchar(24) DEFAULT NULL COMMENT 'id del municipio',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (1,'Demo','0418-121220-122-2','22922222','san salvador, el salvador','122',NULL,NULL),(4,'NUEVA EMPRESA','3232323-2323-232-2','2322222','misma direccion','san salvador','2020-07-27 22:49:33','2020-07-27 22:49:33');

#
# Structure for table "failed_jobs"
#

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#


#
# Structure for table "migrations"
#

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);

#
# Structure for table "password_resets"
#

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "Roles"
#

CREATE TABLE `Roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT 'rol',
  `descripcionRol` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `permisos` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Empresas_idempresa` int(3) DEFAULT NULL COMMENT 'id de la empresa',
  PRIMARY KEY (`idRol`),
  KEY `fk_Rol_empresa` (`Empresas_idempresa`),
  CONSTRAINT `fk_Rol_empresa` FOREIGN KEY (`Empresas_idempresa`) REFERENCES `empresas` (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "Roles"
#


#
# Structure for table "Empleados"
#

CREATE TABLE `Empleados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `dui` int(10) DEFAULT NULL COMMENT 'documento unico de identidad',
  `nit` varchar(17) DEFAULT NULL,
  `estado` tinyint(2) DEFAULT 1 COMMENT '1=Activo, 2=inactivo',
  `Empresas_idEmpresa` int(3) DEFAULT NULL COMMENT 'id de la empresa a la que pertenece',
  `Roles_idRol` int(3) DEFAULT NULL COMMENT 'id del rol que tiene asignado',
  PRIMARY KEY (`Id`),
  KEY `fk_Empleado_Rol` (`Roles_idRol`),
  KEY `fk_Empleado_Empresa` (`Empresas_idEmpresa`),
  CONSTRAINT `fk_Empleado_Empresa` FOREIGN KEY (`Empresas_idEmpresa`) REFERENCES `empresas` (`idEmpresa`),
  CONSTRAINT `fk_Empleado_Rol` FOREIGN KEY (`Roles_idRol`) REFERENCES `Roles` (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "Empleados"
#


#
# Structure for table "users"
#

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'elias','elias@gmail.com',NULL,'$2y$10$JQVwElW2TmhepV3Y9ibL2O28rCDM7ITFmtMwPwSHUafC5p8am09gC',NULL,'2020-07-27 18:45:31','2020-07-27 18:45:31');
