-- Supertype: User
CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY
);

-- Subtypes: Registered, Guest
CREATE TABLE Registered (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    join_date DATE,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);

CREATE TABLE Guest (
    user_id INT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);

-- Supertype: Animal
CREATE TABLE Animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,

    avg_size ENUM('Small','Medium','Large') NOT NULL,
    vocality ENUM('Quiet','Average','Loud') NOT NULL,
    shedding ENUM('Low','Medium','High') NOT NULL,
    temperament ENUM('Calm','Balanced','Playful') NOT NULL,
    energy ENUM('Laid_back','Moderate','Active') NOT NULL,
    sociability ENUM('Reserved','Indifferent','Sociable') NOT NULL,
    assertiveness ENUM('Submissive','Balanced','Assertive') NOT NULL DEFAULT 'Balanced',
    independence ENUM('Dependent','Moderate','Independent') NOT NULL,
    
    climate_tolerance ENUM('Cold','Temperate','Hot','Humid','Dry','Adaptable') NOT NULL DEFAULT 'Adaptable',
    space_requirements ENUM('Small','Medium','Large') NOT NULL,

    care_cost_level ENUM('Low','Medium','High') NOT NULL,
    hypoallergenic BOOLEAN NOT NULL DEFAULT FALSE
);

-- Subtypes: Dog, Cat, Bird
CREATE TABLE Dog (
    animal_id INT PRIMARY KEY,
    breed_name VARCHAR(120) NOT NULL UNIQUE,
    trainability ENUM('Easy','Average','Challenging') NOT NULL,
    grooming_need ENUM('Low','Moderate','High') NOT NULL,
    image_url VARCHAR(255),
    FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE
);

CREATE TABLE Cat (
    animal_id INT PRIMARY KEY,
    breed_name VARCHAR(120) NOT NULL UNIQUE,
    coat_length ENUM('Short','Medium','Long') NOT NULL,
    grooming_need ENUM('Low','Moderate','High') NOT NULL,
    image_url VARCHAR(255),
    FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE
);

CREATE TABLE Bird (
    animal_id INT PRIMARY KEY,
    breed_name VARCHAR(120) NOT NULL UNIQUE,
    wing_span ENUM('Small','Medium','Large') NOT NULL,
    talking_ability BOOLEAN NOT NULL DEFAULT FALSE,
    image_url VARCHAR(255),
    FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE
);

-- Supertype: Preference
CREATE TABLE Preference (
    pref_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    attribute ENUM(
        'avg_size','vocality','shedding','temperament','energy',
        'sociability','assertiveness','independence','climate_tolerance',
        'space_requirements','care_cost_level','hypoallergenic'
    ) NOT NULL,
    desired_value VARCHAR(32) NOT NULL
);

-- Subtype: Essential, Preferred
CREATE TABLE EssentialPreference (
    pref_id INT PRIMARY KEY,
    FOREIGN KEY (pref_id) REFERENCES Preference(pref_id) ON DELETE CASCADE
);

CREATE TABLE PreferredPreference (
    pref_id INT PRIMARY KEY,
    FOREIGN KEY (pref_id) REFERENCES Preference(pref_id) ON DELETE CASCADE
);

-- Mapping tables for many-to-many relationships
CREATE TABLE Favorite (
    user_id INT NOT NULL,
    animal_id INT NOT NULL,
    PRIMARY KEY (user_id, animal_id),
    FOREIGN KEY (user_id) REFERENCES Registered(user_id) ON DELETE CASCADE,
    FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE
);

CREATE TABLE Fulfill (
    animal_id INT NOT NULL,
    pref_id INT NOT NULL,
    PRIMARY KEY (animal_id, pref_id),
    FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (pref_id) REFERENCES Preference(pref_id) ON DELETE CASCADE
);

CREATE TABLE Sets (
    user_id INT NOT NULL,
    pref_id INT NOT NULL,
    PRIMARY KEY (user_id, pref_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE,
    FOREIGN KEY (pref_id) REFERENCES Preference(pref_id) ON DELETE CASCADE
);