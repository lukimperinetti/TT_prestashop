<a href="javascript:void(0);" id="wishlist-btn" data-product-id="{$product_id}" class="btn btn-default" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px;">
    Ajouter à la liste d'envie
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('wishlist-btn').addEventListener('click', function() {
        var productId = this.getAttribute('data-product-id');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{$wishlist_link}', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                // Success!
                var resp = JSON.parse(this.response);
            } else {
                // We reached our target server, but it returned an error
            }
        };
        xhr.onerror = function() {
            // There was a connection error of some sort
            
        };
        xhr.send('ajax=true&action=add&product_id=' + productId);
    });
});
</script>