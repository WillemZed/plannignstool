<?php
include("datalayer.php");

createDatabase();

$gameData = readGames();

if(isset($_GET["submit"])) {
    $gameId = $_GET["spel"];

    
    $gameInfo = readGameInfo($gameId);

    $imagePath = "pictures/" . $gameInfo["image"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table table-striped">
        <tr>
            <th>
                <form action="" method="GET">
                    <select name="spel" id="name">
                    <?
                        foreach ($gameData as $gameData) {
                    ?>
                        <option value="<? echo $gameData["id"]; ?>"><? echo $gameData["name"]; ?></option>
                    <?
                        }
                    ?>
                    </select>
                    <input type="submit" name="submit" value="Select Game" >
                </form>
            </th>
        </tr>
        <tr>
            <th>
                <? echo $gameInfo["description"]; ?>
            </th>

            <th>
                <img src="<? echo $imagePath; ?>" alt="">
            </th>
        </tr>
    </table>
</body>
</html>