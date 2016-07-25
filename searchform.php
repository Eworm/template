<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">

    <fieldset class="searchform__container">

        <label for="s" class="searchform__container__label">
            <?php _e( 'Zoeken in de site', 'thema_vertalingen' ); ?>
        </label>

        <input type="search" value="" name="s" id="s" placeholder="<?php _e( 'Zoeken in de site', 'thema_vertalingen' ); ?>" class="searchform__container__field">
        <input type="submit" value="<?php _e( 'Zoek', 'thema_vertalingen' ); ?>" class="submit searchform__container__button">

    </fieldset>

</form>
