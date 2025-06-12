<?php
/**
 * Created by PhpStorm.
 * User: AB-Nexttech
 * Date: 8/23/2019
 * Time: 6:15 PM
 */
$colors=["#2e7f6c","#94C600","#FFC000","#00B0F0","#8F5201","#E08201"];
$districts_table= get_table('districts');
//Districts
while ($districts=mysqli_fetch_array($districts_table)){
?>
{ title: "<?=$districts['name']?>", id: "<?=clean($districts['name'])?>", selectable: true, color: "<?=$colors[array_rand($colors)];?>" },
<?php } ?>