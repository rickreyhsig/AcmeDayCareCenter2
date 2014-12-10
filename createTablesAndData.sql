#All dates in SQL should be in the YYYY-MM-DD format
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


##### Step 3 #####
## a. Insert 4 classes based on age##
insert into CLASS(class_id, , )
  values('', '', '');


## b. Insert 20 children##

## c. Insert enrollments##












##### Exercise 2 #####
/*Insert 5 patrons*/
insert into PATRON(patron_fname, patron_lname, patron_phone, patron_address, patron_email, dob)
  values('Abraham', 'Billow', '(240)456-7346', '101 Elm St', 'aBillow@email.com', '1981/01/02');

insert into PATRON(patron_fname, patron_lname, patron_phone, patron_address, patron_email, dob)
  values('Brian', 'Catz', '(240)456-7347', '102 Elm St', 'bCatz@email.com', '1981/01/04');

insert into PATRON(patron_fname, patron_lname, patron_phone, patron_address, patron_email, dob)
  values('Catherine', 'Doe', '(240)456-7348', '103 Elm St', 'cDoe@email.com', '1981/01/06');

insert into PATRON(patron_fname, patron_lname, patron_phone, patron_address, patron_email, dob)
  values('Dudley', 'Elk', '(240)456-7349', '104 Elm St', 'dElk@email.com', '1981/01/08');

insert into PATRON(patron_fname, patron_lname, patron_phone, patron_address, patron_email, dob)
  values('Emannuel', 'Fike', '(240)456-7350', '105 Elm St', 'eFike@email.com','1981/01/10');


/*Insert 15 books*/
insert into BOOK(book_name, book_category)
  values('KILLING PATTON', 'NON-FICTION');

insert into BOOK(book_name, book_category)
  values('YES PLEASE', 'NON-FICTION');

insert into BOOK(book_name, book_category)
  values('NOT THAT KIND OF GIRL', 'NON-FICTION');

insert into BOOK(book_name, book_category)
  values('BEING MORTAL', 'NON-FICTION');

insert into BOOK(book_name, book_category)
  values('TRUE LOVE', 'NON-FICTION');

insert into BOOK(book_name, book_category)
  values('IF I STAY', 'YOUNG ADULT');

insert into BOOK(book_name, book_category)
  values('THE FAULT IN OUR STARS', 'YOUNG ADULT');

insert into BOOK(book_name, book_category)
  values('LOOKING FOR ALAKSA', 'YOUNG ADULT');

insert into BOOK(book_name, book_category)
  values('WHERE SHE WENT', 'YOUNG ADULT');

insert into BOOK(book_name, book_category)
  values('PAPER TOWNS', 'YOUNG ADULT');

insert into BOOK(book_name, book_category)
  values('BEING MORTAL', 'SCIENCE');

insert into BOOK(book_name, book_category)
  values('THE INNOVATORS', 'SCIENCE');

insert into BOOK(book_name, book_category)
  values('KILLING PATTON', 'POLITICS');

insert into BOOK(book_name, book_category)
  values('GRAY MOUNTAIN', 'FICTION');

insert into BOOK(book_name, book_category)
  values('HOW CHILDREN SUCCEED', 'EDUCATION');


#Insert 10 borrows from 5 patrons
insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('1', '1', '2014/09/10', '2014/09/30', '2014/10/01');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('1', '3', '2014/09/10', '2014/09/27', '2014/10/01');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('2', '5', '2014/09/10', '2014/09/28', '2014/10/01');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('2', '7', '2014/10/10', '2014/10/30', '2014/11/01');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('3', '9', '2014/10/10', '2014/10/15', '2014/11/01');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('3', '11', '2014/11/11', '', '2014/12/02');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('4', '13', '2014/11/11', '', '2014/12/02');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('4', '15', '2014/11/11', '', '2014/12/02');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('5', '2', '2014/11/11', '', '2014/12/02');

insert into BORROW(patron_id, book_id, borrow_date, return_date, date_due)
  values('5', '4', '2014/11/11', '', '2014/12/02');



##### Exercise 3 #####
SELECT * FROM BOOK;

SELECT * FROM PATRON;

SELECT PATRON.patron_fname, PATRON.patron_lname, BOOK.book_name
FROM PATRON, BOOK, BORROW
WHERE PATRON.patron_id = BORROW.patron_id
AND BOOK.book_id = BORROW.book_id
AND BORROW.return_date =  '0000-00-00';
#If return_date == '0000-00-00' item is borrowed
