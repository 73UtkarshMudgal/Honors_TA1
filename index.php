<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet & Eat</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #121212;
        color: #e0e0e0;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        color: #bb86fc;
    }

    form {
        background-color: #1e1e1e;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        width: 300px;
        text-align: left;
    }

    label {
        margin: 10px 0;
        display: flex;
        align-items: center;
        color: #e0e0e0;
    }

    .highlight {
        font-weight: bold;
    }

    .name-label {
        color: #ffcc00;
    }

    .food-label {
        color: #ff5733;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    input[type="text"] {
        border-radius: 4px;
        padding: 10px;
        background-color: #303030;
        color: #e0e0e0;
        border: 1px solid #444;
        margin-bottom: 15px;
        width: 100%;
        box-sizing: border-box;
    }

    .radio-group {
        margin-bottom: 15px;
    }

    button {
        background-color: #6200ea;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    button:hover {
        background-color: #3700b3;
    }

    .greeting {
        margin-top: 20px;
        padding: 15px;
        background-color: #1e1e1e;
        border-radius: 5px;
        border: 1px solid #bb86fc;
        width: 300px;
        text-align: center;
    }
</style>

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
    $timezone = getTimezoneFromIP($ip);
    date_default_timezone_set($timezone);

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

    function getTimezoneFromIP($ip)
    {
        $json = @file_get_contents("http://ipinfo.io/{$ip}/json");
        if ($json === false) {
            return 'Asia/Kolkata'; // Default timezone if API call fails
        }
        $details = json_decode($json);
        return $details->timezone ?? 'Asia/Kolkata'; // Default timezone if not found
    }


    ?>
</body>

</html>