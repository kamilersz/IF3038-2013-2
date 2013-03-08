<?php
session_start();

function getUserID() {
	return (isset($_SESSION["user_id"])?$_SESSION["user_id"]:0);
}

function query($statement,$cond) {
	$conn = Db::handler();
	$stmt = $conn->prepare($statement);
	$stmt->execute($cond);
	return $stmt->fetch();
}

class Db
{
	private static $db;
	
	public static function handler()
	{
		if (!self::$db)
		{
			try {
				self::$db = new PDO('mysql:host=localhost;dbname=progin_405_13510001', 'progin', 'progin');
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				die('Connection error: ' . $e->getMessage());
			}
		}
		return self::$db;
	}
}

?>