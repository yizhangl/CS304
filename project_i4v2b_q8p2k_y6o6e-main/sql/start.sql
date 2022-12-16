--
-- Drop all existing tables
--
DROP TABLE Characters CASCADE CONSTRAINTS PURGE;
DROP TABLE Cars CASCADE CONSTRAINTS PURGE;
DROP TABLE SpecialAbilities CASCADE CONSTRAINTS PURGE;
DROP TABLE Tournaments CASCADE CONSTRAINTS PURGE;
DROP TABLE Races CASCADE CONSTRAINTS PURGE;
DROP TABLE Circuits CASCADE CONSTRAINTS PURGE;
DROP TABLE TimeTrials CASCADE CONSTRAINTS PURGE;
DROP TABLE Locations_2 CASCADE CONSTRAINTS PURGE;
DROP TABLE Locations_1 CASCADE CONSTRAINTS PURGE;
DROP TABLE RaceTracks CASCADE CONSTRAINTS PURGE;
DROP TABLE PowerUps_2 CASCADE CONSTRAINTS PURGE;
DROP TABLE PowerUps_1 CASCADE CONSTRAINTS PURGE;
DROP TABLE CharactersInRaces CASCADE CONSTRAINTS PURGE;
DROP TABLE CharactersInTournaments CASCADE CONSTRAINTS PURGE;
DROP TABLE TournamentsIncludeRaces CASCADE CONSTRAINTS PURGE;
DROP TABLE RaceTracksHostRaces CASCADE CONSTRAINTS PURGE;
DROP TABLE RacesHavePowerUps CASCADE CONSTRAINTS PURGE;

--
-- Create all tables
--
CREATE TABLE Characters(
    Name varchar(30) PRIMARY KEY,
    ID integer UNIQUE,
    SkillLevel varchar(30)
);

CREATE TABLE Cars(
    Make varchar(30),
    Model varchar(30),
    Colour varchar(20),
    Class varchar(30),
    Speed integer,
    Handling integer,
    Acceleration integer,
    CharacterName varchar(30) DEFAULT NULL,
    PRIMARY KEY (Make, Model),
    FOREIGN KEY (CharacterName) REFERENCES Characters(Name) ON DELETE SET NULL
);

CREATE TABLE SpecialAbilities(
    Name varchar(30),
    Effect varchar(100),
    CharacterName varchar(30),
    PRIMARY KEY (Name, CharacterName),
    FOREIGN KEY (CharacterName) REFERENCES Characters(Name) ON DELETE CASCADE
);

CREATE TABLE Tournaments(
    Name varchar(30) PRIMARY KEY,
    Trophy varchar(20) UNIQUE
);

CREATE TABLE Races(
    Name varchar(30) PRIMARY KEY,
    Difficulty varchar(30)
);

CREATE TABLE Circuits(
    RaceName varchar(30) PRIMARY KEY,
    NumberOfLaps integer,
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE
);

CREATE TABLE TimeTrials(
    RaceName varchar(30) PRIMARY KEY,
    AllottedTime integer,
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE
);

CREATE TABLE Locations_2(
    Season varchar(30) PRIMARY KEY,
    Weather varchar(30)
);

CREATE TABLE Locations_1(
    Name varchar(30) PRIMARY KEY,
    Season varchar(30),
    FOREIGN KEY (Season) REFERENCES Locations_2(Season)
);

CREATE TABLE RaceTracks(
    Name varchar(30) PRIMARY KEY,
    Terrain varchar(30),
    LocationName varchar(30) NOT NULL,
    FOREIGN KEY (LocationName) REFERENCES Locations_1(Name) ON DELETE CASCADE
);

CREATE TABLE PowerUps_2(
    Effect varchar(100) PRIMARY KEY,
    Type varchar(30)
);

CREATE TABLE PowerUps_1(
    Name varchar(30) PRIMARY KEY,
    Effect varchar(100),
    Duration integer,
    Rarity varchar(30),
    FOREIGN KEY (Effect) REFERENCES PowerUps_2(Effect)
);

