<?php
/*
 * Search Form
 */
?>
<form role="search" method="get" id="searchform" class="searchform search-f" action="<?php echo esc_url(home_url('/')); ?>">
    <div>
        <input type="text" value="" name="s" id="s" class="form-control" placeholder="<?php esc_attr_e('Search here','ecoshop'); ?>">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>