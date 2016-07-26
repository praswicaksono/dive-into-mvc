<?php

interface PersistanceInterface
{
    public function set($id, $data);

    public function get($id);
}
