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


/*shows all hypoallergenic animals 
takes id, breed names of dogs, cats, birds, and hypoallergenic status from the 
Animal table and joins them with the Dog, Cat, and Bird tables
to get the breed names and then filters the results to only include hypoallergenic animals.*/

SELECT 
    a.animal_id,
    d.breed_name AS dog_breed,
    c.breed_name AS cat_breed,
    b.breed_name AS bird_breed,
    a.hypoallergenic
FROM Animal a
LEFT JOIN Dog d ON a.animal_id = d.animal_id
LEFT JOIN Cat c ON a.animal_id = c.animal_id
LEFT JOIN Bird b ON a.animal_id = b.animal_id
WHERE a.hypoallergenic = TRUE;

/*shows all animals that fulfill at least two essential preferences
takes id from the Animal table and joins it with the Fulfill table
to count how many essential preferences each animal fulfills and then groups 
the results by animal id and filters the results to only include animals that 
fulfill at least two essential preferences.
*/
SELECT 
    a.animal_id,
    COUNT(f.pref_id) AS total_fulfilled
FROM Animal a
JOIN Fulfill f ON a.animal_id = f.animal_id
GROUP BY a.animal_id
HAVING COUNT(f.pref_id) >= 2;

/*shows all registered users who have not put any animals in their favorites list
takes the first and last name of users from the Registered tableand joins them 
to the Favorite table to find users without any favorites by using Null check.
*/
SELECT 
    r.first_name, 
    r.last_name
FROM Registered r
LEFT JOIN Favorite f ON r.user_id = f.user_id
WHERE f.animal_id IS NULL;


-- Top 3 most favorited animals
SELECT 
    COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,   -- returns first non-Null argument
    COUNT(f.animal_id) AS total_favorites
FROM Favorite f
JOIN Animal a ON f.animal_id = a.animal_id   -- join fav to animal table
LEFT JOIN Dog d ON a.animal_id = d.animal_id   -- include all animals, if breeds don't match then breed_name=NULL (COALESCE takes care of that)
LEFT JOIN Cat c ON a.animal_id = c.animal_id
LEFT JOIN Bird b ON a.animal_id = b.animal_id
GROUP BY breed_name   -- group all rows with same breed name -> COUNT() gives total times that breed's been favorited (per group)
ORDER BY total_favorites DESC   -- order by most favorited->least and only show top 3
LIMIT 3;
-- put plainly: take all favorites, find which animal breed they are, count how many times they're favorited, sort from most to least popular and show only top three

-- Most selected desired_value for each attribute
SELECT p1.attribute, p1.desired_value
FROM Preference p1
GROUP BY p1.attribute, p1.desired_value   -- group same combinations of attribute=desired_value
HAVING COUNT(*) = (   -- HAVING filters groups -> keep only those whose count equals max count
    SELECT MAX(cnt)
    FROM (
        SELECT COUNT(*) AS cnt   -- count the times each desired_value appears
        FROM Preference p2   -- different name so they can check data independently
        WHERE p2.attribute = p1.attribute   -- check same attributes only
        GROUP BY p2.desired_value
    ) AS counts   -- derived table of counts - check MAX safely
)
ORDER BY p1.attribute;   -- order alphabetically
-- put plainly: count all desired_values with p1, compare count to the max count with p2, keep the desired_value when the count matches

-- Top most expensive animals
SELECT 
    COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
    a.care_cost_level
FROM Animal a
LEFT JOIN Dog d ON a.animal_id = d.animal_id
LEFT JOIN Cat c ON a.animal_id = c.animal_id
LEFT JOIN Bird b ON a.animal_id = b.animal_id   -- combines all tables, when breed_name doesn't match =NULL (COALESCE clutch)
WHERE a.care_cost_level = 'High'   -- filters animals that have "High" care_cost_level
-- put plainly: take all animals, find which breed they are, show all breeds that have a high cost