CREATE TABLE users (
   userid INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   email VARCHAR(100) NOT NULL,
   password VARCHAR(100) NOT NULL
);

CREATE TABLE todo (
   todoid INT AUTO_INCREMENT PRIMARY KEY,
   userid INT,
   message_text VARCHAR(200) NOT NULL,
   message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE shots (
   shotid INT AUTO_INCREMENT PRIMARY KEY,
   userid INT,
   club VARCHAR(50) NOT NULL,
   distance DECIMAL(5, 2) NOT NULL,
   shot_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (userid) REFERENCES users(userid)
);

CREATE TABLE average_distances (
   userid INT,
   club VARCHAR(50) NOT NULL,
   avg_distance DECIMAL(5, 2) NOT NULL,
   PRIMARY KEY (userid, club),
   FOREIGN KEY (userid) REFERENCES users(userid)
);

DELIMITER //
CREATE TRIGGER update_average_on_shot_added
AFTER INSERT ON shots FOR EACH ROW
BEGIN
   DECLARE total_distance DECIMAL(10, 2);
   DECLARE shot_count INT;
   DECLARE avg_distance DECIMAL(5, 2);
   
   SELECT SUM(distance), COUNT(*) INTO total_distance, shot_count
   FROM shots
   WHERE userid = NEW.userid AND club = NEW.club;
   
   SET avg_distance = total_distance / NULLIF(shot_count, 0);
   
   INSERT INTO average_distances (userid, club, avg_distance)
   VALUES (NEW.userid, NEW.club, avg_distance)
   ON DUPLICATE KEY UPDATE avg_distance = avg_distance;
END;
//

CREATE TRIGGER update_average_on_shot_removed
AFTER DELETE ON shots FOR EACH ROW
BEGIN
   DECLARE total_distance DECIMAL(10, 2);
   DECLARE shot_count INT;
   DECLARE avg_distance DECIMAL(5, 2);
   
   SELECT SUM(distance), COUNT(*) INTO total_distance, shot_count
   FROM shots
   WHERE userid = OLD.userid AND club = OLD.club;
   
   SET avg_distance = total_distance / NULLIF(shot_count, 0);
   
   IF shot_count = 0 THEN
      DELETE FROM average_distances
      WHERE userid = OLD.userid AND club = OLD.club;
   ELSE
      INSERT INTO average_distances (userid, club, avg_distance)
      VALUES (OLD.userid, OLD.club, avg_distance)
      ON DUPLICATE KEY UPDATE avg_distance = avg_distance;
   END IF;
END;
//

DELIMITER ;

INSERT INTO users (email, username, password)
VALUES ('admin@admin.com', 'admin', 'admin');

INSERT INTO users (email, username, password)
VALUES ('rorywood9@live.com', 'rory3140', 'Woody3120!');
