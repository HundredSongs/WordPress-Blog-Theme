<!-- Search Button Outline Secondary Right -->
<div class="col-8" style="margin:auto; position:relative;" >
  <form class="input-group" method="get" action="<?= esc_url(home_url('/')); ?>" >
    <input type="text" name="s" class="form-control" placeholder="<?php _e('Search', 'bootscore'); ?>" style="font-size: 12px;">
    <button type="submit" class="input-group-text btn btn-outline-secondary" style="font-size: 12px;"><i class="fa-solid fa-magnifying-glass"></i><span class="visually-hidden-focusable">Search</span></button>
  </form>
</div>
