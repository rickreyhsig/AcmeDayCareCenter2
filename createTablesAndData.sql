##### Step 2 #####
DROP TABLE if exists CLASS;
CREATE TABLE CLASS(
class_id int NOT NULL,
class_start date NOT NULL,
class_end date NOT NULL,

PRIMARY KEY (class_id)
) ENGINE=INNODB;


DROP TABLE if exists CHILD;
CREATE TABLE CHILD(
child_id int NOT NULL auto_increment,
child_fname varchar(15) NOT NULL,
child_lname varchar(15) NOT NULL,
custodian_name varchar(30) NOT NULL,
phone varchar(13) NOT NULL,
address varchar(30) NOT NULL,
dob date NOT NULL,

PRIMARY KEY (child_id)
) ENGINE=INNODB;

DROP TABLE if exists ENROLL;
CREATE TABLE ENROLL(
enroll_id int auto_increment,
class_id varchar(30) REFERENCES CLASS(class_id),
child_id varchar(5) REFERENCES CHILD(child_id),
enroll_date date NOT NULL,

PRIMARY KEY(enroll_id)
) ENGINE=INNODB;


#All dates in SQL should be in the YYYY-MM-DD OR YYYY/MM/DD format

##### Step 3 #####
## a. Insert 4 classes based on age##
insert into CLASS(class_id, class_start, class_end)
  values('3', '2015-01-26', '2015-05-15');

insert into CLASS(class_id, class_start, class_end)
  values('4', '2015-01-26', '2015-05-15');

insert into CLASS(class_id, class_start, class_end)
  values('5', '2015-01-26', '2015-05-15');

insert into CLASS(class_id, class_start, class_end)
  values('6', '2015-01-26', '2015-05-15');


## b. Insert 20 children##
insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Abraham', 'Billow', 'Alfred Billow', '(240)456-7346', '101 Elm St', '2012/03/02');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Brian', 'Catz', 'Benjamin Catz', '(240)456-7347', '102 Elm St', '2012/04/03');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Catherine', 'Doe', 'Caedmon Doe', '(240)456-7348', '103 Elm St', '2011/05/04');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Dudley', 'Elk', 'Dana Elk', '(240)456-7349', '104 Elm St', '2011/06/05');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Emmanuel', 'Fike', 'Edwin Fike', '(240)456-7350', '105 Elm St', '2011/07/06');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Fabiana', 'Gale', 'Fabricio Gale', '(240)456-7351', '106 Elm St', '2011/08/07');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Gabriel', 'Holden', 'Gabrielle Holden', '(240)456-7352', '107 Elm St', '2011/09/08');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Hadad', 'Ilia', 'Habakkuk Ilia', '(240)456-7353', '108 Elm St', '2010/10/09');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Issac', 'Jones', 'Iacob Jones', '(240)456-73454', '109 Elm St', '2010/11/10');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Jason', 'Kain', 'Jacob Kain', '(240)456-7355', '110 Elm St', '2010/12/11');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Kacey', 'Liam', 'Kayla Liam', '(240)456-7356', '111 Elm St', '2010/01/12');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Laura', 'Mocey', 'Lakeisha Mocey', '(240)456-7357', '112 Elm St', '2010/02/13');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Michael', 'Nyemier', 'Malik Nyemier', '(240)456-7358', '113 Elm St', '2010/03/14');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Nayson', 'Oregun', 'Nabil Oregun', '(240)456-7359', '114 Elm St', '2009/04/15');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Obed', 'Payne', 'Oberon Payne', '(240)456-7360', '115 Elm St', '2009/05/16');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Paul', 'Quasar', 'Paulo Quasar', '(240)456-7361', '116 Elm St', '2009/06/17');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Quincy', 'Rickets', 'Qadir Rickets', '(240)456-7362', '117 Elm St', '2009/07/18');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Richard', 'Smith', 'Robert Smith', '(240)456-7363', '118 Elm St', '2009/08/19');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Samuel', 'Tobin', 'Sabah Tobin', '(240)456-7364', '119 Elm St', '2009/09/20');

insert into CHILD(child_fname, child_lname, custodian_name, phone, address, dob)
  values('Thomas', 'Uzil', 'Tabatha Uzil', '(240)456-7365', '120 Elm St', '2009/10/21');

## c. Insert enrollments##
insert into ENROLL(class_id, child_id, enroll_date)
  values('3', '1', '2014/09/01');

insert into ENROLL(class_id, child_id, enroll_date)
  values('3', '2', '2014/09/03');

insert into ENROLL(class_id, child_id, enroll_date)
  values('4', '3', '2014/09/05');

insert into ENROLL(class_id, child_id, enroll_date)
  values('4', '4', '2014/09/07');

insert into ENROLL(class_id, child_id, enroll_date)
  values('4', '5', '2014/09/09');

insert into ENROLL(class_id, child_id, enroll_date)
  values('4', '6', '2014/09/11');

insert into ENROLL(class_id, child_id, enroll_date)
  values('4', '7', '2014/09/13');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '8', '2014/09/15');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '9', '2014/09/17');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '10', '2014/09/19');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '11', '2014/09/21');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '12', '2014/09/23');

insert into ENROLL(class_id, child_id, enroll_date)
  values('5', '13', '2014/09/25');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '14', '2014/09/27');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '15', '2014/09/29');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '16', '2014/10/01');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '17', '2014/10/03');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '18', '2014/10/05');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '19', '2014/10/07');

insert into ENROLL(class_id, child_id, enroll_date)
  values('6', '20', '2014/10/09');
