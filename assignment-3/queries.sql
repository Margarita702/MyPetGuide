-- Deniz

-- Count how many animals belong to each temperament type
SELECT temperament, COUNT(*) AS num_animals
FROM Animal
GROUP BY temperament
ORDER BY num_animals DESC;

-- For each registered user show their first_name and their favorite animal IDs
SELECT r.first_name, f.animal_id
FROM Registered r
JOIN Favorite f ON r.user_id = f.user_id;

-- Show users who have set more than one preference
SELECT user_id, COUNT(pref_id) AS total_preferences
FROM Sets
GROUP BY user_id
HAVING COUNT(pref_id) > 1;
