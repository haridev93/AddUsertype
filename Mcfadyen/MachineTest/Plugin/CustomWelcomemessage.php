<?php

namespace Mcfadyen\MachineTest\Plugin;

use Magento\Theme\Block\Html\Header;
use Mcfadyen\MachineTest\Helper\Data;
use Psr\Log\LoggerInterface as Logger;


/**
 * Class CustomWelcomemessage
 * @package Mcfadyen\MachineTest\Plugin
 */
class CustomWelcomemessage
{
    /**
     * @var Data
     */
    protected $customerHelper;
	
	 /**
     * @var Logger
     */
    private $logger;
	
    /**
     * CustomWelcomemessage constructor.
     * @param Data $customerHelper
     * @param Logger $logger
     */
    public function __construct(
        Data $customerHelper,
        Logger $logger
    ) {
        $this->customerHelper = $customerHelper;
        $this->logger = $logger;
    }

    /**
     * @param Header $subject
     * @param $result
     * @return string
     */
    public function afterGetTemplate(
        Header $subject,
        $result
    ) {
        return 'Mcfadyen_MachineTest::html/header.phtml';
    }

	
		
    public function afterGetWelcome(
        Header $subject,
        $result
    ) {				 
	    $userType = $this->customerHelper->getCustomerUserType();	
		
        if ($userType) {
            $msg = "Welcome " . $userType;
        }else{
			$msg="Welcome";
		}
        $this->_data['welcome'] = $msg;
        return __($this->_data['welcome']);
    }
}
