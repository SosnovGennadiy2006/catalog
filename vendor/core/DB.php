<?php

namespace vendor\core;

use PDO;


class DB
{
    protected $PDO;
    public $numExecutes;
    public $numStatements;

    public function __construct($dsn, $user = NULL, $pass = NULL, $driver_options = NULL)
    {
        $this->PDO = new PDO($dsn, $user, $pass, $driver_options);
        $this->numExecutes = 0;
        $this->numStatements = 0;
    }

    public function __call($func, $args)
    {
        return call_user_func_array([&$this->PDO, $func], $args);
    }

    public function prepare()
    {
        $this->numStatements++;

        $args = func_get_args();
        $PDOS = call_user_func_array(array(&$this->PDO, 'prepare'), $args);

        return new DBStatement($this, $PDOS);
    }

    public function query()
    {
        $this->numExecutes++;
        $this->numStatements++;

        $args = func_get_args();
        $PDOS = call_user_func_array(array(&$this->PDO, 'query'), $args);

        return new DBStatement($this, $PDOS);
    }

    public function exec()
    {
        $this->numExecutes++;

        $args = func_get_args();
        return call_user_func_array(array(&$this->PDO, 'exec'), $args);
    }

    public function instance()
    {
        return $this->PDO;
    }
}
