{extends file='page.tpl'}

{block name='page_content'}
    <h1>Ma liste d'envie</h1>
    <p>Bienvenue sur votre page de liste d'envies.</p>

    {foreach $wishlist as $item}
        <p>{$item.id_product} - {$item.price}</p>
    {/foreach}

{/block}