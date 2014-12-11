DROP TABLE if exists administrators;
CREATE TABLE administrators(
adminID int NOT NULL AUTO_INCREMENT,
emailAddress VARCHAR(255) NOT NULL,
password VARCHAR(60) NOT NULL,
firstName VARCHAR(60),
lastName VARCHAR(60),

PRIMARY KEY (adminID)
);

INSERT INTO administrators(emailAddress, password)
  values('admin@admin.com', '1234');

INSERT INTO administrators(emailAddress, password)
  values('admin@test.com', '1234');
