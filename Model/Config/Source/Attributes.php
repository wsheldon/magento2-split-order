<?php

/**
 * A Magento 2 module named Magestat/SplitOrder
 * Copyright (C) 2018 Magestat
 *
 * This file included in Magestat/SplitOrder is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Magestat\SplitOrder\Model\Config\Source;

use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;

class Attributes implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get options as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $collection = $this->collectionFactory->create();

        $attributes = [];
        foreach ($collection as $items) {
            $attributes[$items->getAttributeCode()] = $items->getFrontendLabel();
        }
        return $attributes;;
    }
}
