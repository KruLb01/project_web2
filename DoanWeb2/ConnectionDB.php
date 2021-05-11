<?php
    class ConnectionDB{
        private $host;
        private $database_name;
        private $username;
        private $password;
        private $connection;
        public function __construct($filepath)
        {
            if(is_file($filepath))
            {
               include $filepath;
               $this->setupTheConnection();
            }
            else if($filepath===''){
               include 'infoConnection.php';
               $this->setupTheConnection();
            }
            else{
                echo 'Không phải file';
            }
        }
        private function setupTheConnection()
        {
            $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database_name);
            if(!$this->connection)
            {
                echo 'Không thể kết nối đến database';
            }
        }
        public function preparedSelect($sql)
        {
            if($this->connection)
            {
                $result = mysqli_query($this->connection,$sql);
                if($result)
                {
                    return $result;
                }
                else{
                    return null;
                }
            }
        }
        public function preparedExecuteDatabase($sql)
        {
            if($this->connection)
            {
                $result = mysqli_query($this->connection,$sql);
                if($result)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
            return false;
        }
        public function getConnection()
        {
            return $this->connection;
        }
        public function closeConnection()
        {
            mysqli_close($this->connection);
        }
   }