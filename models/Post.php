<?php
    class Post {
        //Database info
        private $conn;
        private $table = 'clients';

        //Post Properties
        public $idNumber;
        public $name;
        public $surname;
        public $contactPrimary;
        public $contactSecondary;
        public $emailAddress;
        public $gender;
        public $language;
        public $dead;
        public $organisation;

        //Constructor with Database
        public function __construct($db) {
            $this->conn = $db;
        }

        // insert Posts
        public function insert() {
            //Create Query
            $query = 'INSERT INTO ' . $this->table . '
            SET
                idNumber = :idNumber,
                name = :name,
                surname = :surname,
                contactPrimary = :contactPrimary,
                contactSecondary = :contactSecondary,
                emailAddress = :emailAddress,
                gender = :gender,
                language = :language,
                dead = :dead,
                organisation = :organisation';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->idNumber = htmlspecialchars(strip_tags($this->idNumber));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->surname = htmlspecialchars(strip_tags($this->surname));
            $this->contactPrimary = htmlspecialchars(strip_tags($this->contactPrimary));
            $this->contactSecondary = htmlspecialchars(strip_tags($this->contactSecondary));
            $this->emailAddress = htmlspecialchars(strip_tags($this->emailAddress));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->language = htmlspecialchars(strip_tags($this->language));
            $this->dead = htmlspecialchars(strip_tags($this->dead));
            $this->organisation = htmlspecialchars(strip_tags($this->organisation));

            //Bind Parameters
            $stmt->bindParam(':idNumber', $this->idNumber);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':surname', $this->surname);
            $stmt->bindParam(':contactPrimary', $this->contactPrimary);
            $stmt->bindParam(':contactSecondary', $this->contactSecondary);
            $stmt->bindParam(':emailAddress', $this->emailAddress);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':language', $this->language);
            $stmt->bindParam(':dead', $this->dead);
            $stmt->bindParam(':organisation', $this->organisation);

            //Execute
            if($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // get Posts
        public function read() {
            //Create Query
            $query = 'SELECT 
                id,
                idNumber, 
                name, 
                surname, 
                contactPrimary, 
                contactSecondary, 
                emailAddress, 
                gender, 
                language, 
                dead, 
                organisation,
                creationDate
            FROM
                '.$this->table;

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Execute
            $stmt->execute();

            return $stmt;
        }
    }