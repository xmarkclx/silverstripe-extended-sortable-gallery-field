<?php


class GalleryImage extends DataExtension {

    private static $db = array(
        'Description' => 'Text',
        'SortOrder' => 'Int'
    );

    private static $default_sort = "SortOrder ASC";



    public function updateCMSFields(FieldList $fields) {

        $fields->addFieldsToTab('Root.Main',
            array(
                new TextareaField("Description")
            )
        );

        $fields->addFieldsToTab('Root.Main',
            array(
                new NumericField("SortOrder")
            )
        );

    }

}
