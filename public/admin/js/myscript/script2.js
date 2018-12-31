$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });

    $('div.alert').delay(3000).slideUp('slow');

    $('#btnAdd').click(function () {
        $('.addFile').append('<input type="file" name="ProductDetail[]" >');
    });

    $('a#del_img').click(function () {
        var url = 'http://localhost/laravel/admin/product/delImg/';
        var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").attr("idHinh");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        // alert(rid);

        $.ajax({
            url: url + idHinh,
            type: 'GET',
            cache: false,
            data: {"_token":_token, "idHinh":idHinh, "urlHinh":img},
            success: function (data) {
                if (data === "Oke") {

                    $("#"+rid).remove();
                } else {
                    alert("Error");
                }
            }
        });
    });
});