CREATE TABLE CharactersInRaces(
    CharacterName varchar(30),
    RaceName varchar(30),
    PRIMARY KEY (CharacterName, RaceName),
    FOREIGN KEY (CharacterName) REFERENCES Characters(Name) ON DELETE CASCADE,
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE
);

CREATE TABLE CharactersInTournaments(
    CharacterName varchar(30),
    TournamentName varchar(30),
    PRIMARY KEY (CharacterName, TournamentName),
    FOREIGN KEY (CharacterName) REFERENCES Characters(Name) ON DELETE CASCADE,
    FOREIGN KEY (TournamentName) REFERENCES Tournaments(Name) ON DELETE CASCADE
);

CREATE TABLE TournamentsIncludeRaces(
    TournamentName varchar(30),
    RaceName varchar(30),
    PRIMARY KEY (TournamentName, RaceName),
    FOREIGN KEY (TournamentName) REFERENCES Tournaments(Name) ON DELETE CASCADE,
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE
);

CREATE TABLE RaceTracksHostRaces(
    RaceTrackName varchar(30),
    RaceName varchar(30),
    PRIMARY KEY (RaceTrackName, RaceName),
    FOREIGN KEY (RaceTrackName) REFERENCES RaceTracks(Name) ON DELETE CASCADE,
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE
);

CREATE TABLE RacesHavePowerUps(
    RaceName varchar(30) ,
    PowerUpName varchar(30),
    PRIMARY KEY (RaceName, PowerUpName),
    FOREIGN KEY (RaceName) REFERENCES Races(Name) ON DELETE CASCADE,
    FOREIGN KEY (PowerUpName) REFERENCES PowerUps_1(Name) ON DELETE CASCADE
);

--
-- Populate all tables with data
--
INSERT INTO Characters VALUES('Aloy', 1, 'Novice');
INSERT INTO Characters VALUES('Cloud Strife', 2, 'Proficient');
INSERT INTO Characters VALUES('Crash Bandicoot', 3, 'Competent');
INSERT INTO Characters VALUES('Isabelle', 4, 'Novice');
INSERT INTO Characters VALUES('Mario', 5, 'Expert');
INSERT INTO Characters VALUES('Master Chief', 6, 'Expert');
INSERT INTO Characters VALUES('Princess Zelda', 7, 'Proficient');
INSERT INTO Characters VALUES('Solid Snake', 8, 'Novice');
INSERT INTO Characters VALUES('Sonic the Hedgehog', 9, 'Expert');

INSERT INTO Cars VALUES('Nissan', '370Z', 'White', 'Drift', 51, 89, 75, 'Aloy');
INSERT INTO Cars VALUES('BMW', 'M4', 'Blue', 'Sport', 80, 34, 47, 'Cloud Strife');
INSERT INTO Cars VALUES('Mercedes', 'SLS', 'Silver', 'Sport', 88, 48, 50, 'Crash Bandicoot');
INSERT INTO Cars VALUES('Acura', 'NSX', 'Red', 'Drift', 55, 84, 88, 'Isabelle');
INSERT INTO Cars VALUES('Subaru', 'WRX', 'Purple', 'Drift', 75, 77, 76, 'Mario');
INSERT INTO Cars VALUES('Toyota', 'GT86', 'Turquoise', 'Drift', 49, 80, 90, 'Master Chief');
INSERT INTO Cars VALUES('Mercedes', 'G-Wagon', 'Pink', 'Off-Road', 78, 53, 80, 'Princess Zelda');
INSERT INTO Cars VALUES('Lamborghini', 'Urus', 'Yellow', 'Off-Road', 80, 42, 87, 'Solid Snake');
INSERT INTO Cars VALUES('McLaren', '720S', 'Orange', 'Sport', 94, 30, 42, 'Sonic the Hedgehog');
INSERT INTO Cars VALUES('Audi', 'R8', 'Light Blue', 'Sport', 85, 52, 40, 'Aloy');
INSERT INTO Cars VALUES('BMW', 'X5', 'Black', 'Off-Road', 68, 75, 80, 'Mario');
INSERT INTO Cars VALUES('Pagani', 'Zonda', 'Black', 'Super', 90, 85, 89, 'Cloud Strife');
INSERT INTO Cars VALUES('Koenigsegg', 'Jesko', 'Silver', 'Super', 99, 99, 99, 'Mario');

