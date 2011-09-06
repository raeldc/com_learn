<ul class="pages">
	<?foreach($pages as $page):?>
	<li>
		<a href="#">
			<span class="title"><?=$page->title?></span>
			<span class="description"><?=$page->description?></span>
		</a>
	</li>
	<?endforeach?>
</ul>