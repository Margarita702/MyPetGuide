-- USERS
INSERT INTO User (user_id) VALUES (1), (2), (3), (4), (5), (6), (7);

INSERT INTO Registered (user_id, first_name, last_name, email, user_password, join_date) VALUES
(1, 'Armin', 'Arlert', 'armin@example.com', 'pass123', '2025-01-10'),
(2, 'Eren', 'Jeager', 'eren@example.com', 'pass456', '2025-02-15'),
(3, 'Historia', 'Reiss', 'krista@example.com', 'pass789', '2025-03-20'),
(6, 'Mikasa', 'Ackermann', 'mikasa@example.com', 'pass321', '2025-04-25'),   -- has nothing done
(7, 'Sasha', 'Braus', 'potato@example.com', 'pass654', '2025-05-10');

INSERT INTO Guest (user_id) VALUES
(4),
(5);

-- ANIMALS
INSERT INTO Animal (
    animal_id, avg_size, vocality, shedding, temperament, energy,
    sociability, assertiveness, independence,
    climate_tolerance, space_requirements,
    care_cost_level, hypoallergenic
) VALUES
(1, 'Medium', 'Average', 'Medium', 'Calm', 'Moderate', 'Sociable', 'Balanced', 'Moderate', 'Temperate', 'Medium', 'Medium', FALSE),
(2, 'Large', 'Loud', 'High', 'Playful', 'Active', 'Sociable', 'Assertive', 'Independent', 'Cold', 'Large', 'High', FALSE),
(3, 'Small', 'Quiet', 'Low', 'Balanced', 'Laid_back', 'Reserved', 'Submissive', 'Dependent', 'Adaptable', 'Small', 'Low', TRUE),
(4, 'Medium', 'Average', 'Medium', 'Calm', 'Moderate', 'Sociable', 'Balanced', 'Moderate', 'Temperate', 'Medium', 'Medium', FALSE),
(5, 'Small', 'Loud', 'Low', 'Playful', 'Active', 'Indifferent', 'Assertive', 'Independent', 'Hot', 'Small', 'Medium', FALSE),
(6, 'Large', 'Loud', 'High', 'Playful', 'Active', 'Sociable', 'Assertive', 'Independent', 'Cold', 'Large', 'High', FALSE),
(7, 'Small', 'Quiet', 'Low', 'Calm', 'Laid_back', 'Reserved', 'Submissive', 'Dependent', 'Adaptable', 'Small', 'Low', TRUE),
(8, 'Medium', 'Average', 'Medium', 'Balanced', 'Moderate', 'Indifferent', 'Balanced', 'Moderate', 'Temperate', 'Medium', 'Medium', FALSE),
(9, 'Small', 'Loud', 'Low', 'Playful', 'Active', 'Sociable', 'Balanced', 'Independent', 'Hot', 'Small', 'Medium', FALSE),
(10, 'Large', 'Average', 'Medium', 'Calm', 'Moderate', 'Sociable', 'Assertive', 'Moderate', 'Cold', 'Large', 'High', FALSE);

-- DOGS
INSERT INTO Dog (animal_id, breed_name, trainability, grooming_need, image_url) VALUES
(1, 'Golden Retriever', 'Easy', 'Moderate', 'https://example.com/dog1.jpg'),
(2, 'German Shepherd', 'Challenging', 'High', 'https://example.com/dog2.jpg'),
(6, 'Labrador Retriever', 'Easy', 'Moderate', 'https://example.com/dog3.jpg'),
(10, 'Rottweiler', 'Challenging', 'High', 'https://example.com/dog4.jpg');

-- CATS
INSERT INTO Cat (animal_id, breed_name, coat_length, grooming_need, image_url) VALUES
(3, 'Sphynx', 'Short', 'Low', 'https://example.com/cat1.jpg'),
(4, 'Maine Coon', 'Long', 'High', 'https://example.com/cat2.jpg'),
(7, 'Russian Blue', 'Short', 'Low', 'https://example.com/cat3.jpg'),
(8, 'British Shorthair', 'Medium', 'Moderate', 'https://example.com/cat4.jpg');

