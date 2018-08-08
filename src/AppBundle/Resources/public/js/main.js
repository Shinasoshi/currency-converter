$(document).ready(function () {

    $('form[name=appbundle_main]').submit(function (e) {

        e.preventDefault();
        var url = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: url,
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: new FormData($(this)[0]),
            success: function (data) {

                if (data.status === true) {
                    $('#rub-error').html('');
                    $('#appbundle_main_rubValue').val(data.rubValue);
                    $('#appbundle_main_zlotyValue').val(data.zlotyValue);
                } else {
                    $('#rub-error').html(data.error)
                }
            }
        });

        return false;
    });
});