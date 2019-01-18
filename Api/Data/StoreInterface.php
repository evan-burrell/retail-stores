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

    public function getStoreId();

    public function setStoreId($storeId);

    public function getName();

    public function setName($name);

    public function getAddressLine1();

    public function setAddressLine1($addressLine_1);

    public function getAddressLine2();

    public function setAddressLine2($addressLine_2);

    public function getPostcode();

    public function setPostcode($postcode);

    public function getLatitude();

    public function setLatitude($latitude);

    public function getLongitude();

    public function setLongitude($longitude);

    public function getOpening();

    public function setOpening($opening);

    public function getClosing();

    public function setClosing($closing);
}
