<?php


class SortableGalleryUploadField_SelectHandler extends UploadField_SelectHandler{


    protected function getListField($folderID) {
        $field = parent::getListField($folderID);
        $fileField = $field->FieldList()->dataFieldByName('Files');
        $columns = $fileField->getConfig()->getComponentByType('GridFieldDataColumns');
        $columns->setDisplayFields(array(
            'StripThumbnail' => '',
            'Title' => _t('File.Name'),
            'Created' => _t('AssetAdmin.CREATED', 'Date'),
            'Size' => _t('AssetAdmin.SIZE', 'Size'),
        ));
        return $field;
    }

}