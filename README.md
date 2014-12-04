SilverStripe-SortableGalleryField
=================================

Bulk upload images into a silverstripe gallery, drag and drop reordering. Choose files from desktop or images previously uploaded


FEATURES
========

bulk upload images
add images from files previously uploaded
drag and drop ordering of images


SAMPLE USAGE
============



<?php
class GalleryPage extends Page {
	
	static $has_many = array(  	 	
		'Images' => 'Image'  
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$f = new SortableGalleryField('Images', 'My Images'); 
		$fields->addFieldToTab('Root.Images', $f);
		
		return $fields;
	}
}
