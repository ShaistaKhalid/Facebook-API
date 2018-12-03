CREATE TABLE clubs (
club_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
club_name VARCHAR(50) NOT NULL,
ground VARCHAR(50) NOT NULL);

USE gc200395613;
INSERT INTO clubs (club_name, ground)
VALUES 
('Arsenal', 'Emirates Stadium'),
('Chelsea', 'Stamford Bridge'),
('Everton', 'Goodison Park'),
('Liverpool', 'Anfield'),
('Manchester City', 'The Etihad'),
('Manchester United', 'Old Trafford'),
('Tottenham Hotspur', 'White Hart Lane');

select * FROM clubs;
drop table clubs;