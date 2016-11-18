CREATE TABLE brain
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pressure INT(11),
    brain INT(11),
    user_id INT(11),
    date DATE
);
CREATE TABLE dayresult
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date DATE NOT NULL,
    result INT(11) NOT NULL,
    user_id INT(11),
    listResult VARCHAR(255)
);
CREATE TABLE exercise
(
    name TEXT NOT NULL,
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT(11)
);
CREATE TABLE user
(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100),
    password VARCHAR(100)
);
