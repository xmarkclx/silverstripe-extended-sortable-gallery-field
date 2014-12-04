;(function($) {
    $(function(){
        $.entwine('ss', function($) {
            $("ul.ss-uploadfield-files").entwine({
                onmatch: function() {
                    // enable sorting functionality
                    var self = $(this);

                    self.sortable({
                        handle: ".ss-uploadfield-item-preview",
                        axis: "y",
                        start: function(event, ui){
                            // remove overflow on container
                            ui.item.data("oldPosition", ui.item.index())
                            self.css("overflow", "hidden");
                        },
                        stop: function(event, ui){
                            // restore overflow
                            self.css("overflow", "auto");
                        },
                        update: function(event, ui){

                            formID = $("#Form_EditForm_ID").val();
                            url = 'GalleryImageController/Sort/';
                            $.get(url, {
                                newPosition: (ui.item.index()),
                                oldPosition: ui.item.data("oldPosition"),
                                pageID: formID,
                                className: window.imageClassName,
                                parentClassName: window.parentClassName,
                                relationName: window.relationName
                            }, function(data, status){

                            });


                        }
                    });
                    this._super();
                },
                onunmatch: function(){
                    // clean up
                    try {
                        $(this).sortable("destroy");
                    } catch(e){};
                    this._super();
                }
            });
        });
    });
}(jQuery));