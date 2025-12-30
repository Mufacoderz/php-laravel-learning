<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
// $json = file_get_contents('https://gist.githubusercontent.com/ihgoyarp/9327fcd326756747e042bdc499ceef01/raw/235202678a029d072369806a9781b89f36707ab9/SI32_PWD_2025');
$data = json_decode($json, TRUE);


?>

<section>
    <table>
        <tr>

            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
        </tr>

        <?php foreach ($data as $key => $value): ?>
            <tr>
                <td><?php echo $value['No'] ?></td>
                <td><?php echo $value['NIM'] ?></td>
                <td><?php echo $value['Nama'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</section>


<?php include 'includes/footer.php'; ?>