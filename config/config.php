<?php
    class database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'POS_SYSTEM';

        private $conn = NULL;
        private $result = NULL;

        //CONNECT TO DATABASE
        public function connect($sql) {
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn) {
                echo "Connection failed";
                exit();
            }
            else {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }
        // EXECUTE QUESTION COMMAND
        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }
        // METHOD TO GET DATA 
        public function getData() {
            if($this->result) {
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }
        //METHOD TO GET ALL DATA
        public function getAllData {
            if($this->getData()) {
                while($tmpdata = $this->getData()) {
                    $data[] = $tmpdata;
                }
            }
            else {
                $data = 0;
            }
            return $data;
        }
    }
?>