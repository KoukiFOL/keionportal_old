/*
sqlite3 keionportal.db <reserve.sql
もしくは
sqlite> .read reserve.sql で実行
*/

DROP TABLE IF EXISTS reserves;
CREATE TABLE  reserves (
    time TEXT, 
    wednesday TEXT DEFAULT NULL,
    thursday TEXT DEFAULT NULL,
    friday TEXT DEFAULT NULL,
    saturday TEXT DEFAULT NULL,
    sunday TEXT DEFAULT NULL,
    monday TEXT DEFAULT NULL,
    tuesday TEXT DEFAULT NULL
    );

INSERT INTO reserves(time) values('8~9');
INSERT INTO reserves(time) values('9~10');
INSERT INTO reserves(time) values('10~11');
INSERT INTO reserves(time) values('11~12');
INSERT INTO reserves(time) values('12~13');
INSERT INTO reserves(time) values('13~14');
INSERT INTO reserves(time) values('14~15');
INSERT INTO reserves(time) values('15~16');
INSERT INTO reserves(time) values('16~17');
INSERT INTO reserves(time) values('17~18');
INSERT INTO reserves(time) values('18~19');
INSERT INTO reserves(time) values('19~20');

SELECT * FROM reserves;