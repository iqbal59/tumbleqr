<?php
if (!empty($challans)) {
    foreach ($challans as $ch) {
        ?>
<div class="card text-center">

    <a href="https://swatinfosystems.com/upload/<?php echo $ch->picture; ?>" rel="prettyPhoto"
        title="<?php echo $ch->remarks; ?>" target="_blank">
        <img class="card-img-top" src="https://swatinfosystems.com/upload/<?php echo $ch->picture; ?>" />
    </a>


    <div class="card-body">
        <div class="card-title">
            <h4><?php echo $ch->remarks; ?>
            </h4>
        </div>
    </div>

</div>
<?php
    }
}