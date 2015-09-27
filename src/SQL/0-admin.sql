# administrator associations

CREATE TABLE IF NOT EXISTS designation (
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (name)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admin(
    id INT(10) NOT NULL AUTO_INCREMENT, 
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
	designation_id INT(10) NOT NULL,
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	modified DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	status VARCHAR(50) NOT NULL DEFAULT 'active',
    PRIMARY KEY (id),
	FOREIGN KEY (designation_id)
		REFERENCES designation(id)
		ON DELETE CASCADE,
	UNIQUE (username)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admin_profile (
	admin_id INT(10) NOT NULL,
	firstname VARCHAR(255) NOT NULL,
	lastname VARCHAR(255) NOT NULL,
	email VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY (admin_id),
	FOREIGN KEY (admin_id)
		REFERENCES admin(id)
		ON DELETE CASCADE,
	UNIQUE (email)
) ENGINE=InnoDB;

INSERT INTO designation VALUES(NULL,'Full Administrator');
INSERT INTO admin VALUES(NULL,'admin','$2y$10$Mxv6VnbJjmLkCPmcD1El8uneKcY1otWNc6cus7CafEXIKRlVKLXfy',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'active');
INSERT INTO admin_profile VALUES(LAST_INSERT_ID(),'Administrator','Default','email@mail.to');

CREATE TABLE IF NOT EXISTS admin_image(
	admin_id INT(10) NOT NULL,
	created TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6), 
	directory VARCHAR(255),
	file_size VARCHAR(255) NOT NULL,
	file_path VARCHAR(255) NOT NULL,
	name VARCHAR(255) NOT NULL,
	file_type VARCHAR(255) NOT NULL,
	PRIMARY KEY (admin_id,created),
	FOREIGN KEY (admin_id)
		REFERENCES admin(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;








