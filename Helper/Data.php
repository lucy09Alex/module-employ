<?php
/**
 * Employ Data Block
 */
namespace Lucy09Alex\Employ\Helper;

/**
 * Core class for creating a helper
 */
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Directory\Model\CountryFactory;

/**
 * Class for creating a collection factory
 */
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Data extends AbstractHelper
{
    /**
     * Configuration paths for XML configuration values
     */
    const XML_PATH_ENABLE_MODULE = 'configuration/general_configuration/enable_module';
    const XML_PATH_SHOW_MESSAGE = 'configuration/general_configuration/show_message';
    const XML_PATH_DEFAULT_GENDER = 'configuration/general_configuration/default_gender';
    const XML_PATH_DEFAULT_CUSTOMER = 'configuration/general_configuration/default_customer';
    const XML_PATH_DEFAULT_CATEGORIES = 'configuration/general_configuration/default_categories';
    const XML_PATH_DEFAULT_CONTENT = 'configuration/general_configuration/default_content';

    /**
     * @var ScopeConfigInterface $scopeConfig
     */
    protected $_scopeConfig;

    /**
     * @var CollectionFactory $_categoryCollectionFactory
     */
    protected $_categoryCollectionFactory;

    /**
     * @var CountryFactory $_countryFactory
     */
    protected $_countryFactory;


    /**
     * Data constructor.
     *
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param CollectionFactory $categoryCollectionFactory
     * @param CountryFactory   $countryFactory
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        CollectionFactory $categoryCollectionFactory,
        CountryFactory $countryFactory,
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_countryFactory = $countryFactory;
        parent::__construct($context);
    }

    /**
     * Fetch all category names.
     *
     * @return array
     */
    public function getAllCategoryNames()
    {
        $categoryCollection = $this->_categoryCollectionFactory->create();
        $categoryCollection->addAttributeToSelect('name');

        $categoryNames = [];

        foreach ($categoryCollection as $category) {
            $categoryNames[] = $category->getName();
        }

        return $categoryNames;
    }

    /**
     * Check if the module is enabled.
     *
     * @return mixed
     */
    public function isModuleEnabled()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_ENABLE_MODULE);
    }

    /**
     * Get the show message configuration value.
     *
     * @return mixed
     */
    public function getShowMessage()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_SHOW_MESSAGE);
    }

    /**
     * Get the default gender configuration value.
     *
     * @return mixed
     */
    public function getDefaultGender()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_DEFAULT_GENDER);
    }

    /**
     * Get the default customer configuration value.
     *
     * @return mixed
     */
    public function getDefaultCustomer()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_DEFAULT_CUSTOMER);
    }

    /**
     * Get the default categories configuration value.
     *
     * @return mixed
     */
    public function getDefaultCategories()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_DEFAULT_CATEGORIES);
    }

    /**
     * Get the default content configuration value.
     *
     * @return mixed
     */
    public function getDefaultContent()
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_DEFAULT_CONTENT);
    }


    /**
     * Get the country name by its code.
     *
     * @param string The country code 
     *
     * @return string|null The country name 
     */
    public function getCountryNameByCode($countryCode)
    {
        try {
            // Load the country by code using the CountryFactory
            $country = $this->_countryFactory->create()->loadByCode($countryCode);
            return $country->getName();
        } catch (\Exception $e) {
            return null; // Handle errors or invalid country codes as needed
        }
    }


    /**
     * Function to get the label by value from a custom array.
     *
     * @param string $value The value to search for.
     * @return string|null The label corresponding to the value, or null if not found.
     */
    function getLabelByValue($value)
    {
        $options = [
            ['value' => '', 'label' => __('-Select-')],
            ['value' => '0', 'label' => __('Kolkata')],
            ['value' => '1', 'label' => __('Goa')],
            ['value' => '2', 'label' => __('Madhya Pradesh')],
            ['value' => '3', 'label' => __('Uttar Pradesh')],
            ['value' => '4', 'label' => __('Gujrat')],
            ['value' => '5', 'label' => __('Rajsthan')],
            ['value' => '6', 'label' => __('Went Bengal')],
            ['value' => '7', 'label' => __('Tripura')],
            ['value' => '8', 'label' => __('Punjab')],
            ['value' => '9', 'label' => __('Karela')],
            ['value' => '10', 'label' => __('Sikkim')],
            // Add more state options as needed
        ];

        foreach ($options as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return null; // Return null if the value is not found
    }




}