INSERT INTO Races VALUES('Circuit 1', 'Easy');
INSERT INTO Races VALUES('Circuit 2', 'Normal');
INSERT INTO Races VALUES('Circuit 3', 'Normal');
INSERT INTO Races VALUES('Circuit 4', 'Hard');
INSERT INTO Races VALUES('Circuit 5', 'Expert');
INSERT INTO Races VALUES('Time Trial 1', 'Easy');
INSERT INTO Races VALUES('Time Trial 2', 'Normal');
INSERT INTO Races VALUES('Time Trial 3', 'Normal');
INSERT INTO Races VALUES('Time Trial 4', 'Hard');
INSERT INTO Races VALUES('Time Trial 5', 'Expert');

INSERT INTO Circuits VALUES('Circuit 1', 2);
INSERT INTO Circuits VALUES('Circuit 2', 3);
INSERT INTO Circuits VALUES('Circuit 3', 1);
INSERT INTO Circuits VALUES('Circuit 4', 5);
INSERT INTO Circuits VALUES('Circuit 5', 7);

INSERT INTO TimeTrials VALUES('Time Trial 1', 150);
INSERT INTO TimeTrials VALUES('Time Trial 2', 135);
INSERT INTO TimeTrials VALUES('Time Trial 3', 240);
INSERT INTO TimeTrials VALUES('Time Trial 4', 100);
INSERT INTO TimeTrials VALUES('Time Trial 5', 80);

INSERT INTO Locations_2 VALUES('Summer', 'Sunshine');
INSERT INTO Locations_2 VALUES('Winter', 'Snow');
INSERT INTO Locations_2 VALUES('Autumn', 'Fog');
INSERT INTO Locations_2 VALUES('Spring', 'Rain');

INSERT INTO Locations_1 VALUES('Germany', 'Summer');
INSERT INTO Locations_1 VALUES('Japan', 'Winter');
INSERT INTO Locations_1 VALUES('United States', 'Autumn');
INSERT INTO Locations_1 VALUES('Brazil', 'Summer');
INSERT INTO Locations_1 VALUES('United Kingdom', 'Spring');
INSERT INTO Locations_1 VALUES('France', 'Summer');
INSERT INTO Locations_1 VALUES('Belgium', 'Winter');

INSERT INTO RaceTracks VALUES('Nurburgring', 'Hill Climb', 'Germany');
INSERT INTO RaceTracks VALUES('Nosrisring', 'Street Circuit', 'Germany');
INSERT INTO RaceTracks VALUES('Hockenheimring', 'Permanent Circuit', 'Germany');
INSERT INTO RaceTracks VALUES('Suzuka Circuit', 'Permanent Circuit', 'Japan');
INSERT INTO RaceTracks VALUES('Fuji Speedway', 'Speedway', 'Japan');
INSERT INTO RaceTracks VALUES('Tsukuba', 'Permanent Circuit', 'Japan');
INSERT INTO RaceTracks VALUES('Sau Paulo', 'Street Circuit', 'Brazil');
INSERT INTO RaceTracks VALUES('Interlagos', 'Permenent Circuit', 'Brazil');
INSERT INTO RaceTracks VALUES('Ultra4 UK', 'Off Road', 'United Kingdom');
INSERT INTO RaceTracks VALUES('Knockhill', 'Hill Climb', 'United Kingdom');
INSERT INTO RaceTracks VALUES('Indianapolis Motor', 'Speedway', 'United States');
INSERT INTO RaceTracks VALUES('Laguna Seca', 'Permanent Circuit', 'United States');
INSERT INTO RaceTracks VALUES('Daytona', 'Permanent Circuit', 'United States');
INSERT INTO RaceTracks VALUES('Sebring', 'Permanent Circuit', 'United States');
INSERT INTO RaceTracks VALUES('Le Mans', 'Permanent Circuit', 'France');
INSERT INTO RaceTracks VALUES('La Chatre', 'Street Circuit', 'France');
INSERT INTO RaceTracks VALUES('Brussels', 'Street Circuit', 'Belgium');
INSERT INTO RaceTracks VALUES('Spa-Francorchamps', 'Permanent Circuit', 'Belgium');

