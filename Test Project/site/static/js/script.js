function onCartClick(event){
    event.preventDefault();

    let qty = $("[name='qty']").val();
    let id = $("[name='id']").val();
    let url = "WebSite/site/front.php?controller=cart&action=Ajax&id="+id+"&qty=+qty";
    $(this).val("\n" + "Add to cart...");

    $.ajax({
        url: url,
        context: document.body
    }).done(function(response) {
        let parts = response.split("|");
        $('#cart-qty').html(parts[1]);
        $('#cart-total').html(parts[0]);
        $("#add-to-cart-button").val("Добавлено").attr('disabled',true);
    });
}
$("#add_to_cart_button").bind("click",onCartClick);

