-- Tạo CSDL XProject
CREATE DATABASE XProject;

-- Sử dụng CSDL XProject
USE XProject;

-- Tạo bảng employees
CREATE TABLE employees (
    ID INT PRIMARY KEY IDENTITY(1,1),
    Name NVARCHAR(100) NOT NULL,
    Address NVARCHAR(200),
    Salary DECIMAL(10, 2)
);

DECLARE @Counter INT = 1;

WHILE @Counter <= 50
BEGIN
    INSERT INTO employees (Name, Address, Salary)
    VALUES ('Employee ' + CAST(@Counter AS NVARCHAR(2)), 'Address ' + CAST(@Counter AS NVARCHAR(2)), 50000 + (@Counter * 1000));

    SET @Counter = @Counter + 1;
END

SELECT * FROM employees;