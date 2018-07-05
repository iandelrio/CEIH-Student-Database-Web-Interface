CREATE DATABASE test;

use test;

CREATE TABLE users (
  studentNumber int(8) PRIMARY KEY,
  /*surname varchar(19) NOT NULL,
  givenName varchar(23),
  emailAddress varchar(31),*/
  preferredName varchar(15)
  /*gender varchar(1),
  birthdate varchar(10),
  selfID varchar(4),
  city varchar(15),
  province varchar(2),
  country varchar(6),
  financialHold varchar(3),
  sponsorship varchar(3),
  sponsor varchar(56),
  firstSessionApplied varchar(5),
  firstSessionAdmitted varchar(5),
  firstSessionRegistered varchar(5)*/
);