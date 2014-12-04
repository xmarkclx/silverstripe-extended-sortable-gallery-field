SilverStripe Extended SortableGalleryField
=================================
Based off http://addons.silverstripe.org/add-ons/jonshutt/silverstripe-sortable-gallery-field.

Bulk upload images into a silverstripe gallery, drag and drop reordering. Choose files from desktop or images previously uploaded

The main difference is that this one allows sorting of subclasses of Image.

I.e

<code>MyImageClass extends Image.</code>

I found out image sorting does not work properly of the this is based off as of writing and made fixes but the fixes completely changed how it is done on the backend or the interface, thus it might break code that interfaces with John's code.

FEATURES
========

* Subclasses support
* bulk upload images
* add images from files previously uploaded
* drag and drop ordering of images


SAMPLE USAGE
============
<pre>
class GalleryPage extends Page {
	static $has_many = array(  	 	
		'Images' => 'CustomImage'  
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$galleryField = new SortableGalleryField(
	            $name = 'Images',
	            $pageClassName = 'GalleryPage',
	            $className = 'CustomImage',
	            $title = 'Upload one or more images'
	        );
		$fields->addFieldToTab('Root.Images', $galleryField);
		
		return $fields;
	}
}
</pre>
