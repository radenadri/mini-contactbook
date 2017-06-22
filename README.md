# mini-contactbook
Little example of contactbook using PHP, implementing the PDO driver with MySQL for database, also dompdf for creating a small report

## How-to-run

- Clone this repository first
- Go to the project folder, open bash and make sure you run this npm command first :

```
composer update
```

- Wait until the progress completed
- Open MySQL and create database
- In Database/Models/Contact.php you'll find a several configuration especially for database config, change those to fit your pc environment
- You can use this dump .sql file to create the table :
```
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
```
- On PHP >=7 you can use the built in server to run :
```
php -S localhost:8000
```
- Or just put in the XAMPP/Laragon/Nginx folder (usually in www folder) and go to this :
```
http://localhost/<project folder name>/public
```
