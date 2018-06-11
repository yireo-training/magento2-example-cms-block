<?php
namespace Yireo\ExampleCmsBlock\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;

class Custom extends AbstractBlock
{
    const CONFIG_PATH = 'cms/yireo_examplecmsblock/block_name';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Context $context,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _toHtml() : string
    {
        $blockId = $this->scopeConfig->getValue(self::CONFIG_PATH);

        if (empty($blockId)) {
            return __('Yireo_ExampleCmsBlock is not configured yet');
        }

        $layout = $this->getLayout();

        /** @var \Magento\Cms\Block\Block $cmsBlock */
        $cmsBlock = $layout->createBlock('Magento\Cms\Block\Block');

        return $cmsBlock->setBlockId($blockId)->toHtml();
    }
}
