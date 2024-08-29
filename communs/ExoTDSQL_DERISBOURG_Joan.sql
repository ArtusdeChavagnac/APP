select lastname, firstname from employees;
select * from orders where orderdate like '01/%/1997';
insert into shippers (shipperid, shippername) values (4, 'ups france');
delete from employees where employeeid = 7;
select count(*) from orders where employeeid = 7 and year(orderdate) = 1996;
select employeeid, count(*) as numberoforders from orders group by employeeid;
select min(price) as prixmin, max(price) as prixmax, avg(price) as prixmoyen from products;
select productname from products order by productname asc;
select distinct shippers.shippername
from shippers
join orders on shippers.shipperid = orders.shipperid
where year(orderdate) = 1996;