INSERT INTO PowerUps_2 VALUES('Causes the user car to spin out.', 'Offensive');
INSERT INTO PowerUps_2 VALUES('Can be launched by a character to spin out an opponent car.', 'Offensive');
INSERT INTO PowerUps_2 VALUES('Causes the user car to turn off', 'Offensive');
INSERT INTO PowerUps_2 VALUES('Temporarily increases car acceleration by 30', 'Status');
INSERT INTO PowerUps_2 VALUES('Makes the car invisible to other cars', 'Defensive');
INSERT INTO PowerUps_2 VALUES('Causes all opponents to lose their power-ups', 'Offensive');
INSERT INTO PowerUps_2 VALUES('Temporarily increases car speed by 10', 'Status');
INSERT INTO PowerUps_2 VALUES('Temporarily increases car handling by 20', 'Status');

INSERT INTO PowerUps_1 VALUES('Banana', 'Causes the user car to spin out.', 3, 'Common');
INSERT INTO PowerUps_1 VALUES('Green Shell', 'Can be launched by a character to spin out an opponent car.', 5, 'Rare');
INSERT INTO PowerUps_1 VALUES('EMP', 'Causes the user car to turn off', 2, 'Common');
INSERT INTO PowerUps_1 VALUES('Nitrous Oxide', 'Temporarily increases car acceleration by 30', 10, 'Rare');
INSERT INTO PowerUps_1 VALUES('Ghost', 'Makes the car invisible to other cars', 5, 'Very Rare');
INSERT INTO PowerUps_1 VALUES('Lightning', 'Causes all opponents to lose their power-ups', 1, 'Very Rare');
INSERT INTO PowerUps_1 VALUES('Jerrycan', 'Temporarily increases car speed by 10', 5, 'Common');
INSERT INTO PowerUps_1 VALUES('Steering Wheel', 'Temporarily increases car handling by 20', 2, 'Common');

INSERT INTO Tournaments VALUES('American Cup', 'Diamond Eagle Statue');
INSERT INTO Tournaments VALUES('Drift Championship', 'Gold Medal');
INSERT INTO Tournaments VALUES('European Cup', 'Gold Cup');
INSERT INTO Tournaments VALUES('Pan-American Championship', 'Gold Plaque');
INSERT INTO Tournaments VALUES('World Championship', 'Diamond Globe Statue');

INSERT INTO SpecialAbilities VALUES('Focus', 'Makes the character immune from negative power-ups from opponents', 'Aloy');
INSERT INTO SpecialAbilities VALUES('Finishing Touch', 'Can be activated once in a race to decrease the speed of all opponent cars by 50 for 20s', 'Cloud Strife');
INSERT INTO SpecialAbilities VALUES('Speed Shoes', 'Permanently increases car speed by 15', 'Crash Bandicoot');
INSERT INTO SpecialAbilities VALUES('Duration Boost', 'Permanently doubles the duration of all consumed power-ups', 'Isabelle');
INSERT INTO SpecialAbilities VALUES('Fire Flower', 'Can be activated up to 3 times in a race to spin out opponent cars', 'Mario');
INSERT INTO SpecialAbilities VALUES('Fortune Pill', '50% chance of increasing car speed by 10', 'Mario');
INSERT INTO SpecialAbilities VALUES('Spartan Sprint', 'Permanently increases car speed by 20', 'Master Chief');
INSERT INTO SpecialAbilities VALUES('Magic', 'Permanently increases all car stats by 5', 'Princess Zelda');
INSERT INTO SpecialAbilities VALUES('Cardboard box', 'Can be activated up to 3 times to become invisible from other characters for 10s', 'Solid Snake');
INSERT INTO SpecialAbilities VALUES('Spin Dash', 'Permanently increases car speed and acceleration by 10', 'Sonic the Hedgehog');

