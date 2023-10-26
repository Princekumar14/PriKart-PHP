// A $( document ).ready() block.
$( document ).ready(function() {
    function showUpdateButton() {
        $('.update_QTY_Button').style.display = 'block';
        // $(".product_fares").addClass("intro");
    }
    function hideUpdateButton() {
        $('.update_QTY_Button').style.display = 'none';
    }

    $(".product_qty").click(function(){
        showUpdateButton();

    })
    $(".update_QTY_Button").click(function(){
        hideUpdateButton();

    })

});