<?php

namespace Crosspay;

interface CustomerInterface
{
    public function create($params = null, $options = null);

    public function update($id, $params = null, $options = null);

    public function delete($params = null, $options = null);

    public function retrieve($id, $options = null);

    public function all($params = null, $options = null);
}