INSERT INTO CharactersInRaces VALUES('Aloy', 'Circuit 1');
INSERT INTO CharactersInRaces VALUES('Mario', 'Circuit 1');
INSERT INTO CharactersInRaces VALUES('Sonic the Hedgehog', 'Circuit 3');
INSERT INTO CharactersInRaces VALUES('Cloud Strife', 'Circuit 4');
INSERT INTO CharactersInRaces VALUES('Isabelle', 'Circuit 5');
INSERT INTO CharactersInRaces VALUES('Master Chief', 'Time Trial 1');
INSERT INTO CharactersInRaces VALUES('Solid Snake', 'Time Trial 2');
INSERT INTO CharactersInRaces VALUES('Princess Zelda', 'Time Trial 3');
INSERT INTO CharactersInRaces VALUES('Crash Bandicoot', 'Time Trial 4');
INSERT INTO CharactersInRaces VALUES('Mario', 'Time Trial 5');
INSERT INTO CharactersInRaces VALUES('Aloy', 'Time Trial 2');

INSERT INTO CharactersInTournaments VALUES('Aloy', 'Pan-American Championship');
INSERT INTO CharactersInTournaments VALUES('Aloy', 'American Cup');
INSERT INTO CharactersInTournaments VALUES('Aloy', 'European Cup');
INSERT INTO CharactersInTournaments VALUES('Aloy', 'Drift Championship');
INSERT INTO CharactersInTournaments VALUES('Aloy', 'World Championship');
INSERT INTO CharactersInTournaments VALUES('Mario', 'Pan-American Championship');
INSERT INTO CharactersInTournaments VALUES('Mario', 'American Cup');
INSERT INTO CharactersInTournaments VALUES('Mario', 'European Cup');
INSERT INTO CharactersInTournaments VALUES('Mario', 'Drift Championship');
INSERT INTO CharactersInTournaments VALUES('Mario', 'World Championship');
INSERT INTO CharactersInTournaments VALUES('Princess Zelda', 'American Cup');
INSERT INTO CharactersInTournaments VALUES('Crash Bandicoot', 'Drift Championship');
INSERT INTO CharactersInTournaments VALUES('Isabelle', 'European Cup');
INSERT INTO CharactersInTournaments VALUES('Sonic the Hedgehog', 'World Championship');

INSERT INTO TournamentsIncludeRaces VALUES('American Cup', 'Circuit 3');
INSERT INTO TournamentsIncludeRaces VALUES('American Cup', 'Time Trial 3');
INSERT INTO TournamentsIncludeRaces VALUES('Drift Championship', 'Circuit 2');
INSERT INTO TournamentsIncludeRaces VALUES('European Cup', 'Circuit 5');
INSERT INTO TournamentsIncludeRaces VALUES('Pan-American Championship', 'Circuit 4');
INSERT INTO TournamentsIncludeRaces VALUES('World Championship', 'Circuit 1');
INSERT INTO TournamentsIncludeRaces VALUES('World Championship', 'Circuit 2');

