SilverStripe Extended SortableGalleryField
=================================
Based off http://addons.silverstripe.org/add-ons/jonshutt/silverstripe-sortable-gallery-field.

Bulk upload images into a silverstripe gallery, drag and drop reordering. Choose files from desktop or images previously uploaded

The main difference is that this one allows sorting of subclasses of Image.

I.e

MyImageClass extends Image.

I found out image sorting does not work of the last version and made fixes but the fixes completely changed how it was done on the backend. I added this into Packagist since I needed the functionality on multiple projects.


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
