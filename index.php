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
</body>

</html>