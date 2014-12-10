<?php


class GalleryImageController extends Controller {

    //basic security for controller
    static $allowed_actions = array(
        'Sort' => 'ADMIN'
    );

    function init(){

        parent::init();

    }

    function Sort() {

        $pageID = $_GET['pageID'];
        $newPosition  = $_GET['newPosition'];
        $oldPosition  = $_GET['oldPosition'];
        $ClassName = $_GET['className'];
        $ParentClassName = $_GET['parentClassName'];
        $Name = $_GET['relationName'];

        //$Images = DataObject::get($ClassName, '"ParentID" = '.$pageID);
        //$Images = DataObject::get($ClassName, '"'.$ParentClassName.'ID" = '.$pageID, 'SortOrder ASC');
        //$Images = DataObject::get($ClassName, '"ParentID" = '.$pageID, 'SortOrder ASC');
        $Images = $ParentClassName::get_by_id($ParentClassName, $pageID)->$Name();
        /** @var ArrayList $Images */
        $Images->sort('SortOrder ASC');
        //$Images = DataObject::get_by_id('Page',$pageID)->$ClassName();

        $loop = 0;
        $newSortOrder = 0;
        //echo 'x<br>';
        foreach($Images as $Image){
            /** @var Image $Image */
            echo 'Old:<br>';
            echo $Image->ID."<br>";
            echo $Image->SortOrder."<br>";

            if ($loop == $newPosition) { $newSortOrder++; }
            $Image->SortOrder = $newSortOrder;
            if ($loop == $oldPosition) { $newSortOrder--;  $Image->SortOrder = $newPosition; }

            $Image->write();

            echo 'New: '.$Image->SortOrder."<br><br>";
            echo $Image->Title;

            $loop++;
            $newSortOrder++;
        }

    }


}