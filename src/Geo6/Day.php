<?php

namespace Bpost\BpostApiClient\Geo6;

use Bpost\BpostApiClient\Exception\BpostLogicException\BpostInvalidDayException;
use SimpleXMLElement;

/**
 * Geo6 class
 *
 * @author    Tijs Verkoyen <php-bpost@verkoyen.eu>
 *
 * @version   3.0.0
 *
 * @copyright Copyright (c), Tijs Verkoyen. All rights reserved.
 * @license   BSD License
 */
class Day
{
    public const DAY_INDEX_MONDAY = 1;
    public const DAY_INDEX_TUESDAY = 2;
    public const DAY_INDEX_WEDNESDAY = 3;
    public const DAY_INDEX_THURSDAY = 4;
    public const DAY_INDEX_FRIDAY = 5;
    public const DAY_INDEX_SATURDAY = 6;
    public const DAY_INDEX_SUNDAY = 7;

    public const DAY_NAME_MONDAY = 'Monday';
    public const DAY_NAME_TUESDAY = 'Tuesday';
    public const DAY_NAME_WEDNESDAY = 'Wednesday';
    public const DAY_NAME_THURSDAY = 'Thursday';
    public const DAY_NAME_FRIDAY = 'Friday';
    public const DAY_NAME_SATURDAY = 'Saturday';
    public const DAY_NAME_SUNDAY = 'Sunday';

    private static $dayMap = array(
        self::DAY_NAME_MONDAY => self::DAY_INDEX_MONDAY,
        self::DAY_NAME_TUESDAY => self::DAY_INDEX_TUESDAY,
        self::DAY_NAME_WEDNESDAY => self::DAY_INDEX_WEDNESDAY,
        self::DAY_NAME_THURSDAY => self::DAY_INDEX_THURSDAY,
        self::DAY_NAME_FRIDAY => self::DAY_INDEX_FRIDAY,
        self::DAY_NAME_SATURDAY => self::DAY_INDEX_SATURDAY,
        self::DAY_NAME_SUNDAY => self::DAY_INDEX_SUNDAY,
    );

    /**
     * @var string
     */
    private $amOpen;

    /**
     * @var string
     */
    private $amClose;

    /**
     * @var string
     */
    private $pmOpen;

    /**
     * @var string
     */
    private $pmClose;

    /**
     * @var string
     */
    private $day;

    /**
     * @param string $amClose
     */
    public function setAmClose($amClose)
    {
        $this->amClose = $amClose;
    }

    /**
     * @return string
     */
    public function getAmClose()
    {
        return $this->amClose;
    }

    /**
     * @param string $amOpen
     */
    public function setAmOpen($amOpen)
    {
        $this->amOpen = $amOpen;
    }

    /**
     * @return string
     */
    public function getAmOpen()
    {
        return $this->amOpen;
    }

    /**
     * @param string $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Get the index for a day
     *
     * @return int
     *
     * @throws BpostInvalidDayException
     */
    public function getDayIndex()
    {
        $day = ucfirst(strtolower((string) $this->getDay()));

        if (isset(self::$dayMap[$day])) {
            return self::$dayMap[$day];
        }

        throw new BpostInvalidDayException($day, array_keys(self::$dayMap));
    }

    /**
     * @param string $pmClose
     */
    public function setPmClose($pmClose)
    {
        $this->pmClose = $pmClose;
    }

    /**
     * @return string
     */
    public function getPmClose()
    {
        return $this->pmClose;
    }

    /**
     * @param string $pmOpen
     */
    public function setPmOpen($pmOpen)
    {
        $this->pmOpen = $pmOpen;
    }

    /**
     * @return string
     */
    public function getPmOpen()
    {
        return $this->pmOpen;
    }

    /**
     * @param SimpleXMLElement $xml
     *
     * @return Day
     */
    public static function createFromXML(SimpleXMLElement $xml)
    {
        $day = new Day();
        $day->setDay($xml->getName());

        if (isset($xml->AMOpen) && $xml->AMOpen != '') {
            $day->setAmOpen((string) $xml->AMOpen);
        }
        if (isset($xml->AMClose) && $xml->AMClose != '') {
            $day->setAmClose((string) $xml->AMClose);
        }
        if (isset($xml->PMOpen) && $xml->PMOpen != '') {
            $day->setPmOpen((string) $xml->PMOpen);
        }
        if (isset($xml->PMClose) && $xml->PMClose != '') {
            $day->setPmClose((string) $xml->PMClose);
        }

        return $day;
    }
}
