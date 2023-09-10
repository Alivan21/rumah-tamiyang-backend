<?php

use App\Exceptions\DumpException;

/**
 * @param mixed $data
 * @return mixed
 * @throws DumpException
 */
function ddapi(mixed $data): mixed
{
    throw new DumpException($data);
}
