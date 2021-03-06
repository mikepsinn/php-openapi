<?php

namespace cebe\openapi\spec;

use cebe\openapi\SpecBaseObject;

/**
 * The object provides metadata about the API.
 *
 * The metadata MAY be used by the clients if needed, and MAY be presented in editing or documentation generation tools for convenience.
 *
 * @link https://github.com/OAI/OpenAPI-Specification/blob/3.0.2/versions/3.0.2.md#infoObject
 *
 * @property-read string $title
 * @property-read string $description
 * @property-read string $termsOfService
 * @property-read Contact|null $contact
 * @property-read License|null $license
 * @property-read string $version
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
class Info extends SpecBaseObject
{
    /**
     * @return array array of attributes available in this object.
     */
    protected function attributes(): array
    {
        return [
            'title' => Type::STRING,
            'description' => Type::STRING,
            'termsOfService' => Type::STRING,
            'contact' => Contact::class,
            'license' => License::class,
            'version' => Type::STRING,
        ];
    }

    /**
     * Perform validation on this object, check data against OpenAPI Specification rules.
     *
     * Call `addError()` in case of validation errors.
     */
    protected function performValidation()
    {
        $this->requireProperties(['title', 'version']);
    }
}
