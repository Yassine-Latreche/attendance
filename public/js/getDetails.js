function getDetails($professor_Id) {
    $.get("/api/timetable/professor/"+$professor_Id,
        function (data, status) {
            data.forEach((timetableItem, index) => {
                var g_or_s = '';
                if (timetableItem.is_In_Group == '1') {
                    $.get("/api/group/" + timetableItem.group_Id,
                        function (groupdata, status) {
                            g_or_s = "Groupe " + groupdata.group;
                        });
                } else {
                    $.get("/api/section/" + timetableItem.section_Id,
                        function (sectiondata, status) {
                            g_or_s = "Section " + sectiondata.section;
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

function timeTableProfessor(professor_Id) {
    var days_Of_Week = 
        {
            'sunday' : 'Dimanche',
            'monday' : 'Lundi',
            'tuesday' : 'Mardi',
            'wednesday' : 'Mercredi',
            'thursday' : 'Jeudi',
            'friday' : 'Vendredi',
            'saturday' : 'Samedi',
        };

    $.get("/api/lectures/professor/"+professor_Id,
        function (data, status) {
            for (const element in data){
                if (data[element]) {
                    data[element].day_Of_Week = days_Of_Week[data[element].day_Of_Week];
                } 
            }
            console.log(data);
            ///
            $("#last_title").text(data["last"].module+" - "+data["last"].lecture_Type);
            if (data["last"].group) {
                $("#last_content").append('<p class="card-text">Groupe: '+data["last"].group+'</p>');
            } else {
                $("#last_content").append('<p class="card-text">Section: '+data["last"].section+'</p>');
            }
            $("#last_content").append('<p class="card-text">Année: '+data["last"].level+'</p>');
            $("#last_content").append('<p class="card-text">Début: '+data["last"].starting.substring(0, 5)+' - Fin: '+data["last"].ending.substring(0, 5)+'</p>');

            //
            if (data["now"]) {
                $("#now_title").text(data["now"].module+" - "+data["now"].lecture_Type);
                if (data["now"].group) {
                    $("#now_content").append('<p class="card-text">Groupe: '+data["now"].group+'</p>');
                } else {
                    $("#now_content").append('<p class="card-text">Section: '+data["now"].section+'</p>');
                }
                $("#now_content").append('<p class="card-text">Année: '+data["now"].level+'</p>');
                $("#now_content").append('<p class="card-text">Début: '+data["now"].starting.substring(0, 5)+' - Fin: '+data["now"].ending.substring(0, 5)+'</p>');

            } else {
                $("#now_content").empty().append('<h2 class="card-title" style="font-size: 3rem; text-align:center">Libre</h2>');
            }
            //

            $("#next_title").text(data["next"].module+" - "+data["next"].lecture_Type);
            if (data["next"].group) {
                $("#next_content").append('<p class="card-text">Groupe: '+data["next"].group+'</p>');
            } else {
                $("#next_content").append('<p class="card-text">Section: '+data["next"].section+'</p>');
            }
            $("#next_content").append('<p class="card-text">Année: '+data["next"].level+'</p>');
            $("#next_content").append('<p class="card-text">Début: '+data["next"].starting.substring(0, 5)+' - Fin: '+data["next"].ending.substring(0, 5)+'</p>');
            ///
        }
    );
}
function addtimetable() {
    $.get("/api/module",
        function (datamodule, status) {
            datamodule.forEach(element => {
                $('#module_Id').append('<option value="' + element.id + '">' +
                    element.module + '</option>');
            });
        });

    $.get("/api/professor",
        function (dataprofessor, status) {
            dataprofessor.forEach(element => {
                $('#professor_Id').append('<option value="' + element.id + '">' +
                    element.name + '</option>');
            });
        });
    $.get("/api/level",
        function (data, status) {
            data.forEach((levelItem, index) => {
                $('#level_Id').append('<option value="' + levelItem.id + '">' +
                    levelItem.level + '</option>');
            });
        }
    );

    $("#level_Id").on("input", function () {
        $('#group_Id').empty().append('<option selected disabled value="0">Groupe</option>').append('<option value="all">Tous</option>');
        $('#section_Id').empty().append('<option selected disabled value="0">Section</option>');
        $.get("/api/level/"+$("#level_Id").val()+'/section',
            function (data, status) {
                data.forEach((sectionItem, index) => {
                    $('#section_Id').append('<option value="' + sectionItem.id + '">' +
                    sectionItem.section + '</option>');
                });
            }
        );
    });

    $("#section_Id").on("input", function () {
        $('#group_Id').empty().append('<option selected disabled value="0">Group</option>').append('<option value="all">Tous</option>');
        $.get("/api/level/"+$("#level_Id").val()+'/section/'+$("#section_Id").val()+'/group',
            function (data, status) {
                data.forEach((groupItem, index) => {
                    $('#group_Id').append('<option value="' + groupItem.id + '">' +
                    groupItem.group + '</option>');
                });
            }
        );
    });

    
}

function edittimetable(module_Id, professor_Id, lecture_Type, level_Id, section_Id, group_Id, day_Of_Week) {
    $.get("/api/module",
        function (datamodule, status) {
            datamodule.forEach(element => {
                $('#module_Id').append('<option value="' + element.id + ((module_Id == element.id) ?'" selected' : '"') + '>' +
                    element.module + '</option>');
            });
        });

    $.get("/api/professor",
        function (dataprofessor, status) {
            dataprofessor.forEach(element => {
                $('#professor_Id').append('<option value="' + element.id + ((professor_Id == element.id) ? '" selected' : '"') + '>' +
                    element.name + '</option>');
            });
        }
    );
    
    var lecture_Types =[
        {
            'type' : 'Cours',
            'id' : 'cours'
        },
        {
            'type' : 'TD',
            'id' : 'TD'
        },
        {
            'type' : 'TP',
            'id' : 'TP'
        },
    ];

    lecture_Types.forEach(element => {
        $('#lecture_Type').append('<option value="' + element.id + ((lecture_Type == element.id )? '" selected' : '"') + '>' +
            element.type + '</option>');
    });

    var days_Of_Week = [
        {
            'day' : 'Dimanche',
            'id' : 'sunday'
        },
        {
            'day' : 'Lundi',
            'id' : 'monday'
        },
        {
            'day' : 'Mardi',
            'id' : 'tuesday'
        },
        {
            'day' : 'Mercredi',
            'id' : 'wednesday'
        },
        {
            'day' : 'Jeudi',
            'id' : 'thursday'
        },
        {
            'day' : 'Vendredi',
            'id' : 'friday'
        },
        {
            'day' : 'Samedi',
            'id' : 'saturday'
        },
    ];

    days_Of_Week.forEach(element => {
        $('#day_Of_Week').append('<option value="' + element.id + ((day_Of_Week == element.id) ? '" selected' : '"') + '>' +
            element.day + '</option>');
    });

    $.get("/api/level",
        function (data, status) {
            data.forEach((levelItem, index) => {
                $('#level_Id').append('<option value="' + levelItem.id + ((level_Id == levelItem.id) ? '" selected' : '"') +  '>' +
                    levelItem.level + '</option>');
            });
            $('#section_Id').empty().append('<option disabled value="0">Section</option>');
            $.get("/api/level/"+$("#level_Id").val()+'/section',
                function (data, status) {
                    data.forEach((sectionItem, index) => {
                        $('#section_Id').append('<option ' + ((section_Id == sectionItem.id) ? 'selected' : '') + ' value="' + sectionItem.id +'"' + '>' +
                        sectionItem.section + '</option>');
                    });
                    $('#group_Id').empty().append('<option disabled value="0">Groupe</option>');
                    $.get("/api/level/"+$("#level_Id").val()+'/section/'+$("#section_Id").val()+'/group',
                        function (data, status) {
                            data.forEach((groupItem, index) => {
                                $('#group_Id').append('<option value="' + groupItem.id + ((group_Id == groupItem.id) ? '" selected' : '"') + '>' +
                                groupItem.group + '</option>');
                            });
                        }
                    );
                }
            ); 
        }
    ); 

    $("#level_Id").on("input", function () {
        $('#group_Id').empty().append('<option selected disabled value="0">Group</option>').append('<option value="all">Tous</option>');
        $('#section_Id').empty().append('<option selected disabled value="0">Section</option>');
        $.get("/api/level/"+$("#level_Id").val()+'/section',
            function (data, status) {
                data.forEach((sectionItem, index) => {
                    $('#section_Id').append('<option value="' + sectionItem.id + '">' +
                    sectionItem.section + '</option>');
                });
            }
        );
    });

    $("#section_Id").on("input", function () {
        $('#group_Id').empty().append('<option selected disabled value="0">Group</option>').append('<option value="all">Tous</option>');
        $.get("/api/level/"+$("#level_Id").val()+'/section/'+$("#section_Id").val()+'/group',
            function (data, status) {
                data.forEach((groupItem, index) => {
                    $('#group_Id').append('<option value="' + groupItem.id + '">' +
                    groupItem.group + '</option>');
                });
            }
        );
    });
}