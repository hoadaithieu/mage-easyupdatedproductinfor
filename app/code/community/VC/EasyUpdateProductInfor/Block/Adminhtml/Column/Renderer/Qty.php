<?php
class VC_EasyUpdateProductInfor_Block_Adminhtml_Column_Renderer_Qty extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function _getValue(Varien_Object $row)
    {
		
		if ($row->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_SIMPLE) {
			$value = '<span id="qty_label_'.$row->getId().'" data-id="'.$row->getId().'">'.(int)$row->getQty().'</span>';
			$value .= '<input type="text" id="qty_value_'.$row->getId().'" name="qty_value['.$row->getId().']" data-id="'.$row->getId().'" value="'.(int)$row->getQty().'" style="width: 100px;margin-right: 2px;display:none">';
			$value .= '<button id="qty_button_'.$row->getId().'" data-id="'.$row->getId().'" onclick="vcUpdateInfor('.$row->getId().',\'qty\')" style="display:none"><span><span>Update</span></span></button>';
			$value .= '<img id="qty_waiting_'.$row->getId().'" src="'.$this->getSkinUrl('vc_easyupdateproductinfor/images/ajax-loader.gif').'" class="v-middle" style="display:none" />';
		} else {
			$value = number_format($row->getQty(), 0);
		}
		
		return $value;
    }
}
