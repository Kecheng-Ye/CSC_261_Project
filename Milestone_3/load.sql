USE kye_1;

LOAD DATA LOCAL INFILE './Dataset/channels.csv' 
INTO TABLE Channel 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS

