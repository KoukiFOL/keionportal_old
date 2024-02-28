/*
 sqlite3 keionportal.db <users.sql
 もしくは
 sqlite> .read users.sql で実行
 */
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    admin integer,
    /*
     0 = admin
     1 = member
     */
    number integer NOT NULL,
    grade integer NOT NULL,
    name text NOT NULL,
    part integer,
    /*
     vocal 0
     guitar 1
     keybord 2
     bass 3
     drum 4
     */
    password text NOT NULL,
    birthday integer
);

INSERT INTO
    users
values
(0, 220745, 2, '上山航輝', 1, 'test', 20030526);

SELECT
    *
FROM
    users;