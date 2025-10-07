-- USERS
INSERT INTO User (user_id) VALUES (1), (2), (3), (4), (5);

INSERT INTO Registered (user_id, first_name, last_name, email, user_password, join_date) VALUES
(1, 'Alice', 'Smith', 'alice@example.com', 'pass123', '2025-01-10'),
(2, 'Bob', 'Johnson', 'bob@example.com', 'pass456', '2025-02-15'),
(3, 'Clara', 'Martinez', 'clara@example.com', 'pass789', '2025-03-20');

INSERT INTO Guest (user_id) VALUES
(4),
(5);

-- ANIMALS
INSERT INTO Animal (
    animal_id, avg_size, temperament, energy, vocality, shedding,
    sociability, climate_tolerance, space_requirements,
    assertiveness, independence, care_cost_level, hypoallergenic
) VALUES
(1, 'Medium', 'Calm', 'Moderate', 'Average', 'Medium', 'Sociable', 'Temperate', 'Medium', 'Balanced', 'Moderate', 'Medium', FALSE),
(2, 'Large', 'Playful', 'Active', 'Loud', 'High', 'Sociable', 'Cold', 'Large', 'Assertive', 'Independent', 'High', FALSE),
(3, 'Small', 'Balanced', 'Laid_back', 'Quiet', 'Low', 'Reserved', 'Adaptable', 'Small', 'Submissive', 'Dependent', 'Low', TRUE),
(4, 'Medium', 'Calm', 'Moderate', 'Average', 'Medium', 'Sociable', 'Temperate', 'Medium', 'Balanced', 'Moderate', 'Medium', FALSE),
(5, 'Small', 'Playful', 'Active', 'Loud', 'Low', 'Indifferent', 'Hot', 'Small', 'Assertive', 'Independent', 'Medium', FALSE);

-- DOGS
INSERT INTO Dog (animal_id, breed_name, trainability, grooming_need, image_url) VALUES
(1, 'Golden Retriever', 'Easy', 'Moderate', 'https://example.com/dog1.jpg'),
(2, 'German Shepherd', 'Challenging', 'High', 'https://example.com/dog2.jpg');

-- CATS
INSERT INTO Cat (animal_id, coat_length, grooming_need, breed_name, image_url) VALUES
(3, 'Short', 'Low', 'Sphynx', 'https://example.com/cat1.jpg'),
(4, 'Long', 'High', 'Maine Coon', 'https://example.com/cat2.jpg');

--  BIRDS
INSERT INTO Bird (animal_id, wing_span, image_url, talking_ability, breed_name) VALUES
(5, 'Small', 'https://example.com/bird1.jpg', TRUE, 'Budgerigar');

-- PREFERENCES
INSERT INTO Preference (pref_id, user_id, attribute, desired_value) VALUES
(1, 1, 'avg_size', 'Small'),
(2, 1, 'temperament', 'Calm'),
(3, 2, 'energy', 'Active'),
(4, 2, 'shedding', 'Low'),
(5, 3, 'hypoallergenic', 'TRUE'),
(6, 3, 'space_requirements', 'Small');

-- Essential vs Preferred
INSERT INTO EssentialPreference (pref_id) VALUES (1), (3), (5);
INSERT INTO PreferredPreference (pref_id) VALUES (2), (4), (6);

-- MAPPING TABLES

-- Favorites: Registered users marking favorite animals
INSERT INTO Favorite (user_id, animal_id) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 5),
(3, 4);

-- Fulfill: Which animals fulfill which preferences
INSERT INTO Fulfill (animal_id, pref_id) VALUES
(1, 2),
(1, 1),
(2, 3),
(3, 5),
(5, 4),
(4, 6);

-- Sets: which preferences were set by which user
INSERT INTO Sets (user_id, pref_id) VALUES
(1, 1), (1, 2),
(2, 3), (2, 4),
(3, 5), (3, 6);
