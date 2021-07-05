-- Creating schema
CREATE SCHEMA IF NOT EXISTS `medi_life` DEFAULT CHARACTER SET utf8;

-- Please run next command for disabling a foreign key constraint
SET FOREIGN_KEY_CHECKS=0;

-- Creating table health_institution and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`health_institution` (
  `institution_id` VARCHAR(5) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(256) NOT NULL,
  `beds_number` INT UNSIGNED NOT NULL,
  `daily_hospital` TINYINT UNSIGNED NULL,
  `organizational_unit` ENUM('CLINIC', 'CLINICAL_INSTITUTE', 'INSTITUTE', 'DEPARTMENT', 'EMERGENCY_ADMISSION') NOT NULL,
  PRIMARY KEY (`institution_id`))
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`health_institution` (`institution_id`, `name`, `address`, `beds_number`, `daily_hospital`, `organizational_unit`) VALUES ('00001', 'Klinika za pedijatriju', 'Ul. Josipa Huttlera 4  Osijek', '25', '1', 'CLINIC');
INSERT INTO `medi_life`.`health_institution` (`institution_id`, `name`, `address`, `beds_number`, `daily_hospital`, `organizational_unit`) VALUES ('00002', 'Klinika za unutarnje bolesti', 'Ul. Josipa Huttlera 4  Osijek', '50', '1', 'CLINIC');
INSERT INTO `medi_life`.`health_institution` (`institution_id`, `name`, `address`, `beds_number`, `daily_hospital`, `organizational_unit`) VALUES ('00003', 'Klinički zavod za nuklearnu medicinu i zaštitu od zračenja', 'Ul. Josipa Huttlera 4  Osijek', '4', '0', 'CLINICAL_INSTITUTE');
INSERT INTO `medi_life`.`health_institution` (`institution_id`, `name`, `address`, `beds_number`, `daily_hospital`, `organizational_unit`) VALUES ('00004', 'Odjel za bolesti štitnjače', 'Ul. Josipa Huttlera 4  Osijek', '5', '0', 'DEPARTMENT');
INSERT INTO `medi_life`.`health_institution` (`institution_id`, `name`, `address`, `beds_number`, `daily_hospital`, `organizational_unit`) VALUES ('00005', 'Objedinjeni hitni bolnički prijam', 'Ul. Josipa Huttlera 4  Osijek', '15', '0', 'EMERGENCY_ADMISSION');

