<style src="media://com_learn/css/default.css" />

<div id="chapter-box">
	<?=@template('com://admin/learn.view.chapters.default')?>
</div>

<div id="pages-box">
	<?=@template('com://admin/learn.view.pages.default')?>
</div>

<div id="page-box">
	<?=KFactory::get('com://admin/learn.controller.page')->page($state->page)->display();?>
</div>

<div id="tips-box">

</div>