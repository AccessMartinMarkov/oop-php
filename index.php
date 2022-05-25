<?php

include 'lib/functions.php';

$people = get_people();

?>

<?php foreach($people as $person) { ?>
<h3><?php echo $person['names'] ?></h3>
<?php } ?>
