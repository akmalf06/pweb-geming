CREATE TABLE registrations (
    id int auto_increment primary key,
    name varchar(128) not null,
    gender varchar(16),
    birth_date date,
    birth_location varchar(64),
    address varchar(256),
    student_number char(10),
    junior_school varchar(128) not null,
    report_file varchar(256),
    created_at datetime default current_timestamp
);