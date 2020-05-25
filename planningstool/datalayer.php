<?php 
function createDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "games";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}


function readGames(){
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM games");
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
}

function readGameInfo($gameId){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM games WHERE id=$gameId");
	$stmt->execute();
	$result=$stmt->fetch();
	$dbConn=null;
	return $result;
}

function readLocations(){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM locations");
	$stmt->execute();
	$result=$stmt->fetchAll();
	$dbConn=null;
	return $result;
}

function addLocations($locatieNaam){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("INSERT INTO locations (name) VALUES ('$locatieNaam')");
	$stmt->execute();
	$dbConn=null;
	return $result;
}

function deleteLocations($id){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("DELETE FROM locations WHERE id=$id");
	$stmt->execute();
	$dbConn=null;
	return $result;
}

function innerJoinTable(){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM characters LEFT JOIN locations ON characters.location = locations.id");
	$stmt->execute();
	$dbConn=null;
	return $result;
}

function updateLocation($Value, $id) {
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("UPDATE characters set location = $Value WHERE id=$id");
	$stmt->execute();
	$dbConn=null;
	return $result;
}


// Planningstool functions




