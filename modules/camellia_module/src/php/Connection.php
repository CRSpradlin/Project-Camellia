<?php
require __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class Connection {

  private $db_serverhostname = "";
  private $db_name = "";
  private $db_username = "";
  private $db_password = "";
  private $database;

  function __construct(){
    try{
      $_settings = Yaml::parse(file_get_contents(__DIR__ . '/../../config/install/camellia_module.settings.yml'));

      $this->db_serverhostname = $_settings['camellia_module']['db_server_dbhostname'];
      $this->db_name = $_settings['camellia_module']['db_server_dbname'];
      $this->db_username = $_settings['camellia_module']['db_server_dbuser'];
      $this->db_password = $_settings['camellia_module']['db_server_dbpassword'];

    } catch (ParseException $exp){
      throw new Exception($exp->getMessage());
    } finally {
      $this->database = new mysqli("$this->db_serverhostname", "$this->db_username", "$this->db_password", "$this->db_name");
    }
    if ($this->database->connect_error) {
      throw new Exception("Connection failed: " . $this->database->connect_error);
    }
  }

  public function query(string $sql_query){
    return $this->database->query($sql_query);
  }
}
