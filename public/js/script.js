$(document).ready(function () {
    $('#biro').change(function () {
        let biro = $('#biro').val();

        if (biro != '') {
            $.ajax({
                url: window.location.origin + "/bagian/action",
                method: "POST",
                data: { biro: biro },
                dataType: "JSON",
                success: function (data) {
                    let html = '<option value="">Pilih Bagian</option>';

                    for (let count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id_bagian + '">' + data[count].nama_bagian + '</option>';
                    }
                    $('#bagian').html(html);
                }
            });
        }
    });
});

$('#inputGroupFile').on('change', function () {
    //get the file name
    var fileName = $(this).val().replace('C:\\fakepath\\', " ");
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
