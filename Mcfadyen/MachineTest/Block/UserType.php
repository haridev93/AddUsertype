<?php
namespace Mcfadyen\MachineTest\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Mcfadyen\MachineTest\Model\Customer\Attribute\Source\UserTypeFactory;


/**
 * Class UserType
 * @package Mcfadyen\MachineTest\Block
 */
class UserType extends Template
{
    private $userType;
   

    /**
     * UserType constructor.
     * @param Context $context
     * @param UserTypeFactory $userTypeFactory
     */
    public function __construct(
        Context $context,
        UserTypeFactory $userTypeFactory
    ) {
        parent::__construct($context);
        $this->userType = $userTypeFactory;
    }

    /**
     * @return array
     */
    public function getUserType(): array
    {
        $userType = $this->userType->create();
        return $userType->getAllOptions();
    }
}
