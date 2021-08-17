/*
Braydon Duprey
lab7_auto_records.sql
WEBD2201
July 25, 2021
*/

-- DROP'ping tables clear out any existing data
DROP TABLE IF EXISTS automobiles;

-- CREATE the table, note that id has to be unique, and you must have a owner
CREATE TABLE automobiles(
	id INTEGER PRIMARY KEY,
	make VARCHAR(15) NOT  NULL,
    model VARCHAR(20) NOT  NULL,
    year INTEGER NOT  NULL,
    owner VARCHAR(128) NOT NULL,
    msrp NUMERIC(9,2) NOT NULL,
    purchase_date DATE NOT  NULL
);
INSERT INTO automobiles(id, make, model, year, owner, msrp, purchase_date) VALUES(
	1,
	'Subaru',
    'WRX',
    '2017',
    'Bill Smith',
    '26000.00',
    '2020-01-21');
INSERT INTO automobiles(id, make, model, year, owner, msrp, purchase_date) VALUES(
	2,
	'Ford',
    'Bronco',
    '2021',
    'Jeff Smith',
    '28500.00',
    '2020-08-10');
INSERT INTO automobiles(id, make, model, year, owner, msrp, purchase_date) VALUES(
	3,
	'Chevy',
    'Cruze',
    '2011',
    'Emily Brown',
    '4500.00',
    '2018-08-05');
INSERT INTO automobiles(id, make, model, year, owner, msrp, purchase_date) VALUES(
	4,
	'BMW',
    '330i',
    '2021',
    'Bill Willams',
    '52600.00',
    '2021-07-25');
INSERT INTO automobiles(id, make, model, year, owner, msrp, purchase_date) VALUES(
	5,
	'Tesla',
    'Model 3',
    '2020',
    'Elon Musk',
    '44999.00',
    '2021-05-29');

SELECT make, model, year, msrp FROM automobiles ORDER BY year ASC;

UPDATE automobiles SET owner = 'Braydon Duprey' WHERE model = 'WRX';

DELETE FROM automobiles WHERE id = 2;

SELECT * FROM automobiles;
