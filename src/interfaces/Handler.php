<?php

namespace davidjeddy\StripeCB\interfaces;

/**
 * Interface Handler
 *
 * @author Davidj J Eddy <me@davidjeddy.com>
 *
 */
interface Handler
{
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
}
