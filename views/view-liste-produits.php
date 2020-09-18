<div class="col-md-8">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productList as $product) : ?>
            <tr>
                <td><?= $product["product_name"] ?></td>
                <td><?= $product["category"] ?></td>
                <td><?= $product["price"] ?></td>
                <td>
                    <a href="index.php?c=suppression-produit&id=<?= $product["id"] ?>" class="btn btn-danger"> Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>