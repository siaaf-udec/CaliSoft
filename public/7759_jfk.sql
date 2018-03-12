CREATE TABLE `jobs` (

`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,

`queue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`payload` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`attempts` tinyint(3) UNSIGNED NOT NULL,

`reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,

`available_at` int(10) UNSIGNED NOT NULL,

`created_at` int(10) UNSIGNED NOT NULL,

PRIMARY KEY (`id`) ,

INDEX `jobs_queue_reserved_at_index` (`queue`, `reserved_at`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=36
;



CREATE TABLE `migrations` (

`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`batch` int(11) NOT NULL,

PRIMARY KEY (`id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=31
;



CREATE TABLE `notifications` (

`id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`notifiable_id` int(10) UNSIGNED NOT NULL,

`notifiable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`read_at` timestamp NULL DEFAULT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`id`) ,

INDEX `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`, `notifiable_type`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `password_resets` (

`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

INDEX `password_resets_email_index` (`email`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `TBL_archivobd` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`FK_TipoBdId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_archivobd_fk_proyectoid_foreign` (`FK_ProyectoId`),

INDEX `TBL_archivobd_fk_tipobdid_foreign` (`FK_TipoBdId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=2
;



CREATE TABLE `TBL_calificacionbd` (

`total` int(11) NOT NULL DEFAULT 0,

`acertadas` int(11) NOT NULL DEFAULT 0,

`calificacion` double NOT NULL DEFAULT 0,

`FK_TipoNomenclaturaId` int(10) UNSIGNED NOT NULL,

`FK_ArchivoBdId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

INDEX `TBL_calificacionbd_fk_tiponomenclaturaid_foreign` (`FK_TipoNomenclaturaId`),

INDEX `TBL_calificacionbd_fk_archivobdid_foreign` (`FK_ArchivoBdId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `TBL_casoprueba` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`proposito` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`alcance` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`resultado_esperado` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`criterios` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`prioridad` enum('alta','media','baja') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`limite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

`formulario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`estado` enum('evaluar','carga','terminado') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`entrega` int(11) NOT NULL,

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`calificacion` double NOT NULL DEFAULT 0,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_casoprueba_fk_proyectoid_foreign` (`FK_ProyectoId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_categorias` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`plataforma` int(11) NOT NULL,

`modelado` int(11) NOT NULL,

`base_datos` int(11) NOT NULL,

`codificacion` int(11) NOT NULL,

`descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_categorias_nombre_unique` (`nombre`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=4
;



CREATE TABLE `TBL_comentarios` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`comentario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`FK_UserId` int(10) UNSIGNED NOT NULL,

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`FK_ModuloId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_comentarios_fk_userid_foreign` (`FK_UserId`),

INDEX `TBL_comentarios_fk_proyectoid_foreign` (`FK_ProyectoId`),

INDEX `TBL_comentarios_fk_moduloid_foreign` (`FK_ModuloId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_componentesdocumento` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`required` tinyint(1) NOT NULL,

`descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`FK_TipoDocumentoId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_componentesdocumento_fk_tipodocumentoid_foreign` (`FK_TipoDocumentoId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=43
;



CREATE TABLE `TBL_documentos` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`nota` double(8,2) NULL DEFAULT NULL,

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`FK_TipoDocumentoId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_documentos_fk_proyectoid_foreign` (`FK_ProyectoId`),

INDEX `TBL_documentos_fk_tipodocumentoid_foreign` (`FK_TipoDocumentoId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_entregaprueba` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`numero` int(11) NOT NULL,

`approved` tinyint(1) NULL DEFAULT NULL,

`observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`FK_PruebasId` int(10) UNSIGNED NOT NULL,

`FK_UsuarioId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_entregaprueba_fk_usuarioid_foreign` (`FK_UsuarioId`),

INDEX `TBL_entregaprueba_fk_pruebasid_foreign` (`FK_PruebasId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_entregapruebacarga` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`numero` int(11) NOT NULL,

`approved` tinyint(1) NULL DEFAULT NULL,

`observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`tiempos` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`FK_PruebaCargaId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_entregapruebacarga_fk_pruebacargaid_foreign` (`FK_PruebaCargaId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_evaluaciondocumento` (

`checked` tinyint(1) NOT NULL DEFAULT 0,

`observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`FK_DocumentoId` int(10) UNSIGNED NOT NULL,

`FK_ComponenteId` int(10) UNSIGNED NOT NULL,

`FK_EvaluatorId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`FK_DocumentoId`, `FK_ComponenteId`, `FK_EvaluatorId`) ,

INDEX `TBL_evaluaciondocumento_fk_componenteid_foreign` (`FK_ComponenteId`),

INDEX `TBL_evaluaciondocumento_fk_evaluatorid_foreign` (`FK_EvaluatorId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `TBL_gruposdeinvestigacion` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_gruposdeinvestigacion_nombre_unique` (`nombre`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=4
;



CREATE TABLE `TBL_inputs_types` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`reglas` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=7
;



CREATE TABLE `TBL_itemscodificacion` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`item` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`valor` int(11) NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=8
;



CREATE TABLE `TBL_itemsevaluados` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`atributo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`fila` int(10) UNSIGNED NOT NULL,

`calificacion` tinyint(1) NOT NULL,

`FK_scriptId` int(10) UNSIGNED NOT NULL,

`FK_itemId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_itemsevaluados_fk_scriptid_foreign` (`FK_scriptId`),

INDEX `TBL_itemsevaluados_fk_itemid_foreign` (`FK_itemId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_modulos` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=5
;



CREATE TABLE `TBL_notacodificacion` (

`nota` double(8,2) NOT NULL DEFAULT 0.00,

`total` int(11) NOT NULL DEFAULT 0,

`acertadas` int(11) NOT NULL DEFAULT 0,

`FK_ScriptsId` int(10) UNSIGNED NOT NULL,

`FK_ItemsId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

INDEX `TBL_notacodificacion_fk_scriptsid_foreign` (`FK_ScriptsId`),

INDEX `TBL_notacodificacion_fk_itemsid_foreign` (`FK_ItemsId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `TBL_proyectos` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`state` enum('creacion','propuesta','activo','evaluacion','completado') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'creacion',

`FK_GrupoDeInvestigacionId` int(10) UNSIGNED NOT NULL,

`FK_SemilleroId` int(10) UNSIGNED NULL DEFAULT NULL,

`FK_CategoriaId` int(10) UNSIGNED NULL DEFAULT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_proyectos_nombre_unique` (`nombre`),

INDEX `TBL_proyectos_fk_grupodeinvestigacionid_foreign` (`FK_GrupoDeInvestigacionId`),

INDEX `TBL_proyectos_fk_semilleroid_foreign` (`FK_SemilleroId`),

INDEX `TBL_proyectos_fk_categoriaid_foreign` (`FK_CategoriaId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=32
;



CREATE TABLE `TBL_proyectosasignados` (

`FK_UsuarioId` int(10) UNSIGNED NOT NULL,

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`tipo` enum('invitado','integrante','evaluador') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`FK_UsuarioId`, `FK_ProyectoId`) ,

INDEX `TBL_proyectosasignados_fk_proyectoid_foreign` (`FK_ProyectoId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
;



CREATE TABLE `TBL_pruebacarga` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`usuarios` int(11) NOT NULL,

`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`FK_CasoPruebaId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_pruebacarga_fk_casopruebaid_foreign` (`FK_CasoPruebaId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_pruebas` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`contexto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`calificacion` double NOT NULL,

`FK_CasoPruebaId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_pruebas_fk_casopruebaid_foreign` (`FK_CasoPruebaId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_scripts` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`comentario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,

`estado` enum('sin calificar','calificado') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sin calificar',

`FK_ProyectoId` int(10) UNSIGNED NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

INDEX `TBL_scripts_fk_proyectoid_foreign` (`FK_ProyectoId`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=1
;



CREATE TABLE `TBL_semilleros` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_semilleros_nombre_unique` (`nombre`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=4
;



CREATE TABLE `TBL_testvalues` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`valor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`valido` tinyint(1) NOT NULL DEFAULT 0,

`FK_InputType` int(10) UNSIGNED NOT NULL,

`tipo` enum('xss','sql','html') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=45
;



CREATE TABLE `TBL_tipobd` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=3
;



CREATE TABLE `TBL_tiponomenclatura` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`estandar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`nomenclatura` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`valor` int(11) NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) 

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=10
;



CREATE TABLE `TBL_tiposdocumento` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`required` tinyint(1) NOT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_tiposdocumento_nombre_unique` (`nombre`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=7
;



CREATE TABLE `TBL_usuarios` (

`PK_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

`foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,

`role` enum('admin','student','evaluator') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student',

`remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,

`created_at` timestamp NULL DEFAULT NULL,

`updated_at` timestamp NULL DEFAULT NULL,

PRIMARY KEY (`PK_id`) ,

UNIQUE INDEX `TBL_usuarios_email_unique` (`email`)

)

ENGINE=InnoDB

DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

AUTO_INCREMENT=35
;





ALTER TABLE `TBL_archivobd` ADD CONSTRAINT `TBL_archivobd_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);

ALTER TABLE `TBL_archivobd` ADD CONSTRAINT `TBL_archivobd_fk_tipobdid_foreign` FOREIGN KEY (`FK_TipoBdId`) REFERENCES `TBL_tipobd` (`PK_id`);

ALTER TABLE `TBL_calificacionbd` ADD CONSTRAINT `TBL_calificacionbd_fk_archivobdid_foreign` FOREIGN KEY (`FK_ArchivoBdId`) REFERENCES `TBL_archivobd` (`PK_id`);

ALTER TABLE `TBL_calificacionbd` ADD CONSTRAINT `TBL_calificacionbd_fk_tiponomenclaturaid_foreign` FOREIGN KEY (`FK_TipoNomenclaturaId`) REFERENCES `TBL_tiponomenclatura` (`PK_id`);

ALTER TABLE `TBL_casoprueba` ADD CONSTRAINT `TBL_casoprueba_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);

ALTER TABLE `TBL_comentarios` ADD CONSTRAINT `TBL_comentarios_fk_moduloid_foreign` FOREIGN KEY (`FK_ModuloId`) REFERENCES `TBL_modulos` (`PK_id`);

ALTER TABLE `TBL_comentarios` ADD CONSTRAINT `TBL_comentarios_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);

ALTER TABLE `TBL_comentarios` ADD CONSTRAINT `TBL_comentarios_fk_userid_foreign` FOREIGN KEY (`FK_UserId`) REFERENCES `TBL_usuarios` (`PK_id`);

ALTER TABLE `TBL_componentesdocumento` ADD CONSTRAINT `TBL_componentesdocumento_fk_tipodocumentoid_foreign` FOREIGN KEY (`FK_TipoDocumentoId`) REFERENCES `TBL_tiposdocumento` (`PK_id`);

ALTER TABLE `TBL_documentos` ADD CONSTRAINT `TBL_documentos_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);

ALTER TABLE `TBL_documentos` ADD CONSTRAINT `TBL_documentos_fk_tipodocumentoid_foreign` FOREIGN KEY (`FK_TipoDocumentoId`) REFERENCES `TBL_tiposdocumento` (`PK_id`);

ALTER TABLE `TBL_entregaprueba` ADD CONSTRAINT `TBL_entregaprueba_fk_pruebasid_foreign` FOREIGN KEY (`FK_PruebasId`) REFERENCES `TBL_pruebas` (`PK_id`);

ALTER TABLE `TBL_entregaprueba` ADD CONSTRAINT `TBL_entregaprueba_fk_usuarioid_foreign` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `TBL_usuarios` (`PK_id`);

ALTER TABLE `TBL_entregapruebacarga` ADD CONSTRAINT `TBL_entregapruebacarga_fk_pruebacargaid_foreign` FOREIGN KEY (`FK_PruebaCargaId`) REFERENCES `TBL_pruebacarga` (`PK_id`);

ALTER TABLE `TBL_evaluaciondocumento` ADD CONSTRAINT `TBL_evaluaciondocumento_fk_componenteid_foreign` FOREIGN KEY (`FK_ComponenteId`) REFERENCES `TBL_componentesdocumento` (`PK_id`);

ALTER TABLE `TBL_evaluaciondocumento` ADD CONSTRAINT `TBL_evaluaciondocumento_fk_documentoid_foreign` FOREIGN KEY (`FK_DocumentoId`) REFERENCES `TBL_documentos` (`PK_id`);

ALTER TABLE `TBL_evaluaciondocumento` ADD CONSTRAINT `TBL_evaluaciondocumento_fk_evaluatorid_foreign` FOREIGN KEY (`FK_EvaluatorId`) REFERENCES `TBL_usuarios` (`PK_id`);

ALTER TABLE `TBL_itemsevaluados` ADD CONSTRAINT `TBL_itemsevaluados_fk_itemid_foreign` FOREIGN KEY (`FK_itemId`) REFERENCES `TBL_itemscodificacion` (`PK_id`);

ALTER TABLE `TBL_itemsevaluados` ADD CONSTRAINT `TBL_itemsevaluados_fk_scriptid_foreign` FOREIGN KEY (`FK_scriptId`) REFERENCES `TBL_scripts` (`PK_id`);

ALTER TABLE `TBL_notacodificacion` ADD CONSTRAINT `TBL_notacodificacion_fk_itemsid_foreign` FOREIGN KEY (`FK_ItemsId`) REFERENCES `TBL_itemscodificacion` (`PK_id`);

ALTER TABLE `TBL_notacodificacion` ADD CONSTRAINT `TBL_notacodificacion_fk_scriptsid_foreign` FOREIGN KEY (`FK_ScriptsId`) REFERENCES `TBL_scripts` (`PK_id`);

ALTER TABLE `TBL_proyectos` ADD CONSTRAINT `TBL_proyectos_fk_categoriaid_foreign` FOREIGN KEY (`FK_CategoriaId`) REFERENCES `TBL_categorias` (`PK_id`);

ALTER TABLE `TBL_proyectos` ADD CONSTRAINT `TBL_proyectos_fk_grupodeinvestigacionid_foreign` FOREIGN KEY (`FK_GrupoDeInvestigacionId`) REFERENCES `TBL_gruposdeinvestigacion` (`PK_id`);

ALTER TABLE `TBL_proyectos` ADD CONSTRAINT `TBL_proyectos_fk_semilleroid_foreign` FOREIGN KEY (`FK_SemilleroId`) REFERENCES `TBL_semilleros` (`PK_id`);

ALTER TABLE `TBL_proyectosasignados` ADD CONSTRAINT `TBL_proyectosasignados_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);

ALTER TABLE `TBL_proyectosasignados` ADD CONSTRAINT `TBL_proyectosasignados_fk_usuarioid_foreign` FOREIGN KEY (`FK_UsuarioId`) REFERENCES `TBL_usuarios` (`PK_id`);

ALTER TABLE `TBL_pruebacarga` ADD CONSTRAINT `TBL_pruebacarga_fk_casopruebaid_foreign` FOREIGN KEY (`FK_CasoPruebaId`) REFERENCES `TBL_casoprueba` (`PK_id`);

ALTER TABLE `TBL_pruebas` ADD CONSTRAINT `TBL_pruebas_fk_casopruebaid_foreign` FOREIGN KEY (`FK_CasoPruebaId`) REFERENCES `TBL_casoprueba` (`PK_id`);

ALTER TABLE `TBL_scripts` ADD CONSTRAINT `TBL_scripts_fk_proyectoid_foreign` FOREIGN KEY (`FK_ProyectoId`) REFERENCES `TBL_proyectos` (`PK_id`);



