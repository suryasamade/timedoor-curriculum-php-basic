-- POINT 1
UPDATE `products`
SET stock
=7 WHERE id=1;

-- POINT 2
UPDATE `products`
SET price
=911 WHERE name='fennel pollen';

-- POINT 3
SELECT *
FROM `products
` WHERE name LIKE '%ll%';

-- POINT 4
DELETE
FROM `products
` WHERE id=5;