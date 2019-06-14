-- Write SQL to create your database in this file

CREATE DATABASE evaluationform;
USE evaluationform;
CREATE TABLE evaluationform (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  teamname VARCHAR(25) ,
  starttime TIME NOT NULL,
  endtime TIME NOT NULL,
  members VARCHAR(25),
  participation VARCHAR(25),
  notes VARCHAR(25) NOT NULL,
  overall VARCHAR(25),
);


