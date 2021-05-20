<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mcfadyen\MachineTest\Model\Customer\Attribute\Source;

class UserType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '1', 'label' => __('Individual')],
				['value' => '2', 'label' => __('Company')]
            ];
        }
        return $this->_options;
    }
}

