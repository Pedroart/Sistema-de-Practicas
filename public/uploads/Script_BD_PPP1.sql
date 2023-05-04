--

-- ER/Studio 8.0 SQL Code Generation

-- Company :      UNJFSC

-- Project :      Modelo_ER_PPP.DM1

-- Author :       Usuario de Windows

--

-- Date Created : Sunday, April 23, 2023 20:41:26

-- Target DBMS : MySQL 5.x

--



-- 

-- TABLE: Alumno 

--



CREATE TABLE Alumno(

    Id_Alumno          CHAR(10)       NOT NULL,

    Id_escuela         VARCHAR(10)    NOT NULL,

    Ape_Pat_Alumno     VARCHAR(20),

    Ape_Mat_Alumno     VARCHAR(20),

    Nom_Alumno         VARCHAR(50),

    Fec_Nac_Alumno     DATE,

    Id_Departamento    VARCHAR(2)     NOT NULL,

    Id_facultad        VARCHAR(10)    NOT NULL,

    PRIMARY KEY (Id_Alumno, Id_escuela, Id_Departamento, Id_facultad)

)

;







-- 

-- TABLE: Departamento 

--



CREATE TABLE Departamento(

    Id_Departamento        VARCHAR(5)      NOT NULL,

    Id_Pais                VARCHAR(3)      NOT NULL,

    Nombre_Departamento    VARCHAR(100),

    PRIMARY KEY (Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Departamento_Academico 

--



CREATE TABLE Departamento_Academico(

    Id_Departamento     VARCHAR(2)      NOT NULL,

    Nom_Departamento    VARCHAR(100),

    Obs_Departamento    VARCHAR(100),

    Id_facultad         VARCHAR(10)     NOT NULL,

    PRIMARY KEY (Id_Departamento, Id_facultad)

)

;







-- 

-- TABLE: Distrito 

--



CREATE TABLE Distrito(

    Id_Distrito        VARCHAR(5)      NOT NULL,

    Id_Provincia       VARCHAR(5)      NOT NULL,

    Id_Departamento    VARCHAR(5)      NOT NULL,

    Id_Pais            VARCHAR(3)      NOT NULL,

    Nom_Distrito       VARCHAR(100),

    PRIMARY KEY (Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Docente 

--



CREATE TABLE Docente(

    Id_Docente          VARCHAR(10)     NOT NULL,

    Ape_Pat_Docente     VARCHAR(20),

    Ape_Mat_Docente     VARCHAR(20),

    Nom_Docente         VARCHAR(50),

    Email_Docente       VARCHAR(100),

    Telefono_Docente    VARCHAR(15),

    Id_Departamento     VARCHAR(2)      NOT NULL,

    Id_facultad         VARCHAR(10)     NOT NULL,

    PRIMARY KEY (Id_Docente, Id_Departamento, Id_facultad)

)

;







-- 

-- TABLE: Documento 

--



CREATE TABLE Documento(

    Id_Documento     VARCHAR(2)     NOT NULL,

    Nom_Documento    VARCHAR(50),

    PRIMARY KEY (Id_Documento)

)

;







-- 

-- TABLE: Email_Jefe_Inmediato_Empresa 

--



CREATE TABLE Email_Jefe_Inmediato_Empresa(

    Id_Email               CHAR(2)        NOT NULL,

    Id_Jefe_Inm_Empresa    VARCHAR(10)    NOT NULL,

    Id_Empresa             VARCHAR(10)    NOT NULL,

    Id_Distrito            VARCHAR(5)     NOT NULL,

    Id_Provincia           VARCHAR(5)     NOT NULL,

    Id_Departamento        VARCHAR(5)     NOT NULL,

    Id_Pais                VARCHAR(3)     NOT NULL,

    Email_Jefe             VARCHAR(50),

    Estado                 VARCHAR(10),

    PRIMARY KEY (Id_Email, Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Email_Representante_Empresa 

--



CREATE TABLE Email_Representante_Empresa(

    Id_Email                    CHAR(2)        NOT NULL,

    Id_Representante_Empresa    VARCHAR(10)    NOT NULL,

    Id_Empresa                  VARCHAR(10)    NOT NULL,

    Id_Distrito                 VARCHAR(5)     NOT NULL,

    Id_Provincia                VARCHAR(5)     NOT NULL,

    Id_Departamento             VARCHAR(5)     NOT NULL,

    Id_Pais                     VARCHAR(3)     NOT NULL,

    Email_Representante         VARCHAR(50),

    Estado                      VARCHAR(10),

    PRIMARY KEY (Id_Email, Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Empresa 

--



CREATE TABLE Empresa(

    Id_Empresa                      VARCHAR(10)     NOT NULL,

    Id_Distrito                     VARCHAR(5)      NOT NULL,

    Id_Provincia                    VARCHAR(5)      NOT NULL,

    Id_Departamento                 VARCHAR(5)      NOT NULL,

    Id_Pais                         VARCHAR(3)      NOT NULL,

    RUC                             VARCHAR(15),

    Razon_Social_Empreza            VARCHAR(100),

    Dir_Empresa                     CHAR(10),

    Referencia_Ubicacion_Empresa    VARCHAR(100),

    Mapa_Ubicacion_Empresa          LONGBLOB,

    PRIMARY KEY (Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: `Empresa Alumno` 

--



CREATE TABLE `Empresa Alumno`(

    Id_Empresa          VARCHAR(10)    NOT NULL,

    Id_Distrito         VARCHAR(5)     NOT NULL,

    Id_Provincia        VARCHAR(5)     NOT NULL,

    Id_Departamento     VARCHAR(5)     NOT NULL,

    Id_Pais             VARCHAR(3)     NOT NULL,

    Id_Alumno           CHAR(10)       NOT NULL,

    Id_escuela          VARCHAR(10)    NOT NULL,

    Id_Modalidad        VARCHAR(2)     NOT NULL,

    Id_Tipo_PPP         VARCHAR(2)     NOT NULL,

    Id_Documento        VARCHAR(2)     NOT NULL,

    Id_facultad         VARCHAR(10)    NOT NULL,

    Id_Docente          VARCHAR(10)    NOT NULL,

    Tipo_Docente        VARCHAR(15),

    Fecha_Inicio_PPP    DATE,

    Fecha_Fin_PPP       DATE,

    Semestre            VARCHAR(10),

    Estado              VARCHAR(10),

    PRIMARY KEY (Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais, Id_Alumno, Id_escuela, Id_Modalidad, Id_Tipo_PPP, Id_Documento, Id_facultad, Id_Docente)

)

;







-- 

-- TABLE: Escuela 

--



CREATE TABLE Escuela(

    Id_escuela         VARCHAR(10)     NOT NULL,

    Nom_Escuela        VARCHAR(100),

    Obs_Escuela        VARCHAR(200),

    Id_Departamento    VARCHAR(2)      NOT NULL,

    Id_facultad        VARCHAR(10)     NOT NULL,

    PRIMARY KEY (Id_escuela, Id_Departamento, Id_facultad)

)

;







-- 

-- TABLE: Facultad 

--



CREATE TABLE Facultad(

    Id_facultad     VARCHAR(10)     NOT NULL,

    Nom_Facultad    VARCHAR(100),

    Obs_Facultad    VARCHAR(200),

    PRIMARY KEY (Id_facultad)

)

;







-- 

-- TABLE: Jefe_Inmediato_Empresa 

--



CREATE TABLE Jefe_Inmediato_Empresa(

    Id_Jefe_Inm_Empresa        VARCHAR(10)    NOT NULL,

    Id_Empresa                 VARCHAR(10)    NOT NULL,

    Id_Distrito                VARCHAR(5)     NOT NULL,

    Id_Provincia               VARCHAR(5)     NOT NULL,

    Id_Departamento            VARCHAR(5)     NOT NULL,

    Id_Pais                    VARCHAR(3)     NOT NULL,

    Ape_Pat_Jef_Inm_Empresa    VARCHAR(20),

    Ape_Mat_Jef_Inm_Empresa    VARCHAR(20),

    Nom_Jef_Inm_Empresa        VARCHAR(50),

    Cargo_Jef_Inm_Empresa      VARCHAR(50),

    Email_Jef_Inm_Empresa      VARCHAR(10),

    PRIMARY KEY (Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Modalidad_Practicas_Pre_Profesionales 

--



CREATE TABLE Modalidad_Practicas_Pre_Profesionales(

    Id_Modalidad     VARCHAR(2)      NOT NULL,

    Dsc_Modalidad    VARCHAR(100),

    PRIMARY KEY (Id_Modalidad)

)

;







-- 

-- TABLE: Pais 

--



CREATE TABLE Pais(

    Id_Pais     VARCHAR(3)      NOT NULL,

    Nom_Pais    VARCHAR(100),

    PRIMARY KEY (Id_Pais)

)

;







-- 

-- TABLE: Provincia 

--



CREATE TABLE Provincia(

    Id_Provincia       VARCHAR(5)      NOT NULL,

    Id_Departamento    VARCHAR(5)      NOT NULL,

    Id_Pais            VARCHAR(3)      NOT NULL,

    Nom_Provincia      VARCHAR(100),

    PRIMARY KEY (Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Representante_Empresa 

--



CREATE TABLE Representante_Empresa(

    Id_Representante_Empresa    VARCHAR(10)    NOT NULL,

    Id_Empresa                  VARCHAR(10)    NOT NULL,

    Id_Distrito                 VARCHAR(5)     NOT NULL,

    Id_Provincia                VARCHAR(5)     NOT NULL,

    Id_Departamento             VARCHAR(5)     NOT NULL,

    Id_Pais                     VARCHAR(3)     NOT NULL,

    Ape_Pat_Rep_Empresa         VARCHAR(20),

    Ape_Mat_Rep_Empresa         VARCHAR(20),

    Nom_RepEmpresa              CHAR(10),

    Cargo_RepEmpresa            VARCHAR(50),

    Estado_RepEmpresa           VARCHAR(10),

    PRIMARY KEY (Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Telefono_Jefe_Inmediato_Empresa 

--



CREATE TABLE Telefono_Jefe_Inmediato_Empresa(

    Id_Telefono            CHAR(2)        NOT NULL,

    Id_Jefe_Inm_Empresa    VARCHAR(10)    NOT NULL,

    Id_Empresa             VARCHAR(10)    NOT NULL,

    Id_Distrito            VARCHAR(5)     NOT NULL,

    Id_Provincia           VARCHAR(5)     NOT NULL,

    Id_Departamento        VARCHAR(5)     NOT NULL,

    Id_Pais                VARCHAR(3)     NOT NULL,

    Numero_Telefono        VARCHAR(10),

    Estado                 VARCHAR(10),

    PRIMARY KEY (Id_Telefono, Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Telefono_Representante_Empresa 

--



CREATE TABLE Telefono_Representante_Empresa(

    Id_Telefono                 CHAR(2)        NOT NULL,

    Id_Representante_Empresa    VARCHAR(10)    NOT NULL,

    Id_Empresa                  VARCHAR(10)    NOT NULL,

    Id_Distrito                 VARCHAR(5)     NOT NULL,

    Id_Provincia                VARCHAR(5)     NOT NULL,

    Id_Departamento             VARCHAR(5)     NOT NULL,

    Id_Pais                     VARCHAR(3)     NOT NULL,

    Numero_Telefono             VARCHAR(10),

    Estado                      VARCHAR(10),

    PRIMARY KEY (Id_Telefono, Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

)

;







-- 

-- TABLE: Tipo_Practica_Pre_Profesionales 

--



CREATE TABLE Tipo_Practica_Pre_Profesionales(

    Id_Tipo_PPP     VARCHAR(2)     NOT NULL,

    Dsc_Tipo_PPP    VARCHAR(10),

    PRIMARY KEY (Id_Tipo_PPP)

)

;



CREATE TABLE RolDocente(
    Id_Rol              VARCHAR(2)     NOT NULL,
    Id_Docente          VARCHAR(2)     NOT NULL,
    Id_Departamento     VARCHAR(2)     NOT NULL,
    Id_facultad         VARCHAR(2)     NOT NULL,
)
;

CREATE TABLE Roles(
    id_Rol              VARCHAR(2)     NOT NULL,
    Nomb_Rol            VARCHAR(10),
)
;

CREATE TABLE Semestre_Matricula(
    Id_Semestre         VARCHAR(10)     NOT NULL,
    Ficha_de_Matricula  BLOB,
    Record_Academico    BLOB,
    Id_facultad       VARCHAR(2)     NOT NULL,
    Id_Departamento   VARCHAR(2)     NOT NULL,
    Id_escula         VARCHAR(2)     NOT NULL,
    Id_Alumno         VARCHAR(2)     NOT NULL,
)
;

CREATE TABLE PagosAlumno(
    Id_Pago             VARCHAR(10)     NOT NULL,
    Id_facultad         VARCHAR(10)     NOT NULL,
    Id_Departamento     VARCHAR(10)     NOT NULL,
    Id_escuela          VARCHAR(10)     NOT NULL,
    Id_Alumno           VARCHAR(10)     NOT NULL,
    Recibo_Pago         BLOB,
)
;

-- 

-- TABLE: Alumno 

--



ALTER TABLE Alumno ADD CONSTRAINT RefEscuela2 

    FOREIGN KEY (Id_escuela, Id_Departamento, Id_facultad)

    REFERENCES Escuela(Id_escuela, Id_Departamento, Id_facultad)

;





-- 

-- TABLE: Departamento 

--



ALTER TABLE Departamento ADD CONSTRAINT RefPais12 

    FOREIGN KEY (Id_Pais)

    REFERENCES Pais(Id_Pais)

;





-- 

-- TABLE: Departamento_Academico 

--



ALTER TABLE Departamento_Academico ADD CONSTRAINT RefFacultad23 

    FOREIGN KEY (Id_facultad)

    REFERENCES Facultad(Id_facultad)

;





-- 

-- TABLE: Distrito 

--



ALTER TABLE Distrito ADD CONSTRAINT RefProvincia14 

    FOREIGN KEY (Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Provincia(Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Docente 

--



ALTER TABLE Docente ADD CONSTRAINT RefDepartamento_Academico21 

    FOREIGN KEY (Id_Departamento, Id_facultad)

    REFERENCES Departamento_Academico(Id_Departamento, Id_facultad)

;





-- 

-- TABLE: Email_Jefe_Inmediato_Empresa 

--



ALTER TABLE Email_Jefe_Inmediato_Empresa ADD CONSTRAINT RefJefe_Inmediato_Empresa6 

    FOREIGN KEY (Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Jefe_Inmediato_Empresa(Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Email_Representante_Empresa 

--



ALTER TABLE Email_Representante_Empresa ADD CONSTRAINT RefRepresentante_Empresa8 

    FOREIGN KEY (Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Representante_Empresa(Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Empresa 

--



ALTER TABLE Empresa ADD CONSTRAINT RefDistrito15 

    FOREIGN KEY (Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Distrito(Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: `Empresa Alumno` 

--



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefEmpresa16 

    FOREIGN KEY (Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Empresa(Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefAlumno17 

    FOREIGN KEY (Id_Departamento, Id_Alumno, Id_escuela, Id_facultad)

    REFERENCES Alumno(Id_Alumno, Id_escuela, Id_Departamento, Id_facultad)

;



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefModalidad_Practicas_Pre_Profesionales18 

    FOREIGN KEY (Id_Modalidad)

    REFERENCES Modalidad_Practicas_Pre_Profesionales(Id_Modalidad)

;



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefTipo_Practica_Pre_Profesionales19 

    FOREIGN KEY (Id_Tipo_PPP)

    REFERENCES Tipo_Practica_Pre_Profesionales(Id_Tipo_PPP)

;



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefDocumento20 

    FOREIGN KEY (Id_Documento)

    REFERENCES Documento(Id_Documento)

;



ALTER TABLE `Empresa Alumno` ADD CONSTRAINT RefDocente24 

    FOREIGN KEY (Id_Departamento, Id_facultad, Id_Docente)

    REFERENCES Docente(Id_Docente, Id_Departamento, Id_facultad)

;





-- 

-- TABLE: Escuela 

--



ALTER TABLE Escuela ADD CONSTRAINT RefDepartamento_Academico22 

    FOREIGN KEY (Id_Departamento, Id_facultad)

    REFERENCES Departamento_Academico(Id_Departamento, Id_facultad)

;





-- 

-- TABLE: Jefe_Inmediato_Empresa 

--



ALTER TABLE Jefe_Inmediato_Empresa ADD CONSTRAINT RefEmpresa11 

    FOREIGN KEY (Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Empresa(Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Provincia 

--



ALTER TABLE Provincia ADD CONSTRAINT RefDepartamento13 

    FOREIGN KEY (Id_Departamento, Id_Pais)

    REFERENCES Departamento(Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Representante_Empresa 

--



ALTER TABLE Representante_Empresa ADD CONSTRAINT RefEmpresa10 

    FOREIGN KEY (Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Empresa(Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Telefono_Jefe_Inmediato_Empresa 

--



ALTER TABLE Telefono_Jefe_Inmediato_Empresa ADD CONSTRAINT RefJefe_Inmediato_Empresa7 

    FOREIGN KEY (Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Jefe_Inmediato_Empresa(Id_Jefe_Inm_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





-- 

-- TABLE: Telefono_Representante_Empresa 

--



ALTER TABLE Telefono_Representante_Empresa ADD CONSTRAINT RefRepresentante_Empresa9 

    FOREIGN KEY (Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

    REFERENCES Representante_Empresa(Id_Representante_Empresa, Id_Empresa, Id_Distrito, Id_Provincia, Id_Departamento, Id_Pais)

;





