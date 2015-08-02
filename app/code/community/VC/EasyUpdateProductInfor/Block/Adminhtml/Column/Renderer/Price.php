<?php
class VC_EasyUpdateProductInfor_Block_Adminhtml_Column_Renderer_Price extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function _getValue(Varien_Object $row)
    {
		$value = '<span id="price_label_'.$row->getId().'" data-id="'.$row->getId().'">'.$this->helper('core')->formatPrice($row->getPrice(), false).'</span>';
		$value .= '<input type="text" id="price_value_'.$row->getId().'" name="price_value['.$row->getId().']" data-id="'.$row->getId().'" value="'.number_format($row->getPrice(), 2).'" style="width: 100px;margin-right: 2px;display:none">';
		$value .= '<button id="price_button_'.$row->getId().'" data-id="'.$row->getId().'" onclick="vcUpdateInfor('.$row->getId().',\'price\')" style="display:none"><span><span>Update</span></span></button>';
		$value .= '<img id="price_waiting_'.$row->getId().'" src="'.$this->getSkinUrl('vc_easyupdateproductinfor/images/ajax-loader.gif').'" class="v-middle" style="display:none" />';
		return $value;
    }
}
