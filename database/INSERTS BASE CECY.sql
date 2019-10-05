INSERT INTO institutos(id,codigo,nombre) VALUES(1,'SENECYT-A1-001','INSTITUTO TECNOLÓGICO SUPERIOR BENITO JUÁREZ');
INSERT INTO institutos(id,codigo,nombre) VALUES(2,'SENECYT-A1-002','INSTITUTO TECNOLÓGICO SUPERIOR 24 DE MAYO');
INSERT INTO institutos(id,codigo,nombre) VALUES(3,'SENECYT-A1-003','INSTITUTO TECNOLÓGICO SUPERIOR GRAN COLOMBIA');
INSERT INTO institutos(id,codigo,nombre) VALUES(4,'SENECYT-A1-004','INSTITUTO TECNOLÓGICO SUPERIOR DE TURISMO Y PATRIMONIO YAVIRAC');

INSERT INTO roles(id,descripcion, rol, estado) VALUES (1, 'ADMINISTRADOR', '1','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (2, 'PARTICIPANTE', '2','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (3, 'FINANCIERO', '3','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (4, 'FACILITADOR', '4','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (5, 'MATRICULADOR', '5','ACTIVO');

INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, duracion, lugar, lugar_otros, estado) VALUES (1, 4, 'SETEC-A1-001', 'INGLÉS A1', 'TÉCNICO', 'PRESENCIAL Y VIRTUAL', '160','CAMPUS HEROES DEL CENEPA', 'NINGUNO', 'ACTIVO');
INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, duracion, lugar, lugar_otros, estado) VALUES (2, 4, 'SETEC-A1-002', 'INGLÉS A2', 'TÉCNICO', 'PRESENCIAL Y VIRTUAL', '160','CAMPUS HEROES DEL CENEPA', 'NINGUNO', 'ACTIVO');
INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, duracion, lugar, lugar_otros, estado) VALUES (3, 4, 'SETEC-A1-003', 'INGLÉS B1', 'TÉCNICO', 'PRESENCIAL Y VIRTUAL', '160','CAMPUS HEROES DEL CENEPA', 'NINGUNO', 'ACTIVO');

INSERT INTO users(id, role_id, name, user_name, email, password, estado) VALUES (1, 1, 'MARCO VEGA', '1713826681','mvv.vega@yavirac.edu.ec', '$2y$10$nMPhbEa.rsb69ocatKBQoOkxsR41pZ9AueeMgOgaEwZQ73OlUah.m', 'ACTIVO');
