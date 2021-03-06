<?php

namespace cebe\openapi\spec;

use cebe\openapi\SpecBaseObject;

/**
 * A metadata object that allows for more fine-tuned XML model definitions.
 *
 * @link https://github.com/OAI/OpenAPI-Specification/blob/3.0.2/versions/3.0.2.md#xmlObject
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
class Xml extends SpecBaseObject
{
    /**
     * @return array array of attributes available in this object.
     */
    protected function attributes(): array
    {
        return [
            'name' => Type::STRING,
            'namespace' => Type::STRING,
            'prefix' => Type::STRING,
            'attribute' => Type::BOOLEAN,
            'wrapped' => Type::BOOLEAN,
        ];
    }

    /**
     * Perform validation on this object, check data against OpenAPI Specification rules.
     *
     * Call `addError()` in case of validation errors.
     */
    protected function performValidation()
    {
        // TODO: Implement performValidation() method.
    }
}
