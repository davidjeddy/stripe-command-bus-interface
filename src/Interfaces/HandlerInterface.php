<?php

namespace davidjeddy\StripeCB\interfaces;

/**
 * Interface HandlerInterface
 *
 * @author Davidj J Eddy <me@davidjeddy.com>
 *
 */
interface HandlerInterface
{
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
}
