<h2 class="indigo-text text-darken-1"><?php echo $doedel['name'] ?></h2>
<p><?php echo $doedel['description'] ?></p>
        
<div class="collection">
    <?php
        foreach($dates as $date) {
    ?>
        <div class="collection-item">
                
            <span class="new badge" data-badge-caption="votes"><?php echo Doedel::get_results($date['doedel_date_id'])[0]; ?></span>
            <?php echo $date['doedel_date'] ?> 
        </div>
    <?php
        }
    ?>
</div>