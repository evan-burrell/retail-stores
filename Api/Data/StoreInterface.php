<?php

namespace Ampersand\Stores\Api\Data;

interface StoreInterface
{
    const STORE_ID = 'store_id';
    const NAME = 'name';
    const ADDRESS_LINE_1 = 'address_line_1';
    const ADDRESS_LINE_2 = 'address_line_2';
    const POSTCODE = 'postcode';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';
    const OPENING = 'opening';
    const CLOSING = 'closing';

    /**
     * Get store_id.
     *
     * @return int
     */
    public function getStoreId();

    /**
     * Set store_id.
     *
     * @param $storeId
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setStoreId($storeId);

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set name.
     *
     * @param $name
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setName($name);

    /**
     * Get address_line_1.
     *
     * @return string
     */
    public function getAddressLine1();

    /**
     * Set address_line_1.
     *
     * @param $addressLine_1
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setAddressLine1($addressLine_1);

    /**
     * Get address_line_2.
     *
     * @return string
     */
    public function getAddressLine2();

    /**
     * Set address_line_2.
     *
     * @param $addressLine_2
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setAddressLine2($addressLine_2);

    /**
     * Get postcode.
     *
     * @return string
     */
    public function getPostcode();

    /**
     * Set postcode.
     *
     * @param $postcode
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setPostcode($postcode);

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLatitude();

    /**
     * Set latitude.
     *
     * @param $latitude
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setLatitude($latitude);

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude();

    /**
     * Set longitude.
     *
     * @param $longitude
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setLongitude($longitude);

    /**
     * Get opening.
     *
     * @return \DateTime
     */
    public function getOpening();

    /**
     * Set opening.
     *
     * @param $opening
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setOpening($opening);

    /**
     * Get closing.
     *
     * @return \DateTime
     */
    public function getClosing();

    /**
     * Set closing.
     *
     * @param $closing
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function setClosing($closing);
}
