<?php
include "app/code/core/Mage/Adminhtml/Block/Catalog/Product/Grid.php";
class VC_EasyUpdateProductInfor_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
    protected function _prepareColumns()
    {
		parent::_prepareColumns();	
		if (Mage::getStoreConfig('vc_easyupdateproductinfor/general/enable') == 1) {
			$store = $this->_getStore();
			$this->addColumn('price',
				array(
					'header'=> Mage::helper('catalog')->__('Price'),
					'type'  => 'price',
					'currency_code' => $store->getBaseCurrency()->getCode(),
					'index' => 'price',
					'renderer' => 'vc_easyupdateproductinfor/adminhtml_column_renderer_price'
			));
	
			if (Mage::helper('catalog')->isModuleEnabled('Mage_CatalogInventory')) {
				$this->addColumn('qty',
					array(
						'header'=> Mage::helper('catalog')->__('Qty'),
						'width' => '100px',
						'type'  => 'number',
						'index' => 'qty',
						'renderer' => 'vc_easyupdateproductinfor/adminhtml_column_renderer_qty'
				));
			}
		}
    }


    public function getRowUrl($row)
    {
		if (Mage::getStoreConfig('vc_easyupdateproductinfor/general/enable') == 1) {
			return false;
		} else {
			return parent::getRowUrl($row);
		}
    }
}
