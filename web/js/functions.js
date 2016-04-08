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
            window.location.href = "index.php?r=administration/departments"
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
            window.location.href = "index.php?r=administration/users"
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
            window.location.href = "javascript:history.back()"
        );
    }
});

