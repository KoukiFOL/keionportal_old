/*
sqlite3 keionportal.db <reserve.sql
もしくは
sqlite> .read reserve.sql で実行
*/

DROP TABLE reserves;
CREATE TABLE reserves (
    primarity INTEGER,
    operation INTEGER,
    grade INTEGER,
    name TEXT,
    time  DATETIME DEFAULT CURRENT_TIMESTAMP
    );
INSERT INTO reserves(primary, operation, grade name) values(0, 1, 2, '上山航輝' );
SELECT * FROM reserves;