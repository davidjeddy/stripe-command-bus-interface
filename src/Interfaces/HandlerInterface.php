<?php

namespace davidjeddy\StripeCB\Interfaces;

/**
 * Interface HandlerInterface
 *
 * @author David J Eddy <me@davidjeddy.com>
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
