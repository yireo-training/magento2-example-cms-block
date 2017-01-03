<?php
namespace Yireo\TestCmsBlock\Model\Config\Source;

use Magento\Cms\Model\ResourceModel\Block\CollectionFactory;

/**
 * Class Block
 */
class Block implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var CollectionFactory
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
     * To option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (empty($this->options)) {

            $this->options[] = array(
                'value' => '',
                'label' => __('Pick a CMS block'),
            );

            $collection = $this->collectionFactory->create();

            foreach ($collection as $item) {
                $this->options[] = array(
                    'value' => $item->getIdentifier(),
                    'label' => $item->getTitle(),
                );
            }
        }

        return $this->options;
    }
}
