DROP TABLE IF EXISTS nasa.users;
CREATE TABLE IF NOT EXISTS nasa.users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created_at datetime NOT NULL,
  token varchar(255) NOT NULL,
  verified tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS nasa.counters;
CREATE TABLE IF NOT EXISTS nasa.counters (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  value int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS nasa.newsletter;
CREATE TABLE IF NOT EXISTS nasa.newsletter (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  inscription int (11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;