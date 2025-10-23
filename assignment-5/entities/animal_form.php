<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="header">
        <div class="container header-inner">
            <div class="brand">
                <img src="../img/logo.png" alt="logo" width="28" height="28">
                <a href="../index.html" class="brand-title">MyPetGuide</a>
            </div>
        </div>
    </header>

    <div class="container" style="padding: 40px;">
        <h1 class="h1">Add Animal</h1>

        <form action="animal_feedback.php" method="POST">
            <div class="row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px">
                <div>
                    <label>Average Size:</label><br>
                    <select name="avg_size" required>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                    </select>
                </div>

                <div>
                    <label>Vocality:</label><br>
                    <select name="vocality" required>
                        <option>Quiet</option>
                        <option>Average</option>
                        <option>Loud</option>
                    </select>
                </div>

                <div>
                    <label>Shedding:</label><br>
                    <select name="shedding" required>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>

                <div>
                    <label>Temperament:</label><br>
                    <select name="temperament" required>
                        <option>Calm</option>
                        <option>Balanced</option>
                        <option>Playful</option>
                    </select>
                </div>

                <div>
                    <label>Energy:</label><br>
                    <select name="energy" required>
                        <option>Laid_back</option>
                        <option>Moderate</option>
                        <option>Active</option>
                    </select>
                </div>

                <div>
                    <label>Sociability:</label><br>
                    <select name="sociability" required>
                        <option>Reserved</option>
                        <option>Indifferent</option>
                        <option>Sociable</option>
                    </select>
                </div>

                <div>
                    <label>Assertiveness:</label><br>
                    <select name="assertiveness" required>
                        <option>Submissive</option>
                        <option selected>Balanced</option>
                        <option>Assertive</option>
                    </select>
                </div>

                <div>
                    <label>Independence:</label><br>
                    <select name="independence" required>
                        <option>Dependent</option>
                        <option>Moderate</option>
                        <option>Independent</option>
                    </select>
                </div>

                <div>
                    <label>Climate Tolerance:</label><br>
                    <select name="climate_tolerance" required>
                        <option>Cold</option>
                        <option>Temperate</option>
                        <option>Hot</option>
                        <option>Humid</option>
                        <option>Dry</option>
                        <option selected>Adaptable</option>
                    </select>
                </div>

                <div>
                    <label>Space Requirements:</label><br>
                    <select name="space_requirements" required>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                    </select>
                </div>

                <div>
                    <label>Care Cost Level:</label><br>
                    <select name="care_cost_level" required>
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>

                <div style="display:flex;align-items:center;gap:8px;margin-top:28px;">
                    <input type="checkbox" id="hypoallergenic" name="hypoallergenic" value="1">
                    <label for="hypoallergenic" style="margin:0;">Hypoallergenic</label>
                </div>
            </div>

            <br>
            <input type="submit" value="Add Animal">
        </form>

        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </div>
</body>

</html>