USE medicalclinic;

DROP TABLE clinic_employee;
CREATE TABLE clinic_employee(
	employee_id INT PRIMARY KEY UNIQUE,
    f_name VARCHAR(20),
    l_name VARCHAR(20),
    birth_date DATE,
    race VARCHAR(20),
    ethnicity VARCHAR(20),
    sex VARCHAR(1),
    email VARCHAR(30),
    phone_number VARCHAR(15),
    address VARCHAR(30),
    city VARCHAR(10),
    state VARCHAR(10),
    zipcode VARCHAR(10)
);

DROP TABLE patient;

CREATE TABLE patient(
    f_name VARCHAR(20),
    l_name VARCHAR(20),
    birth_date DATE,
    race VARCHAR(20),
    ethnicity VARCHAR(20),
    sex VARCHAR(10),
    email VARCHAR(30),
    phone_number VARCHAR(15),
    address VARCHAR(30),
    city VARCHAR(10),
    state VARCHAR(10),
    patient_id CHAR(10) NOT NULL,
    zipcode VARCHAR(10),
    PRIMARY KEY(patient_id)
);


DROP TABLE office;

CREATE TABLE office(
	office_id CHAR(10) NOT NULL,
	office_name VARCHAR(50),
	address VARCHAR(50),
	office_phone CHAR(11),
	PRIMARY KEY(office_id)
);

DROP TABLE room;

CREATE TABLE room(
	room_num SMALLINT,
	unavaliable BOOLEAN
);

DROP TABLE appointment;

CREATE TABLE appointment(
    appt_id CHAR(10) NOT NULL,
    patient_id CHAR(10) NOT NULL,
    nurse_id CHAR(10),
    doctor_id CHAR(10) NOT NULL,
    start DATETIME,
    end DATETIME,
    office_id CHAR(10) NOT NULL,
    room_num SMALLINT,
    reason_appt VARCHAR(100),
    PRIMARY KEY(appt_id),
    FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
    FOREIGN KEY(nurse_id) REFERENCES clinic_employee(employee_id),
    FOREIGN KEY(doctor_id) REFERENCES clinic_employee(employee_id),
    FOREIGN KEY(office_id) REFERENCES office(office_id),
    FOREIGN KEY(room_num) REFERENCES room(room_num),
);

INSERT INTO patient VALUE ("Malik", "Taylor");
SELECT * FROM patient
