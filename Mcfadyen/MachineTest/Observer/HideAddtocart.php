<?php
namespace Mcfadyen\MachineTest\Observer; 
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Mcfadyen\MachineTest\Helper\Data;
use Psr\Log\LoggerInterface as Logger;
 
class HideAddtocart implements ObserverInterface
{
		
	const HIDE_CART_PRODUCT_VIEW = 'hide_cart_button';
    	 
	 /**
     * @var Data
     */
    protected $customerHelper;
	
	 /**
     * @var Logger
     */
    private $logger;
	
    /**
     * HideAddToCart constructor.
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
 
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();
		
		
       $userType=  $this->customerHelper->getCustomerUserType();		
	 
		if ($userType == \Mcfadyen\MachineTest\Helper\Data::HIDE_INDIVIDUAL_CART) 
        {
            $layout->getUpdate()->addHandle(self::HIDE_CART_PRODUCT_VIEW);
        }
    }
}
