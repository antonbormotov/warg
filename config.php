<?php
return
    [
        'db' => [
            'name' => 'warg',
            'host' => 'localhost',
            'user' => 'root',
            'password' => '123'
        ]

    ];

/*

id time stats_id  - для времени
id cpu memory hdd - для измерений

CREATE TABLE time_slots (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
time VARCHAR(20),
stats_id INT);

CREATE TABLE measurements (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cpu INT,
memory INT,
hdd VARCHAR(20));
*/