-- BIRDS
INSERT INTO Bird (animal_id, breed_name, wing_span, talking_ability, image_url) VALUES
(5, 'Budgerigar', 'Small', TRUE, 'https://example.com/bird1.jpg'),
(9, 'Cockatiel', 'Small', TRUE, 'https://example.com/bird2.jpg');

-- PREFERENCES
INSERT INTO Preference (pref_id, user_id, attribute, desired_value) VALUES
(1, 1, 'avg_size', 'Small'),
(2, 1, 'vocality', 'Quiet'),
(3, 1, 'shedding', 'Low'),
(4, 1, 'temperament', 'Calm'),
(5, 1, 'energy', 'Moderate'),
(6, 1, 'sociability', 'Sociable'),
(7, 1, 'assertiveness', 'Balanced'),
(8, 1, 'independence', 'Moderate'),
(9, 1, 'climate_tolerance', 'Temperate'),
(10, 1, 'space_requirements', 'Small'),
(11, 1, 'care_cost_level', 'Medium'),
(12, 1, 'hypoallergenic', 'TRUE'),

(13, 2, 'avg_size', 'Large'),
(14, 2, 'vocality', 'Average'),
(15, 2, 'shedding', 'Low'),
(16, 2, 'temperament', 'Playful'),
(17, 2, 'energy', 'Active'),
(18, 2, 'sociability', 'Sociable'),
(19, 2, 'assertiveness', 'Assertive'),
(20, 2, 'independence', 'Independent'),
(21, 2, 'climate_tolerance', 'Cold'),
(22, 2, 'space_requirements', 'Large'),
(23, 2, 'care_cost_level', 'High'),
(24, 2, 'hypoallergenic', 'FALSE'),

(25, 3, 'avg_size', 'Small'),
(26, 3, 'vocality', 'Quiet'),
(27, 3, 'shedding', 'Low'),
(28, 3, 'temperament', 'Balanced'),
(29, 3, 'energy', 'Laid_back'),
(30, 3, 'sociability', 'Reserved'),
(31, 3, 'assertiveness', 'Submissive'),
(32, 3, 'independence', 'Dependent'),
(33, 3, 'climate_tolerance', 'Adaptable'),
(34, 3, 'space_requirements', 'Small'),
(35, 3, 'care_cost_level', 'Low'),
(36, 3, 'hypoallergenic', 'TRUE'),

(37, 7, 'avg_size', 'Small'),
(38, 7, 'vocality', 'Quiet'),
(39, 7, 'shedding', 'Medium'),
(40, 7, 'temperament', 'Calm'),
(41, 7, 'energy', 'Active'),
(42, 7, 'sociability', 'Sociable'),
(43, 7, 'assertiveness', 'Assertive'),
(44, 7, 'independence', 'Moderate'),
(45, 7, 'climate_tolerance', 'Temperate'),
(46, 7, 'space_requirements', 'Medium'),
(47, 7, 'care_cost_level', 'Medium'),
(48, 7, 'hypoallergenic', 'TRUE');

-- ESSENTIAL
INSERT INTO EssentialPreference (pref_id) VALUES
(1), (4), (12),

(13), (17), (23),

(25), (29), (36),

(37), (40), (48);

-- PREFERRED
INSERT INTO PreferredPreference (pref_id) VALUES
(2), (3), (5), (6), (7), (8), (9), (10), (11),

(14), (15), (16), (18), (19), (20), (21), (22), (24),

(26), (27), (28), (30), (31), (32), (33), (34), (35),

(38), (39), (41), (42), (43), (44), (45), (46), (47);

-- FAVORITES
INSERT INTO Favorite (user_id, animal_id) VALUES
(1, 3), (1, 5), (1,1),
(2, 1), (2, 2), (2,6),
(3, 3), (3, 4),
(7, 6), (7, 9), (7,3);

