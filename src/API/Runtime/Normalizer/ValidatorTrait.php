<?php

declare(strict_types=1);

/*
 * This file is part of the docker-php project.
 *
 * (c) 2013 Geoffrey Bachelet <geoffrey.bachelet@gmail.com> and contributors
 * (c) 2019 Joël Wurtz
 * (c) 2026 sigwin.hr
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Docker\API\Runtime\Normalizer;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validation;

trait ValidatorTrait
{
    protected function validate(array $data, Constraint $constraint): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($data, $constraint);
        if ($violations->count() > 0) {
            throw new ValidationException($violations);
        }
    }
}
