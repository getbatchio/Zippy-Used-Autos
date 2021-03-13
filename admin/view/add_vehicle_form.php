<?php include('./view/header.php') ?>
<section class="vehicles_list">
    <?php include('../view/selector_form.php'); ?>

    <div class="list_container">
        <?php if (!empty($vehicles_list)) { ?>
            <table class="table table-bordered">
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <?= '<th></th>'; ?>
                </tr>

                <?php foreach($vehicles_list as $vehicle)  {
                    $year = $vehicle['year'];
                    $model = $vehicle['model'];
                    $price = $vehicle['price'];
                    $make_name = $vehicle['make_name'];
                    $type_name = $vehicle['type_name'];
                    $class_name = $vehicle['class_name'];
                ?>
                    <tr>
                        <td><?= $year ?></td>
                        <td><?= $make_name ?></td>
                        <td><?= $model ?></td>
                        <td><?= $type_name ?></td>
                        <td><?= $class_name ?></td>
                        <td><?= '$'.$price; ?></td>

                        
                            <td>
                                <form action="." METHOD="POST" class="delete_form">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="year" value="<?= $year ?>">
                                    <input type="hidden" name="model" value="<?= $model ?>">
                                    <input type="hidden" name="price" value="<?= $price ?>">
                                    <input type="hidden" name="make_id" value="<?= $vehicle['make_id'] ?>">
                                    <input type="hidden" name="type_id" value="<?= $vehicle['type_id'] ?>">
                                    <input type="hidden" name="class_id" value="<?= $vehicle['class_id'] ?>">
                                    <button class="delete_btn">Remove</button>
                                </form>
                            </td>
                        
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No vehicles exist yet.</p>
        <?php } ?>
    </div>
</section>
<?php include('footer.php') ?>