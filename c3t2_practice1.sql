-- POINT 1
USE `rossmary_corp`;

-- POINT 2
INSERT INTO products
VALUES
    (NULL, 'Fennel pollen', 'Kg', 45, 900),
    (NULL, 'Vanilla', 'Kg', 66, 400),
    (NULL, 'Mahlab', 'Kg', 92, 138),
    (NULL, 'Long pepper', 'Kg', 235, 96);

-- POINT 3
SELECT *
FROM `products
`;

-- POINT 4
SELECT *
FROM `products
` WHERE id=3;

-- POINT 5
SELECT *
FROM products
WHERE stock<90 AND price>300;