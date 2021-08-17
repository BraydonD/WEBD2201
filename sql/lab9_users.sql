/*
Braydon Duprey
lab9_users.sql
WEBD2201
August 1, 2021
*/
-- DROP'ping tables clear out any existing data
DROP TABLE IF EXISTS users;
-- CREATE the table, note that id has to be unique, and you must have a name
CREATE TABLE users(
	id VARCHAR(20) PRIMARY KEY,
	password VARCHAR(15) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email_address VARCHAR(255) NOT NULL,
    enrol_date DATE NOT NULL,
    last_access DATE NOT NULL
);
-- Testing Records
INSERT INTO users(id, password, first_name, last_name, email_address, enrol_date, last_access) 
VALUES(
	'jdoe',
	'testpass',
    'John',
    'Doe',
    'jdoe@durhamcollege.ca',
	'2021-1-1',
	'2021-2-1');
INSERT INTO users(id, password, first_name, last_name, email_address, enrol_date, last_access) 
VALUES(
	'Bob123',
	'password123',
    'Bob',
    'Smith',
    'bob@hotmail.ca',
	'1998-6-10',
	'2015-7-29');
INSERT INTO users(id, password, first_name, last_name, email_address, enrol_date, last_access) 
VALUES(
	'jguy',
	'drowssap',
    'Jack',
    'Johnson',
    'jguy93@AOL.com',
	'2003-4-7',
	'2020-2-21');