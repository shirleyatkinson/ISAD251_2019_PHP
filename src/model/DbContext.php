<?php

include_once 'Module.php';
include_once 'request.php';

class DbContext
{
    private $db_server = 'Proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser = 'ISAD251_SAtkinson';
    private $dbPassword = 'ISAD251_';
    private $dbDatabase = 'ISAD251_SAtkinson';

    private $dataSourceName;
    private $connection;


    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try {
            if ($this->connection === null) {
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }
    }

    public function Modules()
    {
        $sql = "SELECT * FROM `sh_modules`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $modules = [];

        if($resultSet)
        {
            foreach($resultSet as $row)
            {
                $module = new Module($row['Code'], $row['Title'], $row['ModuleID']);
                $modules[] = $module;
            }
        }
        return $modules;
    }

    public function Enter_Request($request)
    {
        $sql = "CALL EnterRequest(:Name, :Room, :Row, :Seat, :Problem, :ModuleID)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Name', $request->Name(), PDO::PARAM_STR);
        $statement->bindParam(':Room', $request->Room(), PDO::PARAM_STR);
        $statement->bindParam(':Row', $request->Row(), PDO::PARAM_INT);
        $statement->bindParam(':Seat', $request->Seat(), PDO::PARAM_INT);
        $statement->bindParam(':Problem', $request->Problem(), PDO::PARAM_STR);
        $statement->bindParam(':ModuleID', $request->ModuleId(), PDO::PARAM_INT);

        $return = $statement->execute();
        return $return;
    }


}