-- FULFILL
INSERT INTO Fulfill (animal_id, pref_id) VALUES
-- Golden Retriever
(1, 4), (1, 5), (1, 6), (1, 9), (1, 11),
(1, 16), (1, 17), (1, 18), (1, 21), (1, 23),
(1, 28), (1, 29), (1, 30), (1, 33), (1, 35),
(1, 40), (1, 41), (1, 42), (1, 45), (1, 47),

-- German Shepherd
(2, 13), (2, 14), (2, 16), (2, 17), (2, 18), (2, 19), (2, 20), (2, 21), (2, 22), (2, 23),
(2, 41), (2, 42), (2, 43), (2, 44), (2, 45), (2, 46), (2, 47),

-- Sphynx
(3, 1), (3, 2), (3, 3), (3, 8), (3, 10), (3, 12),
(3, 25), (3, 26), (3, 27), (3, 29), (3, 32), (3, 34), (3, 35), (3, 36),
(3, 37), (3, 38), (3, 39), (3, 44), (3, 46), (3, 48),

-- Maine Coon
(4, 4), (4, 5), (4, 6), (4, 9), (4, 11),
(4, 16), (4, 17), (4, 18), (4, 21), (4, 23),
(4, 28), (4, 29), (4, 30), (4, 33), (4, 35),
(4, 40), (4, 41), (4, 42), (4, 45), (4, 47),

-- Budgerigar
(5, 1), (5, 3), (5, 5), (5, 10), (5, 16),
(5, 25), (5, 27), (5, 29), (5, 34), (5, 35),
(5, 37), (5, 39), (5, 41), (5, 46), (5, 47),

-- Labrador Retriever
(6, 13), (6, 16), (6, 17), (6, 18), (6, 19), (6, 20), (6, 21), (6, 22), (6, 23),
(6, 41), (6, 42), (6, 43), (6, 44), (6, 45), (6, 46), (6, 47),

-- Russian Blue
(7, 1), (7, 2), (7, 3), (7, 4), (7, 10), (7, 12),
(7, 25), (7, 26), (7, 27), (7, 29), (7, 32), (7, 34), (7, 35), (7, 36),
(7, 37), (7, 38), (7, 39), (7, 40), (7, 44), (7, 46), (7, 48),

-- British Shorthair
(8, 4), (8, 5), (8, 6), (8, 9), (8, 11),
(8, 16), (8, 17), (8, 18), (8, 21), (8, 23),
(8, 28), (8, 29), (8, 30), (8, 33), (8, 35),
(8, 40), (8, 41), (8, 42), (8, 45), (8, 47),

-- Cockatiel
(9, 1), (9, 3), (9, 5), (9, 6), (9, 10),
(9, 16), (9, 17), (9, 18), (9, 22),
(9, 25), (9, 27), (9, 29), (9, 30), (9, 33), (9, 34), (9, 35),
(9, 37), (9, 39), (9, 41), (9, 42), (9, 46), (9, 47),

-- Rottweiler
(10, 13), (10, 16), (10, 17), (10, 18), (10, 19), (10, 20), (10, 21), (10, 22), (10, 23),
(10, 28), (10, 29), (10, 30), (10, 33), (10, 35),
(10, 40), (10, 41), (10, 42), (10, 43), (10, 45), (10, 47);

-- SETS
INSERT INTO Sets (user_id, pref_id) VALUES
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6),
(1, 7), (1, 8), (1, 9), (1, 10), (1, 11), (1, 12),

(2, 13), (2, 14), (2, 15), (2, 16), (2, 17), (2, 18),
(2, 19), (2, 20), (2, 21), (2, 22), (2, 23), (2, 24),

(3, 25), (3, 26), (3, 27), (3, 28), (3, 29), (3, 30),
(3, 31), (3, 32), (3, 33), (3, 34), (3, 35), (3, 36),

(7, 37), (7, 38), (7, 39), (7, 40), (7, 41), (7, 42),
(7, 43), (7, 44), (7, 45), (7, 46), (7, 47), (7, 48);