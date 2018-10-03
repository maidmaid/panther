<?php

/*
 * This file is part of the Panther project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\Panther;

/**
 * @author Dany Maillard <danymaillard93b@gmail.com>
 *
 * @internal
 */
trait ServerTrait
{
    private function keepServerOnTeardown(): void
    {
        PantherTestCase::$stopServerOnTeardown = false;
    }

    private function stopWebServer(): void
    {
        PantherTestCase::stopWebServer();
    }

    private function pause($message): void
    {
        if (PantherTestCase::isWebServerStarted()
            && \in_array('--debug', $_SERVER['argv'])
            && getenv('PANTHER_NO_HEADLESS')
        ) {
            echo "$message\n\nPress enter to continue...";
            fgets(STDIN);
        }
    }
}
