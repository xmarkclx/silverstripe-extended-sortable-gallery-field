<?php


define('SORTABLEGALLERY_DIR', basename(dirname(__FILE__)));

//Image::add_extension('GalleryImage');

Object::add_extension('Image', 'GalleryImage');
Object::useCustomClass('UploadField_SelectHandler','SortableGalleryUploadField_SelectHandler');