INSERT INTO RaceTracksHostRaces VALUES('Nurburgring', 'Circuit 1');
INSERT INTO RaceTracksHostRaces VALUES('Nurburgring', 'Time Trial 5');
INSERT INTO RaceTracksHostRaces VALUES('Nosrisring', 'Circuit 2');
INSERT INTO RaceTracksHostRaces VALUES('Hockenheimring', 'Circuit 3');
INSERT INTO RaceTracksHostRaces VALUES('Hockenheimring', 'Time Trial 4');
INSERT INTO RaceTracksHostRaces VALUES('Suzuka Circuit', 'Circuit 2');
INSERT INTO RaceTracksHostRaces VALUES('Suzuka Circuit', 'Time Trial 3');
INSERT INTO RaceTracksHostRaces VALUES('Fuji Speedway' ,'Circuit 1');
INSERT INTO RaceTracksHostRaces VALUES('Fuji Speedway' ,'Circuit 5');
INSERT INTO RaceTracksHostRaces VALUES('Tsukuba' ,'Time Trial 4');
INSERT INTO RaceTracksHostRaces VALUES('Sau Paulo', 'Circuit 4');
INSERT INTO RaceTracksHostRaces VALUES('Sau Paulo', 'Time Trial 4');
INSERT INTO RaceTracksHostRaces VALUES('Interlagos' ,'Circuit 1');
INSERT INTO RaceTracksHostRaces VALUES('Interlagos' ,'Time Trial 2');
INSERT INTO RaceTracksHostRaces VALUES('Ultra4 UK', 'Circuit 5');
INSERT INTO RaceTracksHostRaces VALUES('Ultra4 UK', 'Time Trial 5');
INSERT INTO RaceTracksHostRaces VALUES('Knockhill' ,'Circuit 3');
INSERT INTO RaceTracksHostRaces VALUES('Knockhill' ,'Time Trial 2');
INSERT INTO RaceTracksHostRaces VALUES('Laguna Seca', 'Time Trial 1');
INSERT INTO RaceTracksHostRaces VALUES('Indianapolis Motor', 'Circuit 3');
INSERT INTO RaceTracksHostRaces VALUES('Daytona' ,'Circuit 5');
INSERT INTO RaceTracksHostRaces VALUES('Sebring' ,'Time Trial 2');
INSERT INTO RaceTracksHostRaces VALUES('Laguna Seca' ,'Circuit 1');
INSERT INTO RaceTracksHostRaces VALUES('Le Mans', 'Circuit 5');
INSERT INTO RaceTracksHostRaces VALUES('Le Mans', 'Time Trial 5');
INSERT INTO RaceTracksHostRaces VALUES('La Chatre', 'Circuit 2');
INSERT INTO RaceTracksHostRaces VALUES('Brussels', 'Circuit 1');
INSERT INTO RaceTracksHostRaces VALUES('Brussels', 'Circuit 3');
INSERT INTO RaceTracksHostRaces VALUES('Spa-Francorchamps', 'Time Trial 2');

INSERT INTO RacesHavePowerUps VALUES('Circuit 1', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Circuit 2', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Circuit 3', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Circuit 4', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Circuit 5', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 1', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 2', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 3', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 4', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 5', 'Banana');
INSERT INTO RacesHavePowerUps VALUES('Circuit 1', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Circuit 2', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Circuit 3', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Circuit 4', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Circuit 5', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 1', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 2', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 3', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 4', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 5', 'EMP');
INSERT INTO RacesHavePowerUps VALUES('Circuit 1', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Circuit 2', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Circuit 3', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Circuit 4', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Circuit 5', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 1', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 2', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 3', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 4', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 5', 'Steering Wheel');
INSERT INTO RacesHavePowerUps VALUES('Circuit 1', 'Green Shell');
INSERT INTO RacesHavePowerUps VALUES('Circuit 3', 'Green Shell');
INSERT INTO RacesHavePowerUps VALUES('Circuit 5', 'Green Shell');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 2', 'Green Shell');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 4', 'Green Shell');
INSERT INTO RacesHavePowerUps VALUES('Circuit 2', 'Nitrous Oxide');
INSERT INTO RacesHavePowerUps VALUES('Circuit 4', 'Nitrous Oxide');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 1', 'Nitrous Oxide');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 3', 'Nitrous Oxide');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 5', 'Nitrous Oxide');
INSERT INTO RacesHavePowerUps VALUES('Circuit 5', 'Ghost');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 5', 'Ghost');
INSERT INTO RacesHavePowerUps VALUES('Circuit 3', 'Lightning');
INSERT INTO RacesHavePowerUps VALUES('Time Trial 4', 'Lightning');