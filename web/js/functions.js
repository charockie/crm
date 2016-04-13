/**
 * Created by Solo on 07.04.2016.
 */


$('#delete-department').click(function(){
    if (confirm("Хотите удалить отдел?")) {
        $.post(
            "index.php?r=administration/departments/delete_department",
            {
                id: $(this).data('id')
            },
            function () {
                window.location.href = "index.php?r=administration/departments"
            }
        );
    }
});

$('.delete-position').click(function(){
    if (confirm("Хотите удалить должность?")) {
        $.post(
            "index.php?r=administration/departments/delete_position",
            {
                id: $(this).data('id')
            },
            function () {
                location.reload()
            }
        );
    }
});

$('#delete-user').click(function(){
    if (confirm("Хотите удалить пользователя?")) {
        $.post(
            "index.php?r=administration/users/delete_user",
            {
                id: $(this).data('id')
            },
            function () {
                window.location.href = "index.php?r=administration/users"
            }
        );
    }
});

$('#delete-ticket').click(function(){
    if (confirm("Хотите удалить тикет?")) {
        $.post(
            "index.php?r=tickets/delete_ticket",
            {
                id: $(this).data('id')
            },
            function () {
                window.location.href = "index.php?r=tickets"
            }
        );
    }
});

$('#free-user').click(function(){
    if (confirm("Хотите освободить пользователя?")) {
        $.post(
            "index.php?r=administration/users/free_user",
            {
                id: $(this).data('id')
            },
            function () {
                location.reload()
            }
        );
    }
});

$('.choose-worker').click(function(){
    if (confirm("Хотите назначить этого работника?")) {
        $.post(
            "index.php?r=administration/departments/choose",
            {
                usr_id: $(this).data('usr_id'),
                dep_id: $(this).data('dep_id'),
                pos_id: $(this).data('pos_id')
            },
            function () {
                window.location.href = "javascript:history.back()"
            }
        );
    }
});

