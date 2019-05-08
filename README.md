# Quizapp

A customizable, responsive Quizapp runs php and MySQL

### Installing

Download repository and put it on your FTP-Host.
Create a MySQL-Database named 'quiz' and edit the file 'database.php' to fit your database credentials.
Make two tables in this database with sql-commands:

```
CREATE TABLE `quiz`.`questions_tak` ( `question_number` INT NOT NULL , `text` TEXT NOT NULL , PRIMARY KEY (`question_number`)) ENGINE = InnoDB;
```
and
```
CREATE TABLE `quiz`.`choices_tak` ( `id` INT NOT NULL AUTO_INCREMENT , `question_number` INT NOT NULL , `is_correct` TINYINT NOT NULL DEFAULT '0' , `text` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

Add a question on
```
http://yourdomain/add.php
```

Now you can reach the quiz with easily typing in your domain.




## Authors

* **fehart20** - *Initial work* - [fehart20](https://github.com/fehart20)




