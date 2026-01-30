<?php

declare(strict_types=1);

$configurator = require __DIR__ .'/vendor/sigwin/infra/resources/PHP/php-cs-fixer.php';

$header = <<<'EOF'
This file is part of the docker-php project.

(c) 2013 Geoffrey Bachelet <geoffrey.bachelet@gmail.com> and contributors
(c) 2019 Joël Wurtz
(c) 2026 sigwin.hr

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

return $configurator(__DIR__, $header);
