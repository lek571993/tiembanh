$(document).ready(function($) {
    $(window).scroll(function(){
        if($(this).scrollTop()>150){
            $(".header-bottom").addClass('fixNav')
        }else{
            $(".header-bottom").removeClass('fixNav')
        }}
    )
});
$(document).ready(function ($) {
   $('a.updateCart').click(function () {
       var rowId = $(this).attr('id');
       var qty = $(this).parent().parent().find('#txtQty').val();
       var token = $("input[name='_token']").val();

       $.ajax({
            url: 'update-cart/' + rowId + '/' + qty,
            type: 'GET',
            cache: false,
            data: {'_token':token, 'id':rowId, 'qty':qty},
            success:function (data) {
                if (data === "Oke") {
                    alert('Cập nhật thành công');
                    window.location = 'show-cart';
                }
            }
       });
   });
});

$(document).ready(function ($) {
    $('ul li.aside_item a').click(function () {
        var subMenu = $(this).parent().find('.aside_sub_menu');
        // alert(subMenu);
        subMenu.slideToggle();
    });
});


