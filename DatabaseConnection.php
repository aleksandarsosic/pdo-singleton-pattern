<?php

    class DatabaseConnection {

        private static object $instance;

        private object $connection;

        // constructor property promotion used

        public function __construct(private array $configDB)

        {

            try {

                $dsn = "mysql:host={$configDB['host']};port={$configDB['port']};dbname={$configDB['dbname']};charset={$configDB['charset']}";

                $this->connection = new PDO($dsn, $configDB['username'], $configDB['password']);

                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Throws a PDOException in case of an error
                $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true); // If set to true PDO will always emulate prepared statements
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $exception) {

                echo "<pre>";
                var_dump($exception);
                echo "</pre>";

                die("Connection failed!" . $exception->getMessage());

            }

        }

        public static function getInstance($config) :self

        {

            if(! isset(self::$instance)) {

                self::$instance = new DatabaseConnection($config);

            }

            return self::$instance;

        }

        public function getConnection() : PDO

        {

            return $this->connection;

        }

        // Retrieving database connection status

        public function getConnectionStatus()

        {

            return $this->connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        }

        // Retrieving database connection attributes

        public function getConnectionAttributes()

        {

            $attributes = [

                "AUTOCOMMIT",
                "CASE",
                "CLIENT_VERSION",
                "CONNECTION_STATUS",
                "DRIVER_NAME",
                "ERRMODE",
                "ORACLE_NULLS",
                "PERSISTENT",
                "PREFETCH",
                "SERVER_INFO",
                "SERVER_VERSION",
                "TIMEOUT"

            ];

            foreach ($attributes as $attribute) {

                print_r("PDO::ATTR_{$attribute} => ");
                print_r($this->connection->getAttribute(constant("PDO::ATTR_{$attribute}")));
                print_r("<br>");
                
            }

        }

    }