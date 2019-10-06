INSERT INTO roles(id,descripcion, rol, estado) VALUES (1, 'ADMINISTRADOR', '1','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (2, 'PARTICIPANTE', '2','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (3, 'FINANCIERO', '3','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (4, 'FACILITADOR', '4','ACTIVO');
INSERT INTO roles(id,descripcion, rol, estado) VALUES (5, 'MATRICULADOR', '5','ACTIVO');

INSERT INTO users(id, role_id, name, user_name, email, password, estado) VALUES (1, 1, 'MARCO VEGA', '1713826681','mvv.vega@yavirac.edu.ec', '$2y$10$nMPhbEa.rsb69ocatKBQoOkxsR41pZ9AueeMgOgaEwZQ73OlUah.m', 'ACTIVO');

INSERT INTO institutos(id,codigo,nombre) VALUES(1,'SENECYT-A1-001','INSTITUTO TECNOLÓGICO SUPERIOR BENITO JUÁREZ');
INSERT INTO institutos(id,codigo,nombre) VALUES(2,'SENECYT-A1-002','INSTITUTO TECNOLÓGICO SUPERIOR 24 DE MAYO');
INSERT INTO institutos(id,codigo,nombre) VALUES(3,'SENECYT-A1-003','INSTITUTO TECNOLÓGICO SUPERIOR GRAN COLOMBIA');
INSERT INTO institutos(id,codigo,nombre) VALUES(4,'SENECYT-A1-004','INSTITUTO TECNOLÓGICO SUPERIOR DE TURISMO Y PATRIMONIO YAVIRAC');

INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, lugar, lugar_otros, estado) VALUES (1, 4, 'SETEC-A1-001', 'INGLÉS A1', 'TÉCNICO', 'PRESENCIAL Y VIRTUAL','CAMPUS HEROES DEL CENEPA', 'NINGUNO', 'ACTIVO');
INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, lugar, lugar_otros, estado) VALUES (2, 4, 'SETEC-A1-002', 'ANGULAR CON IONIC', 'TÉCNICO', 'PRESENCIAL','CAMPUS YAVIRAC', 'NINGUNO', 'ACTIVO');
INSERT INTO cursos(id,  instituto_id, codigo, nombre, tipo, modalidad, lugar, lugar_otros, estado) VALUES (3, 4, 'SETEC-A1-003', 'JAVA INICIAL', 'TÉCNICO', 'PRESENCIAL','CAMPUS YAVIRAC', 'NINGUNO', 'ACTIVO');

INSERT INTO public.tipo_descuentos(id, descripcion, valor_descuento) VALUES (1, 'ESTUDIANTE YAVIRAC', 50);
INSERT INTO public.tipo_descuentos(id, descripcion, valor_descuento) VALUES (2, 'EN PROCESO DE TITULACION', 40);
INSERT INTO public.tipo_descuentos(id, descripcion, valor_descuento) VALUES (3, 'GRADUADO YAVIRAC', 25);
INSERT INTO public.tipo_descuentos(id, descripcion, valor_descuento) VALUES (4, 'PERSONAL YAVIRAC', 50);
INSERT INTO public.tipo_descuentos(id, descripcion, valor_descuento) VALUES (5, 'EXTERNO', 10);
