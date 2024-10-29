<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet & Eat</title>
</head>

<body>
    <h1>Welcome to the Greet & Eat!</h1>
    <form action="" method="POST">
        <label for="name" class="highlight name-label">Name:</label>
        <input type="text" id="name" name="name" required aria-label="Enter your name">

        <label class="highlight food-label">Favorite Food:</label>
        <div class="radio-group">
            <label>
                <input type="radio" id="pulao" name="food" value="Pulao" required>
                Pulao
            </label>
            <label>
                <input type="radio" id="paneer" name="food" value="Paneer" required>
                Paneer
            </label>
            <label>
                <input type="radio" id="pizza" name="food" value="Pizza" required>
                Pizza
            </label>
        </div>

        <button type="submit">Submit</button>
    </form>
    <?php
    $ip = $_SERVER['REMOTE_ADDR'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']));
        $food = htmlspecialchars(trim($_POST['food']));

        $hour = date('H');
        if ($hour >= 2 && $hour < 11) {
            $greeting = "Good Morning";
        } elseif ($hour >= 11 && $hour < 16) {
            $greeting = "Good Afternoon";
        } elseif ($hour >= 16 && $hour < 21) {
            $greeting = "Good Evening";
        } else {
            $greeting = "Good Night";
        }

        echo "<div class='greeting'><h2>$greeting, $name! Your favorite food is $food.</h2></div>";
    }

    
    ?>
</body>

</html>