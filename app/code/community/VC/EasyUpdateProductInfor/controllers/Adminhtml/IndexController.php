<?php
class VC_EasyUpdateProductInfor_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action {
	public function updateAction() {
		$data = $this->getRequest()->getPost();
		$result = array();
		try {
			if (isset($data['id']) && $data['id'] > 0) {
				$result['id'] = $data['id'];
				$product = Mage::getModel('catalog/product')->load($data['id']);
				if (isset($data['field']) && in_array($data['field'], array('qty', 'price')) 
				&& isset($data['value']) && $data['value'] > 0 && $product) {
					$result['field'] = $data['field'];
					$result['value'] = $data['value'];
					if ($data['field'] == 'price') {
						$result['value'] = Mage::helper('core')->formatPrice($data['value'], false);
						$product->setPrice($data['value'])->save();
					} else {
						$result['value'] = $data['value'];
						$product->getStockItem()->setQty($data['value'])->save();
					}
					
				}
			}
		} catch(Exception $e) {
			$result['error'] = $e->getMessage();
		}
		
        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
		
	}
}