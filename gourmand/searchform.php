<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="gourmand-search-form">
    <fieldset>
        <div id="searchbox">
            <input type="search" name="s" id="keywords" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Type here...', 'gourmand' ); ?>">
            <button type="submit" class="btn-search"><span><?php esc_html_e( 'Search' , 'gourmand' ); ?></span><i class="gourmand-icon-search-5"></i></button>
        </div>
    </fieldset>
</form>
