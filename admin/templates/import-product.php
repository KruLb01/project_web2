<div class="import-product-container">
    <div class="import-product">
        <div class="importer">
            <span>Id Employee: <input type="text" disabled value='<?php echo $_SESSION['user']['id'] ?>'></span>
            <span>Id Provider: <input type="text" disabled value=''><i class="fas fa-folder-open"></i></span>
        </div>
        <div class="import-product-content">
            <div class="ip-content-item">
                <span>Id Product: <i class="fas fa-folder-open"></i><input type="text" disabled></span>
                <span>Quantity: <input type="number" class='quantity'></span>
                <span>Cost: <input type="number" class='cost'></span>
                <span>Total: <input type="text" class='total' disabled></span>
            </div>
        </div>
            <i class="fas fa-plus-square"></i>
    </div>
</div>

<script>
    $('.fa-plus-square').click(function(){
        var add = '<div class="ip-content-item"><span>Id Product: <i class="fas fa-folder-open"></i><input type="text" disabled></span><span>Quantity: <input type="number" class="quantity"></span><span>Cost: <input type="number" class="cost"></span><span>Total: <input type="text" class="total" disabled></span></div>';
        $('.import-product-content').append(add);
    })
    $(document).on("keyup",".ip-content-item", function(e) {
        var quantity = $(this).find('.quantity').val();
        var cost = $(this).find('.cost').val();

        if (cost=='') cost = 0;
        if (quantity=='') quantity = 0;

        $(this).find('.total').val(cost*quantity+' vnd');
    })
</script>