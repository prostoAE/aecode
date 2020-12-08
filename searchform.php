<form class="search-form" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<label><input class="search-form__input" type="text" placeholder="Поиск" value="<?php echo get_search_query() ?>" name="s" id="s"></label>
	<label><input class="search-form__btn" type="submit" value=""></label>
</form>
