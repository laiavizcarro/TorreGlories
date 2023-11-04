<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>

<table id='products'>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Price</th>
    </tr>

    <!-- Creo una fila per cada producte d ela bbdd-->
    <?php
        foreach($allProducts as $product){?>
            <tr>
                <td><?= $product->getId()?></td>
                <td><?=$product->getName()?></td>
                <td><?=$product->getPrice()?></td>

                <!-- Afegeixo un boto editar per fila -->
                <td>
                    <form action= <?= "url.?controller = product&action=edit"?> method="post">
                    <input type='hidden' name='id' value= <?=$product->getId()?>>
                    <input type='hidden' name='category_id' value= <?=$product->getCategoryId()?>>
                    <button type="submit" name="edit">Editar</button>

                </form>
                </td>
            </tr>
        <?php } ?>
    


</table>
</div>

</body>
</html>
