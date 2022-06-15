-- Muestra todos los estados de la base de datos
SELECT *
FROM estados E;

-- Muestra el estado con abrev Gto.
SELECT *
FROM estados E
WHERE abrev='Gto.';

-- Muestra el estado que contenga Gua en cualquier parte del nombre
SELECT clave
FROM estados E
WHERE nombre like '%Gua%';

-- Muestra todos los municipios
SELECT *
FROM municipios M;

-- Muestra los municipios del estado 11
SELECT *
FROM municipios
WHERE estado_id = 11;

-- Muestra todas las localidades
SELECT *
FROM localidades L;

-- Muestra la localidad con el nombre 
SELECT *
FROM localidades L
WHERE nombre = 'León de los Aldama';

-- Localidades del municipio de León municipio_id=348
SELECT *
FROM localidades L
WHERE L.municipio_id = 348;
s
SELECT * 
FROM estados E
JOIN municipios M
ON E.id = M.estado_id
WHERE E.id = 11;


SELECT * 
FROM estados E
JOIN municipios M
ON E.id = M.estado_id
JOIN localidades L
ON M.id = L.municipio_id
WHERE E.id = 11 and M.clave='020';