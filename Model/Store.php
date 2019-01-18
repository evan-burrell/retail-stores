<?php

namespace Ampersand\Stores\Model;

use Ampersand\Stores\Api\Data\StoreInterface;
use Magento\Framework\Model\AbstractModel;

class Store extends AbstractModel implements StoreInterface
{
    protected function _construct()
    {
        $this->_init('Ampersand\Stores\Model\ResourceModel\Store');
    }

    /**
     * @return int
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @param $storeId
     * @return StoreInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param $name
     * @return StoreInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->getData(self::ADDRESS_LINE_1);
    }

    /**
     * @param $addressLine_1
     * @return StoreInterface
     */
    public function setAddressLine1($addressLine_1)
    {
        return $this->setData(self::ADDRESS_LINE_1, $addressLine_1);
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->getData(self::ADDRESS_LINE_2);
    }

    /**
     * @param $addressLine_2
     * @return StoreInterface
     */
    public function setAddressLine2($addressLine_2)
    {
        return $this->setData(self::ADDRESS_LINE_2, $addressLine_2);
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->getData(self::POSTCODE);
    }

    /**
     * @param $postcode
     * @return StoreInterface
     */
    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }

    /**
     * @param $latitude
     * @return StoreInterface
     */
    public function setLatitude($latitude)
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * @param $longitude
     * @return StoreInterface
     */
    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * @return \DateTime
     */
    public function getOpening()
    {
        return $this->getData(self::OPENING);
    }

    /**
     * @param $opening
     * @return StoreInterface
     */
    public function setOpening($opening)
    {
        return $this->setData(self::OPENING, $opening);
    }

    /**
     * @return \DateTime
     */
    public function getClosing()
    {
        return $this->getData(self::CLOSING);
    }

    /**
     * @param $closing
     * @return StoreInterface
     */
    public function setClosing($closing)
    {
        return $this->setData(self::CLOSING, $closing);
    }
}
