<?php
/**
 * Extension of the UploadField to add sorting of files
 *
 * @author bummzack
 * @author xmarkclx
 */
class SortableGalleryField extends UploadField 
{
    public function __construct($name, $pageClassName, $className, $title = null, SS_List $items = null){
        $this->imageClassName = $className;
        $this->pageClassName = $pageClassName;
        $this->relationName = $name;
        parent::__construct($name, $title, $items);
    }

	public function Field($properties = array()) {
		//Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
		Requirements::javascript(SORTABLEGALLERY_DIR . '/javascript/SortableGalleryField.js');
        Requirements::customScript("window.imageClassName = '{$this->imageClassName}'; window.parentClassName='{$this->pageClassName}'; window.relationName='{$this->relationName}'");
		Requirements::css(SORTABLEGALLERY_DIR . '/css/SortableUploadField.css');
		return parent::Field($properties);
	}
	
}
