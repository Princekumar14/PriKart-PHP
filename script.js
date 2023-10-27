// A $( document ).ready() block.
$( document ).ready(function() {
    console.log("hi");
    function showUpdateButton() {
        // $('.update_QTY_Button').style.display = 'block';
        // $(".product_fares").addClass("intro");

        $(".update_QTY_Button").each(function(){
            $(this).style.display = 'block';
          });
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