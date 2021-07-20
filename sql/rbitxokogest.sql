create DATABASE rbitxgdb;

CREATE TABLE 'roles' (
  'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
  'name' varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'name' ('name')
);
CREATE TABLE 'users' (
  'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
  'user' varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  'password' varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  'role_id' int(10) unsigned DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'user' ('user'),
  KEY 'fk_roles' ('role_id'),
  CONSTRAINT 'fk_roles' FOREIGN KEY ('role_id') REFERENCES 'roles' ('id')
);
