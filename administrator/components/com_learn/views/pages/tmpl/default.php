<ul class="pages">
	<?foreach($pages as $page):?>
	<li<?=($page->id==$state->page) ? ' class="active"': '';?>>
		<a href="<?=@route('page='.$page->id)?>">
			<span class="title"><?=$page->title?></span>
			<span class="description"><?=$page->description?></span>
		</a>
	</li>
	<?endforeach?>
</ul>