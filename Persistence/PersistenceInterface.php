<?php

interface PersistenceInterface
{
    public function set($id, $data);

    public function get($id);
}
