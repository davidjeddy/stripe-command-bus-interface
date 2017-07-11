<?php

namespace dje\StripeCB\bus\interfaces;

/**
 * Interface Handler
 *
 * @author David J Eddy <me@davidjeddy.com>
 */
interface Handler
{
    public function handle($command);
}