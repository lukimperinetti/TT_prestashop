<a href="javascript:void(0);" id="wishlist-btn" class="btn btn-default" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px;">
    Ajouter à la liste d'envie
</a>

<script>
document.getElementById('wishlist-btn').addEventListener('click', function() {
    var productId = this.getAttribute('data-product-id');

    // Envoyer la requête AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_wishlist.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    // Les données que vous souhaitez envoyer avec la requête (par exemple, l'identifiant du produit)
    var data = 'product_id=' + productId;

    xhr.onload = function() {
        // Gérer la réponse ici (peut-être mettre à jour l'interface utilisateur)
        console.log(xhr.responseText);
    };

    xhr.send(data);
});
</script>