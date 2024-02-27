$(function(){
    const $cartQuantity = $('#cart-quantity');
    const $addToCart = $('.btn-add-to-cart');
    const $itemQuantities = $('.item-quantity');
    $addToCart.click(ev => {
        ev.preventDefault();
        const $this = $(ev.target);
        const id = $this.closest('.product-item').data('key');
        console.log(id);
        $.ajax({
            method: 'POST',
            url: $this.attr('href'),
            data: {id},
            success: function(){
                console.log(arguments)
                $cartQuantity.text(parseInt($cartQuantity.text() || 0 )+1);
                
            }
        })
    })

    $itemQuantities.change(function (ev) {
        const $this = $(ev.target);
        const $tr = $this.closest('tr');
        const id = $tr.data('id');
        const newQuantity = $this.val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '/cart/change-quantity',
            data: {
                id: id,
                quantity: newQuantity
            },
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (totalQuantity) {
                $cartQuantity.text(totalQuantity);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus, errorThrown);
                console.log(jqXHR.responseText);
            }
        });
    });      
});