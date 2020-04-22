<?php
/**
 * Description of Connection
 */
class Connection {
 
 /** Instance */
 private  static $_singleton = null;
 
 // DB Settings
 private $db;
 private $dbHost;
 private $dbName;
 private $dbUserName;
 private $dbPassword;
 private $dbPort = "3357";
 
 /**
  *ã€€DB Instance
  */
 public static function getInstance() {
  if(self::$_singleton == null) {
   self::$_singleton = new Connection();
  }
  return self::$_singleton;
 }

 
 private function __construct(){
  
 }
 
  
 public function createConnection($host, $dbname, $username, $password, $port = '3357')
 {
  $this->dbHost = $host;
  $this->dbName = $dbname;
  $this->dbUserName = $username;
  $this->dbPassword = $password;
  
  try
        {
            $this->db = new PDO('mysql:host='.$this->dbHost.';port='.$this->dbPort.';dbname='.$this->dbName.'', $this->dbUserName, $this->dbPassword);   
   $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   $sql = "SELECT host from user LIMIT 1";
   $result = $this->db->query($sql);
   foreach ($result as $row) {
    echo "SUCCESSFUL";
    break;
   }
   
   $this->db = null; // close the database connection
     
   
        }
        catch (PDOException $e)
        {
            throw new Exception("Connection to database  failed. (".$e->getMessage().")");
   die();
        }
    
 }

}

/**
 * Initial Database Connection
 *DbManager::getInstance()->dbConnection($DBi, $db1, $DBu, $DBp)
* @param $DBi  Database server IP
* @param $db1  Database name
* @param $DBu  user name
* @param $DBp  user passwoard
*/

// DEV 
$DBi   = '192.168.43.155';
$db1   = 'mysql';
$DBu   = 'root';
$DBp   = 'root';


// Initial DB Connection
Connection::getInstance()->createConnection($DBi, $db1, $DBu, $DBp);

?>