/*
Braydon Duprey
termtest3.sql
WEBD2201
August 10, 2021
*/
-- DROP'ping tables clear out any existing data
DROP TABLE IF EXISTS student;
DROP ROLE IF EXISTS faculty;
-- CREATE the table, note that student_id has to be unique, and you must have a name
CREATE TABLE student(
	student_id VARCHAR(10) PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL,
    Grade INTEGER
);
CREATE ROLE faculty;
GRANT ALL ON student TO faculty;
-- Insert records to the table
INSERT INTO student(student_id, student_name, Grade)
VALUES(
	'A0001',
	'Andrew',
    57);
INSERT INTO student(student_id, student_name, Grade)
VALUES(
	'A0002',
	'Vikram',
    63);
INSERT INTO student(student_id, student_name, Grade)
VALUES(
	'100584481',
	'Braydon',
    100);