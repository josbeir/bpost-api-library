<?php

namespace Bpost\BpostApiClient\Common\BasicAttribute;

use Bpost\BpostApiClient\Common\BasicAttribute;
use Bpost\BpostApiClient\Exception\BpostLogicException\BpostInvalidValueException;

class Language extends BasicAttribute
{
    public const LANGUAGE_EN = 'EN';
    public const LANGUAGE_FR = 'FR';
    public const LANGUAGE_NL = 'NL';

    /**
     * @throws BpostInvalidValueException
     */
    public function validate()
    {
        $this->validateChoice(array(
            self::LANGUAGE_EN,
            self::LANGUAGE_FR,
            self::LANGUAGE_NL,
        ));
    }

    /**
     * @return string
     */
    protected function getDefaultKey()
    {
        return 'language';
    }
}
