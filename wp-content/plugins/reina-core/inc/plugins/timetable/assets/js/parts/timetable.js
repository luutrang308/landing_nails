(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefTimetable.init();
    });

    var qodefTimetable = {
        init: function () {
            var $timetable = $('.tt_timetable');

            if ( $timetable.length ) {
                $timetable.each( function() {
                    var $thisTimetable = $(this),
                        $first_row = $thisTimetable.find('thead tr');

                    if ( $first_row.length && qodef.body.hasClass('qodef-timetable--predefined') ) {
                        $first_row.css('background-color', '#FFFFFF');
                    }
                })
            }
        }
    };

})(jQuery);
