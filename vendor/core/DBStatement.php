<?php

namespace vendor\core;

use IteratorAggregate;

class DBStatement implements IteratorAggregate
{
    protected $PDOS;
    protected $DB;

    public function __construct($DB, $PDOS)
    {
        $this->DB = $DB;
        $this->PDOS = $PDOS;
    }

    public function __call($func, $args)
    {
        return call_user_func_array(array(&$this->PDOS, $func), $args);
    }

    public function bindColumn($column, &$param, $type = NULL)
    {
        if ($type === NULL)
            $this->PDOS->bindColumn($column, $param);
        else
            $this->PDOS->bindColumn($column, $param, $type);
    }

    public function bindParam($column, &$param, $type = NULL)
    {
        if ($type === NULL)
            $this->PDOS->bindParam($column, $param);
        else
            $this->PDOS->bindParam($column, $param, $type);
    }

    public function execute()
    {
        $this->DB->numExecutes++;
        $args = func_get_args();
        return call_user_func_array(array(&$this->PDOS, 'execute'), $args);
    }

    public function __get($property)
    {
        return $this->PDOS->$property;
    }

    public function getIterator()
    {
        return $this->PDOS;
    }
}
