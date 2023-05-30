CREATE TABLE Eois (
    eoi_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    job_ref_id CHAR(5) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Female', 'Male', 'Other') NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state_code ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    post_code CHAR(4) NOT NULL,
    email_address VARCHAR(30) NOT NULL,
    phone_num VARCHAR(12) NOT NULL,
    other_skills TEXT,
    status_code ENUM('New', 'Current', 'Final') NOT NULL,
    PRIMARY KEY(eoi_id)
);

CREATE TABLE Skills (
    skill_name VARCHAR(10) NOT NULL,
    PRIMARY KEY (skill_name)
);

CREATE TABLE EoiSkills (
    eoi_id INT UNSIGNED NOT NULL,
    skill_name VARCHAR(10) NOT NULL,
    PRIMARY KEY (eoi_id, skill_name),
    FOREIGN KEY (eoi_id) REFERENCES Eois (eoi_id)
        ON DELETE CASCADE
    FOREIGN KEY (skill_name) REFERENCES Skills (skill_name)
        ON DELETE CASCADE
);


INSERT INTO Skills (skill_name) VALUES
('C#'),
('CSS'),
('HTML'),
('Javascript'),
('PHP'),
('Python'),
('Ruby');



