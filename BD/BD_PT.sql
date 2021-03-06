CREATE TABLE IF NOT EXISTS ACADEMIA (
	ID_ACADEMIA int(9) NOT NULL AUTO_INCREMENT,
	NOMBRE_ACA varchar(255) NOT NULL,
	CORREO_ACA varchar(255) NOT NULL,
	CONTRASENYA_ACA varchar(255) NOT NULL,
	PRIMARY KEY (ID_ACADEMIA)
);

CREATE TABLE IF NOT EXISTS USUARIO (
	ID_USUARIO INT(11) NOT NULL AUTO_INCREMENT,
	CORREO_USU VARCHAR(255) NOT NULL,
	CONTRASENYA_USU VARCHAR(255) NOT NULL,
	ID_ACADEMIA INT(9) NOT NULL,
	PRIMARY KEY (ID_USUARIO),
	FOREIGN KEY (ID_ACADEMIA) REFERENCES ACADEMIA(ID_ACADEMIA)
	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS EVOLUCION (
	ID_EVOLUCION INT(11) NOT NULL AUTO_INCREMENT,
	ID_USUARIO INT(11) NOT NULL,
	NOTA_EVO DOUBLE(3,1) NOT NULL,
	FECHA_EVO DATETIME NULL,
	PRIMARY KEY (ID_EVOLUCION),
	FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS TEST (
	ID_TEST INT(9) NOT NULL AUTO_INCREMENT,
	TIPO_TEST INT(1) NOT NULL,
	PREGUNTA VARCHAR(1000) NOT NULL,
	IMG_PRE VARCHAR(255) NULL,
	RES_A VARCHAR(500)NULL,
	RES_B VARCHAR(500)NULL,
	RES_C VARCHAR(500)NULL,
	RES_D VARCHAR(500)NULL,
	SOLUCION VARCHAR(500) NOT NULL,
	EXPLICACION VARCHAR(1000)NULL,
	IMG_A VARCHAR(255) NULL,
	IMG_B VARCHAR(255) NULL,
	IMG_C VARCHAR(255) NULL,
	IMG_D VARCHAR(255) NULL,
	IMG_SOL VARCHAR(255) NULL,
	IMG_EXPLI VARCHAR(255) NULL,
	ID_ACADEMIA INT(11) NOT NULL,
	PRIMARY KEY (ID_TEST),
	FOREIGN KEY (ID_ACADEMIA) REFERENCES  ACADEMIA(ID_ACADEMIA)
	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS DATOGENALUMNOTROPA (
	ID_DATOGENALUMNOTROPA INT(9) NOT NULL AUTO_INCREMENT,
	ID_USUARIO INT(9) NOT NULL,
	ID_ACATROPA INT(9) NOT NULL,
	VERBAL VARCHAR(1000) NULL,
	NUMERICO VARCHAR(1000) NULL,
	PERCEPTIVA VARCHAR(1000) NULL,
	ESPACIAL VARCHAR(1000) NULL,
	MECANICO VARCHAR(1000) NULL,
	ABSTRACTO VARCHAR(1000) NULL,
	MEMORIA VARCHAR(1000) NULL,
	PRIMARY KEY (ID_DATOGENALUMNOTROPA),
	FOREIGN KEY (ID_USUARIO) REFERENCES  ACADEMIA(ID_USUARIO),
	FOREIGN KEY (ID_ACATROPA) REFERENCES  ACADEMIA(ID_ACADEMIA)
	ON DELETE CASCADE ON UPDATE CASCADE
);