-- Creating table employment and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`employment` (
  `employment_id` VARCHAR(5) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(256) NULL,
  `institution_id` VARCHAR(5) NULL,
  PRIMARY KEY (`employment_id`),
  INDEX `FK_health_institution_employment_id_idx` (`institution_id` ASC),
  CONSTRAINT `FK_health_institution_employment_id`
    FOREIGN KEY (`institution_id`)
    REFERENCES `medi_life`.`health_institution` (`institution_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`employment` (`employment_id`, `name`, `description`, `institution_id`) VALUES ('55469', 'liječnik', '', '');
INSERT INTO `medi_life`.`employment` (`employment_id`, `name`, `description`, `institution_id`) VALUES ('02251', 'medicinski tehničar', 'U dnevnoj bolnici', '0001');
INSERT INTO `medi_life`.`employment` (`employment_id`, `name`, `description`, `institution_id`) VALUES ('99867', 'vozač', 'Vozilo saniteta', '00005');
INSERT INTO `medi_life`.`employment` (`employment_id`, `name`) VALUES ('25430', 'informatičar');
INSERT INTO `medi_life`.`employment` (`employment_id`, `name`) VALUES ('78025', 'čistačica');

-- Creating table specialization and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`specialization` (
  `specialization_id` VARCHAR(3) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(256) NULL,
  `employment_id` VARCHAR(5) NULL,
  PRIMARY KEY (`specialization_id`),
  INDEX `FK_specialization_employment_id_idx` (`employment_id` ASC),
  CONSTRAINT `FK_specialization_employment_id`
    FOREIGN KEY (`employment_id`)
    REFERENCES `medi_life`.`employment` (`employment_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`specialization` (`specialization_id`, `name`) VALUES ('036', 'Pedijatrija');
INSERT INTO `medi_life`.`specialization` (`specialization_id`, `name`) VALUES ('028', 'Nuklearna medicina');
INSERT INTO `medi_life`.`specialization` (`specialization_id`, `name`) VALUES ('017', 'Kardiologija');
INSERT INTO `medi_life`.`specialization` (`specialization_id`, `name`) VALUES ('038', 'Psihijatrija');
INSERT INTO `medi_life`.`specialization` (`specialization_id`, `name`) VALUES ('032', 'Opća kirurgija');

-- Creating table employee and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`employee` (
  `employee_id` VARCHAR(8) NOT NULL,
  `OIB` VARCHAR(11) NULL,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(256) NOT NULL,
  `sex` ENUM('M', 'F') NOT NULL DEFAULT 'M',
  `active_from` DATETIME NOT NULL,
  `health_institution_id` VARCHAR(5) NULL,
  `employment_id` VARCHAR(5) NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE INDEX `OIB_UNIQUE` (`OIB` ASC),
  INDEX `FK_employee_health_institution_id_idx` (`health_institution_id` ASC),
  INDEX `FK_employee_employment_id_idx` (`employment_id` ASC),
  CONSTRAINT `FK_employee_health_institution_id`
    FOREIGN KEY (`health_institution_id`)
    REFERENCES `medi_life`.`health_institution` (`institution_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_employee_employment_id`
    FOREIGN KEY (`employment_id`)
    REFERENCES `medi_life`.`employment` (`employment_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`employee` VALUES ('03256855', '55456326589', 'Ivica', 'Škoro', 'M', '1981/01/25', '00001', '55469');
INSERT INTO `medi_life`.`employee` VALUES ('65933652', '42366520012', 'Silvio', 'Mihaljević', 'M', '1991/05/15', '00002', '55469');
INSERT INTO `medi_life`.`employee` VALUES ('44896523', '87988759845', 'Ivica', 'Mihaljević', 'M', '1993/08/01', '00003', '55469');
INSERT INTO `medi_life`.`employee` (employee_id, OIB, name, surname, sex, active_from, health_institution_id) VALUES('33652100', '54230101256', 'Srđan', 'Čalošević', 'M', '2000/10/10', '00005');

-- Creating table doctor and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`doctor` (
  `doctor_id` VARCHAR(12) NOT NULL,
  `OIB` VARCHAR(11) NULL,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(256) NOT NULL,
  `sex` ENUM('M', 'F') NOT NULL DEFAULT 'M',
  `active_from` DATETIME NOT NULL,
  `institution_id` VARCHAR(5) NULL,
  `employment_id` VARCHAR(5) NULL,
  `specialization_id` VARCHAR(3) NULL,
  PRIMARY KEY (`doctor_id`),
  UNIQUE INDEX `OIB_UNIQUE` (`OIB` ASC),
  INDEX `FK_doctor_health_institution_id_idx` (`institution_id` ASC),
  INDEX `FK_doctor_employment_id_idx` (`employment_id` ASC),
  INDEX `FK_doctor_specialization_id_idx` (`specialization_id` ASC),
  CONSTRAINT `FK_doctor_health_institution_id`
    FOREIGN KEY (`institution_id`)
    REFERENCES `medi_life`.`health_institution` (`institution_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_doctor_employment_id`
    FOREIGN KEY (`employment_id`)
    REFERENCES `medi_life`.`employment` (`employment_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_doctor_specialization_id`
    FOREIGN KEY (`specialization_id`)
    REFERENCES `medi_life`.`specialization` (`specialization_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`doctor` VALUES ('032568556912', '55456326589', 'Ivica', 'Škoro', 'M', '1981/01/25', '00001', '55469', '036');
INSERT INTO `medi_life`.`doctor` VALUES ('659336521302', '42366520012', 'Silvio', 'Mihaljević', 'M', '1991/05/15', '00002', '55469', '017');
INSERT INTO `medi_life`.`doctor` VALUES ('448965230256', '87988759845', 'Ivica', 'Mihaljević', 'M', '1993/08/01', '00003', '55469', '028');
INSERT INTO `medi_life`.`doctor`(doctor_id, OIB, name, surname, sex, active_from, institution_id, employment_id) VALUES('336521008975', '54230101256', 'Srđan', 'Čalošević', 'M', '2000/10/10', '00005', '55469');

-- Creating table diagnosis and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`diagnosis` (
  `diagnosis_id` VARCHAR(5) NOT NULL,
  `name` VARCHAR(512) NOT NULL,
  `latin_name` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`diagnosis_id`))
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`diagnosis` VALUES ('01225', 'upala srednjeg uha', 'Otitis media');
INSERT INTO `medi_life`.`diagnosis` VALUES ('96520', 'potres mozga', 'Commotio cerebri');
INSERT INTO `medi_life`.`diagnosis` VALUES ('55569', 'gripa', 'Infuenca');
INSERT INTO `medi_life`.`diagnosis` VALUES ('00002', 'migrena', 'Hemicraniasimplex');
INSERT INTO `medi_life`.`diagnosis` VALUES ('74598', 'depresija', 'Deprimere');

-- Creating table health_insurance and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`health_insurance` (
  `health_insurance_id` VARCHAR(12) NOT NULL,
  `type` ENUM('OSNOVNO', 'DOPUNSKO', 'DODATNO') NOT NULL DEFAULT 'OSNOVNO',
  PRIMARY KEY (`health_insurance_id`))
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`health_insurance` VALUES ('102365985564', 'OSNOVNO');
INSERT INTO `medi_life`.`health_insurance` VALUES ('966386592145', 'OSNOVNO');
INSERT INTO `medi_life`.`health_insurance` VALUES ('561440320158', 'DOPUNSKO');
INSERT INTO `medi_life`.`health_insurance` VALUES ('847701254655', 'DOPUNSKO');
INSERT INTO `medi_life`.`health_insurance` VALUES ('202569878814', 'DODATNO');

-- Creating table patient and inserting values
CREATE TABLE IF NOT EXISTS `medi_life`.`patient` (
  `patient_id` VARCHAR(12) NOT NULL,
  `OIB` VARCHAR(11) NULL,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(256) NOT NULL,
  `sex` ENUM('M', 'F') NOT NULL,
  `birth_date` DATETIME NOT NULL,
  `start_treatment_date` DATETIME NULL,
  `previous_hospitalization` ENUM('YES', 'NO') NULL,
  `institution_id` VARCHAR(5) NULL,
  `doctor_id` VARCHAR(12) NULL,
  `diagnosis_id` VARCHAR(5) NULL,
  `insurance_id` VARCHAR(12) NULL,
  PRIMARY KEY (`patient_id`),
  UNIQUE INDEX `OIB_UNIQUE` (`OIB` ASC),
  INDEX `FK_patient_health_institution_id_idx` (`institution_id` ASC),
  INDEX `FK_patient_doctor_id_idx` (`doctor_id` ASC),
  INDEX `FK_patient_diagnosis_id_idx` (`diagnosis_id` ASC),
  INDEX `FK_patient_health_insurance_id_idx` (`insurance_id` ASC),
  CONSTRAINT `FK_patient_health_institution_id`
    FOREIGN KEY (`institution_id`)
    REFERENCES `medi_life`.`health_institution` (`institution_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_patient_doctor_id`
    FOREIGN KEY (`doctor_id`)
    REFERENCES `medi_life`.`doctor` (`doctor_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_patient_diagnosis_id`
    FOREIGN KEY (`diagnosis_id`)
    REFERENCES `medi_life`.`diagnosis` (`diagnosis_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_patient_health_insurance_id`
    FOREIGN KEY (`insurance_id`)
    REFERENCES `medi_life`.`health_insurance` (`health_insurance_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

INSERT INTO `medi_life`.`patient` VALUES ('523621330258', '55568741201', 'Dorijan', 'Radočaj', 'M', '1994/03/02', '2020/01/25', 'YES', '00005', '336521008975', '00002', '561440320158');
INSERT INTO `medi_life`.`patient` VALUES ('023698514720', '11128888467', 'Marko', 'Horvat', 'M', '1994/11/08', '2020/01/15', 'YES', '00002', '659336521302', '74598', '202569878814');
INSERT INTO `medi_life`.`patient` VALUES ('458963112047', '02654147898', 'Ivan', 'Horvat', 'M', '2005/12/12', '2020/01/15', 'NO', '00005', '336521008975', '55569', '966386592145');
INSERT INTO `medi_life`.`patient` VALUES ('968536587125', '85699221105', 'Ivana', 'Perić', 'F', '2002/08/02', '2020/01/10', 'YES', '00005', '336521008975', '96520', '102365985564');
INSERT INTO `medi_life`.`patient` VALUES ('865994174104', '32014887005', 'Marija', 'Ivić', 'F', '1998/05/23', '2020/01/10', 'NO', '00005', '336521008975', '01225', '847701254655');

-- Creating table establish_diagnosis
CREATE TABLE IF NOT EXISTS `medi_life`.`establish_diagnosis` (
  `doctor_id` VARCHAR(12) NOT NULL,
  `diagnosis_id` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`doctor_id`, `diagnosis_id`),
  INDEX `FK_establish_diagnosis_diagnosis_id_idx` (`diagnosis_id` ASC),
  CONSTRAINT `FK_establish_diagnosis_doctor_id`
    FOREIGN KEY (`doctor_id`)
    REFERENCES `medi_life`.`doctor` (`doctor_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_establish_diagnosis_diagnosis_id`
    FOREIGN KEY (`diagnosis_id`)
    REFERENCES `medi_life`.`diagnosis` (`diagnosis_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `medi_life`.`admins` ( 
    email VARCHAR(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
    pass VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
    id INT NOT NULL, 
    PRIMARY KEY (id)
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

INSERT INTO `medi_life`.`admins`(email, pass, id) VALUES ('admin@medilife.com', '$2y$10$7Zv8jYnX4RLSqLyI4odb6eys79m61Vm.FCK.6NrLa88FVTlKThkEi', 42);
