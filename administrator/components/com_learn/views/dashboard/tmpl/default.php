<script src="media://com_learn/js/scrollable.js" />
<style src="media://com_learn/css/default.css" />

<div id="chapter-box" class="-scrollable">
	<?=@template('com://admin/learn.view.chapters.default')?>
</div>

<div id="pages-box" class="-scrollable">
	<?=@template('com://admin/learn.view.pages.default')?>
</div>

<div id="page-box" class="-scrollable">
	<?=KFactory::get('com://admin/learn.controller.page')->page($state->page)->display();?>
</div>