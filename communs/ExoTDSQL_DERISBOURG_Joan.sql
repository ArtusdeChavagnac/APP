SELECT LastName, FirstName FROM Employees;

SELECT * FROM Orders WHERE OrderDate LIKE '01/%/1997';

INSERT INTO Shippers (ShipperID, ShipperName) VALUES (4, 'UPS France');

DELETE FROM Employees WHERE EmployeeID = 7;

SELECT COUNT(*) FROM Orders WHERE EmployeeID = 7 AND YEAR(OrderDate) = 1996;

SELECT EmployeeID, COUNT(*) AS NumberOfOrders FROM Orders GROUP BY EmployeeID;

SELECT MIN(Price) AS prixMin, MAX(Price) AS prixMax, AVG(Price) AS prixMoyen FROM Products;

SELECT ProductName FROM Products ORDER BY ProductName ASC;

SELECT DISTINCT Shippers.ShipperName
FROM Shippers
JOIN Orders ON Shippers.ShipperID = Orders.ShipperID
WHERE YEAR(OrderDate) = 1996;
