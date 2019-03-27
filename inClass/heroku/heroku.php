$host = "p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbname = "cfai15pxn6shkfit";
$username = "jn47rn0gexk48slm";
$password = "x8spjv8kvcgveifb";

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$connUrl = getenv('JAWSDB_MARIA_URL');
$hasConnUrl = !empty($connUrl);

$connParts = null;
if ($hasConnUrl) {
    $connParts = parse_url($connUrl);
}

//var_dump($hasConnUrl);
$host = $hasConnUrl ? $connParts['host'] : getenv('IP');
$dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
$username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
$password = $hasConnUrl ? $connParts['pass'] : '';

return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);