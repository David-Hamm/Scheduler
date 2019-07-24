<?php


class Database
{
    private $host = DB_HOST;
    private $database = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $connection = null;
    public $result;

    /**
     * Database constructor.
     * @param null $host
     * @param null $database
     * @param null $username
     * @param null $password
     *
     * Optional parameters exist in the scenario that a non-primary database needs to be accessed. Functionality outside of MySQL will
     * be added in a future build.
     *
     * Add database information to config files if another database is needed.
     *
     * todo: Add connections strings for other PDO database types
     */
    public function __construct($host = null, $database = null, $username = null, $password = null)
    {
        if (!is_null($host) && !is_null($database) && !is_null($username) && !is_null($password)) {
            $this->host = $host;
            $this->database = $database;
            $this->username = $username;
            $this->password = $password;
        }
    }

    private function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    private function close()
    {
        $this->connection = null;
    }

    /**
     * Verifies the connection is active before executing any queries
     */
    private function connectionCheck()
    {
        if ($this->connection->connect_error) {
            error_log('Connection Error: ' . $this->connection->connect_error);
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     *
     * returns the simple associative array of fetchAll
     */
    public function select($sql, $params = [])
    {
        $this->connect();
        if ($this->connectionCheck()) {
            try {
                $stmt = $this->connection->prepare($sql);

                $stmt->execute($params);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage());
            }
            $this->close();
            if (sizeof($result) > 0) {
                return $result;
            } else {
                return [];
            }
        } else {
            error_log('Connection Failure');
        }
    }

    /**
     * @param $sql
     * @param $values array
     * @return boolean
     */
    public function update($sql, $values) {
        $this->connect();
        if ($this->connectionCheck()) {
            try {
                $stmt = $this->connection->prepare($sql);

                $stmt->execute($values);
                $result = $stmt->rowCount();
            } catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage());
            }
            $this->close();
            if (sizeof($result) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            error_log('Connection Failure');
        }
    }

    /**
     * @param $sql
     * @param $values array
     * @return boolean
     *
     * Intentionally limiting the capability of the delete function to only allow the targeting of specific IDs. This should mitigate the potential for error.
     */
    public function delete($sql, $id = null) {
        if (!is_null($id) && is_numeric($id)) {
            $this->connect();
            if ($this->connectionCheck()) {
                try {
                    $stmt = $this->connection->prepare($sql);

                    $stmt->execute([$id]);
                    $result = $stmt->rowCount();
                } catch (PDOException $e) {
                    error_log('Error: ' . $e->getMessage());
                }
                $this->close();
                if (sizeof($result) > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                error_log('Connection Failure');
            }
        } else {
            error_log('No ID was specified on the delete statement... no transaction took place.');
            return false;
        }
    }

    public function insert($table, $assoc)
    {
        $columns = array_keys($assoc);
        $values = array_values($assoc);

        $this->connect();
        if ($this->connectionCheck()) {

            $sql = "INSERT INTO $table (";
            for($i = 0; $i < sizeof($columns); $i++) {
                if ($i !== sizeof($columns) - 1) {
                    $sql .= '`' . $columns[$i] . '`,';
                } else {
                    $sql .= '`' . $columns[$i] . '`) VALUES(';
                }
            }
            for($i = 0; $i < sizeof($values); $i++) {
                if ($i !== sizeof($values) - 1) {
                    $sql .= '?,';
                } else {
                    $sql .=  '?);';
                }
            }

            try {
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->rowCount();
            } catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage());
            }
            $this->close();
            if (sizeof($result) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            error_log('Connection Failure');
        }


    }


}