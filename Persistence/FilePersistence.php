<?php

require_once __DIR__ . '/PersistenceInterface.php';

class FilePersistence implements PersistenceInterface
{
    private $dir;

    public function __construct()
    {
        $this->dir = __DIR__ . '/data/';
    }

    public function set($id, $data)
    {
        if (is_object($data) || is_array($data)) {
            $data = serialize($data);
        }

        file_put_contents($this->dir . $id . '.dat', $data);
    }

    public function get($id)
    {
        if(!file_exists($this->dir . $id)) {
            throw new \Exception('Persistence ID is not valid');
        }

        $data = file_get_contents($this->dir . $id . '.dat');

        return unserialize($data);
    }
}
