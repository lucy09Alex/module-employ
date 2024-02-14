<?php
namespace Lucy09Alex\Employ\Model;

/**
 * Employ Model represents an employee entity.
 *
 * @package Lucy09Alex\Employ\Model
 */
class Employ extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * Cache tag for identifying this model's cache entries.
     */
    const CACHE_TAG = 'lucy09Alex_employ_post';

    /**
     * Cache tag for identifying this model's cache entries.
     *
     * @var string
     */
    protected $_cacheTag = 'lucy09Alex_employ_post';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'lucy09Alex_employ_post';

    /**
     * Initialize the model and set its resource model.
     */
    protected function _construct()
    {
        $this->_init('Lucy09Alex\Employ\Model\ResourceModel\Employ');
    }

    /**
     * Retrieve model cache tag.
     *
     * @return string
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get default values for the model.
     *
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    /**
     * Getter method for Employee ID.
     *
     * @return int|null
     */
    public function getEmpId()
    {
        return $this->_getData('emp_id');
    }

    /**
     * Setter method for Employee ID.
     *
     * @param int $empId
     * @return $this
     */
    public function setEmpId($empId)
    {
        return $this->setData('emp_id', $empId);
    }

    /**
     * Getter method for Employee Name.
     *
     * @return string|null
     */
    public function getEmpName()
    {
        return $this->_getData('emp_name');
    }

    /**
     * Setter method for Employee Name.
     *
     * @param string $empName
     * @return $this
     */
    public function setEmpName($empName)
    {
        return $this->setData('emp_name', $empName);
    }

    /**
     * Getter method for Employee Position.
     *
     * @return string|null
     */
    public function getEmpPosition()
    {
        return $this->_getData('emp_position');
    }

    /**
     * Setter method for Employee Position.
     *
     * @param string $empPosition
     * @return $this
     */
    public function setEmpPosition($empPosition)
    {
        return $this->setData('emp_position', $empPosition);
    }

    /**
     * Getter method for Employee Email.
     *
     * @return string|null
     */
    public function getEmpEmail()
    {
        return $this->_getData('emp_email');
    }

    /**
     * Setter method for Employee Email.
     *
     * @param string $empEmail
     * @return $this
     */
    public function setEmpEmail($empEmail)
    {
        return $this->setData('emp_email', $empEmail);
    }

    /**
     * Getter method for Employee Phone.
     *
     * @return string|null
     */
    public function getEmpPhone()
    {
        return $this->_getData('emp_phone');
    }

    /**
     * Setter method for Employee Phone.
     *
     * @param string $empPhone
     * @return $this
     */
    public function setEmpPhone($empPhone)
    {
        return $this->setData('emp_phone', $empPhone);
    }

    /**
     * Getter method for Employee City.
     *
     * @return string|null
     */
    public function getEmpCity()
    {
        return $this->_getData('emp_city');
    }

    /**
     * Setter method for Employee City.
     *
     * @param string $empCity
     * @return $this
     */
    public function setEmpCity($empCity)
    {
        return $this->setData('emp_city', $empCity);
    }

    /**
     * Getter method for Employee Postcode.
     *
     * @return string|null
     */
    public function getEmpPostcode()
    {
        return $this->_getData('emp_postcode');
    }

    /**
     * Setter method for Employee Postcode.
     *
     * @param string $empPostcode
     * @return $this
     */
    public function setEmpPostcode($empPostcode)
    {
        return $this->setData('emp_postcode', $empPostcode);
    }

    /**
     * Getter method for Employee Company.
     *
     * @return string|null
     */
    public function getEmpCompany()
    {
        return $this->_getData('emp_company');
    }

    /**
     * Setter method for Employee Company.
     *
     * @param string $empCompany
     * @return $this
     */
    public function setEmpCompany($empCompany)
    {
        return $this->setData('emp_company', $empCompany);
    }
}
