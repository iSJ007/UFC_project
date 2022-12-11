CREATE TABLE compare (
  id varchar(10) DEFAULT NULL,
  user_id varchar(10) DEFAULT NULL,
  fighter_id1 varchar(10) DEFAULT NULL,
  fighter_id2 varchar(10) DEFAULT NULL,
  winner varchar(10) DEFAULT NULL
);

CREATE TABLE fighter (
  fighter_id int(4) DEFAULT NULL,
  fighter_name varchar(27) DEFAULT NULL,
  fighter_height varchar(6) DEFAULT NULL,
  fighter_weight varchar(8) DEFAULT NULL,
  fighter_reach varchar(3) DEFAULT NULL,
  fighter_stance varchar(11) DEFAULT NULL,
  fighter_dob varchar(15) DEFAULT NULL,
  fighter_slpm decimal(4,2) DEFAULT NULL,
  fighter_stracc decimal(3,2) DEFAULT NULL,
  fighter_strdef decimal(3,2) DEFAULT NULL,
  fighter_tdavg decimal(4,2) DEFAULT NULL,
  fighter_tdacc decimal(3,2) DEFAULT NULL,
  fighter_tddef decimal(3,2) DEFAULT NULL,
  fighter_subavg decimal(3,1) DEFAULT NULL,
  fighter_nick varchar(33) DEFAULT NULL,
  fighter_class varchar(17) DEFAULT NULL,
  fighter_loc varchar(40) DEFAULT NULL,
  fighter_country varchar(25) DEFAULT NULL
); 


CREATE TABLE fights (
  fight_id int(3) DEFAULT NULL,
  Fights varchar(43) DEFAULT NULL,
   R_fighter varchar(23) DEFAULT NULL,
  B_fighter varchar(21) DEFAULT NULL,
  R_odds int(5) DEFAULT NULL,
  B_odds int(4) DEFAULT NULL,
  datee varchar(15) DEFAULT NULL,
  fight_location varchar(42) DEFAULT NULL,
  fight_country varchar(21) DEFAULT NULL,
  fight_winner varchar(21) DEFAULT NULL,
  fight_weightclass varchar(21) DEFAULT NULL,
  gender varchar(6) DEFAULT NULL,
  R_age int(2) DEFAULT NULL,
  B_age int(2) DEFAULT NULL,
  finish varchar(6) DEFAULT NULL
); 


CREATE TABLE rankings (
  Rank int(3) DEFAULT NULL,
  Name varchar(24) DEFAULT NULL
); 

CREATE TABLE ratings (
  UserID int(10) UNSIGNED DEFAULT NULL,
  FightID int(10) UNSIGNED DEFAULT NULL,
  Points int(10) UNSIGNED DEFAULT NULL
);

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL
);