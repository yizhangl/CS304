## Relational Schema

Characters (Name: string, ID: int, SkillLevel: string)
(ID needs to be unique)

Cars (<ins>Make</ins>: string, <ins>Model</ins>: string, Colour: string, Class: string, Speed: int, Handling: int, Acceleration: int, **CharacterName**: string)

SpecialAbilities (<ins>Name</ins>: string, Effect: string, <ins>**CharacterName**</ins>: string) 

Tournaments (<ins>Name</ins>: string, Trophy: string)
(Trophy needs to be unique)

Races (<ins>Name</ins>: string, Difficulty: string)

Circuits (<ins>**RaceName**</ins>: string, NumberOfLaps: int)

TimeTrials (<ins>**RaceName**</ins>: string, AllotedTime: int)

Locations_1 (<ins>Name</ins>: string, **Season**: string)

Locations_2 (<ins>Season</ins>: string, Weather: string)

RaceTracks (Name: string, Terrain: string, **LocationName**: string)
(locationName cannot be null)

PowerUps_1 (<ins>Name</ins>: string, **Effect**: string, Duration: int, Rarity: string)

PowerUps_2 (<ins>Effect</ins>: string, Type: string)

CharactersInRaces (<ins>**CharacterName**</ins>: string, <ins>**RaceName**</ins>: string) 
(total participation constraint needs to be done with assertion)

CharactersInTournaments (<ins>**CharacterName**</ins>: string, <ins>**TournamentName**</ins>: string)

TournamentsIncludeRaces (<ins>**TournamentName**</ins>: string, <ins>**RaceName**</ins>: string)
(total participation constraint needs to be done with assertion)

RaceTracksHostRaces (<ins>**RaceTrackName**</ins>: string, <ins>**RaceName**</ins>: string)
(total participation constraint needs to be done with assertion)

RacesHavePowerUps (<ins>**RaceName**</ins>: string, <ins>**PowerUpName**</ins>: string)