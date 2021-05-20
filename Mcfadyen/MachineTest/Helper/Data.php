<?php
namespace Mcfadyen\MachineTest\Helper;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Model\SessionFactory;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class Data
 * @package Mcfadyen\MachineTest\Helper
 */
class Data
{
    const HIDE_INDIVIDUAL_CART = 'Individual';
	 /**
     * @var SessionFactory
     */
    protected $customerSessionFactory;
	
    /**
     * @var customerSession
     */
    protected $customerSession;
    /**
     * @var Logger
     */
    private $logger;

	protected $customerRepository;
	
    public function __construct(
	     CustomerRepositoryInterface $customerRepository,
         \Magento\Customer\Model\Session $customerSession,
		  SessionFactory $customerSessionFactory,
        Logger $logger
    ) {
		$this->customerRepository = $customerRepository;
        $this->customerSession = $customerSession;
		$this->customerSessionFactory = $customerSessionFactory;
        $this->logger = $logger;
    }

   
	 public function getCustomerUserType()
    {
		$customerSession = $this->customerSessionFactory->create();
        $customerId= $customerSession->getCustomer()->getId();
		
		if(!$customerId)
			return false;
		
		 $customer = $this->customerRepository->getById($customerId);		  
	    $userType=$customer->getCustomAttribute('user_type')->getValue() == 1 ? 'Individual' : "Company";
		
        return $userType;
    }
    
}
