<?php 
    class Connect{
        public $server;
        public $dbName;
        public $username;
        public $password;

        public function __construct(){
            $this->server ="l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->username ="sclzymqq6n0zhxxl";
            $this->password ="b26ud1zzn627ffy8";
            $this->dbName ="ktx7mpe3l3ftq8ev";
        }

        //Option 1: mySQL
        function connectToMySQL():mysqli{
            $conn = new mysqli($this->server,
            $this->username, $this->password, $this->dbName);

            if($conn->connect_error){
                die("Failed ".$conn->connect_error);
            } else{
                //echo "Connect!";
            }
            return $conn;
        }

        //Option 2: PDO
        function connectToPDO():PDO{
            try{
                $conn = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->username,$this->password);
                //echo "Connect! PDO";
            } catch(PDOException $e){
                die("Failed ".$e);
            }
            return $conn;
        }
    }
    // $c = new Connect();
    // $c->connectToPDO();
    // $c->connectToMySQL();
?>