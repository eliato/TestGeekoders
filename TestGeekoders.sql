# Host: 127.0.0.1  (Version 5.5.5-10.3.22-MariaDB-1ubuntu1)
# Date: 2020-07-28 02:19:44
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (1,'EMPRESA DEMO','0217-121289-102-0','2292-3222','direccion demostracion','11','2020-07-28 07:28:48','2020-07-28 07:28:48');

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
# Structure for table "municipios"
#

CREATE TABLE `municipios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMunicipio` varchar(25) DEFAULT NULL,
  `idDepartamento` int(2) DEFAULT NULL COMMENT 'id del departamento al que pertenese',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "municipios"
#

INSERT INTO `municipios` VALUES (1,'Ahuchapan',1),(2,'Apaneca',1),(3,'Atiquizaya',1),(4,'Concepcion de Ataco',1),(5,'El Refugio',1),(6,'Guaymanco',1),(7,'Jujutla',1),(8,'San Francisco Menendez',1),(9,'San Lorenzo',1),(10,'San Pedro Puxtla',1),(11,'Tacuba',1),(12,'Turin',1);

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
# Structure for table "roles"
#

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT 'rol',
  `descripcionRol` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `permisos` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Empresas_idempresa` int(3) DEFAULT NULL COMMENT 'id de la empresa',
  PRIMARY KEY (`idRol`),
  KEY `fk_Rol_empresa` (`Empresas_idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Supervisor','supervisa','modificar',1);

#
# Structure for table "empleados"
#

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `dui` int(10) DEFAULT NULL COMMENT 'documento unico de identidad',
  `nit` varchar(17) DEFAULT NULL,
  `estado` tinyint(2) DEFAULT 1 COMMENT '1=Activo, 2=inactivo',
  `Empresas_idEmpresa` int(3) DEFAULT NULL COMMENT 'id de la empresa a la que pertenece',
  `Roles_idRol` int(3) DEFAULT NULL COMMENT 'id del rol que tiene asignado',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Empleado_Rol` (`Roles_idRol`),
  KEY `fk_empleado_empresa` (`Empresas_idEmpresa`),
  CONSTRAINT `fk_Empleado_Rol` FOREIGN KEY (`Roles_idRol`) REFERENCES `roles` (`idRol`),
  CONSTRAINT `fk_empleado_empresa` FOREIGN KEY (`Empresas_idEmpresa`) REFERENCES `empresas` (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "empleados"
#

INSERT INTO `empleados` VALUES (1,'FASDF','SDFSAD',32323323,'233332',1,1,1,'2020-07-28 08:05:41','2020-07-28 08:05:41');

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
