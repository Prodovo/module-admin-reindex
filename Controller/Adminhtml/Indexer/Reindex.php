<?php

namespace Prodovo\AdminReindex\Controller\Adminhtml\Indexer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Indexer\Model\IndexerFactory;
use Psr\Log\LoggerInterface;
use Throwable;

class Reindex extends Action
{
    /**
     * @var IndexerFactory
     */
    protected $indexerFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * Constructor
     *
     * @param Context $context
     * @param IndexerFactory $indexerFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        IndexerFactory $indexerFactory,
        ManagerInterface $messageManager,
        LoggerInterface $logger
    ) {
        $this->indexerFactory = $indexerFactory;
        $this->messageManager = $messageManager;
        $this->logger = $logger;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|ResultInterface|void
     * @throws Throwable
     */
    public function execute()
    {
        $indexerIds = $this->getRequest()->getParam('indexer_ids');
        if (!is_array($indexerIds)) {
            $this->messageManager->addErrorMessage(__('Please select indexers.'));
        } else {
            try {
                foreach ($indexerIds as $indexerId) {
                    $indexer = $this->indexerFactory->create();
                    $indexer->load($indexerId);
                    $indexer->reindexAll();
                }
                $this->messageManager->addSuccessMessage(__('Reindex %1 indexer(s).', count($indexerIds)));
            } catch (\Exception $e) {
                $this->logger->critical($e);
                $this->messageManager->addErrorMessage(__('We couldn\'t reindex because of an error.'));
            }
        }
        $this->_redirect('indexer/indexer/list');
    }
}
