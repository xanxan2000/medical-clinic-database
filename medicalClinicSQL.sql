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
    zipcode VARCHAR(10),
    patient_id INT NOT NULL PRIMARY KEY

);



DROP TABLE specialty;

CREATE TABLE specialty(
	specialty_id SMALLINT NOT NULL PRIMARY KEY,
	specialty_name VARCHAR(20) NOT NULL
	);
	

DROP TABLE doctor;

CREATE TABLE doctor( 
    f_name VARCHAR(20) NOT NULL,
    l_name VARCHAR(20) NOT NULL,
    employee_id CHAR(10) NOT NULL,
    birth_date DATE,
    race VARCHAR(20),
    ethnicity VARCHAR(20),
    sex VARCHAR(10),
    email VARCHAR(30),
    phone_number VARCHAR(15),
    address VARCHAR(30),
    city VARCHAR(10),
    state VARCHAR(10),
    zipcode VARCHAR(10),
    hired DATETIME NOT NULL,
    specialty_id CHAR(5) NOT NULL,
    PRIMARY KEY (employee_id),
    FOREIGN KEY (employee_id) REFERENCES clinic_employee(employee_id),
    FOREIGN KEY (specialty_id) REFERENCES specialty (specialty_id)     

);

INSERT INTO patient VALUE ("Malik", "Taylor");
SELECT * FROM patient
