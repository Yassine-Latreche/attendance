function getDetails() {
    $.get("/api/timetable",
        function (data, status) {
            data.forEach((timetableItem, index) => {
                var g_or_s = '';
                if (timetableItem.is_In_Group == '1') {
                    $.get("/api/group/" + timetableItem.group_Id,
                        function (groupdata, status) {
                            g_or_s = "Group " + groupdata.group;
                    });    
                } else {
                    $.get("/api/section/" + timetableItem.section_Id,
                        function (sectiondata, status) {
                            g_or_s = "Section "+ sectiondata.section;
                    });
                }
                $.get("/api/module/" + timetableItem.module_Id,
                    function (datamodule, status) {
                        $('#timetable').append('<option value="' + timetableItem.id + '">' +
                            datamodule.module + '  |  ' + timetableItem.lecture_Type + '  |  ' +
                            g_or_s + '</option>');
                    });
            });
        });
    $(function () {
        $("#timetable").select2();
    });
}