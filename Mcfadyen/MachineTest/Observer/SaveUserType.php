<?php
namespace Mcfadyen\MachineTest\Observer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface as Logger;


/**
 * Class SaveUserType
 * @package Mcfadyen\MachineTest\Observer
 */
class SaveUserType implements ObserverInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        Logger $logger
    ) {
        $this->customerRepository = $customerRepository;
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        try {
            $accountController = $observer->getAccountController();
            $customer = $observer->getCustomer();
            $request = $accountController->getRequest();
            $userType = $request->getParam('user_type');
            $customer->setCustomAttribute('user_type', $userType);
            $this->customerRepository->save($customer);

        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
        }
    }
}
