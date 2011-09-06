<ul class="chapters">
	<?foreach($chapters as $chapter):?>
	<li>
		<a href="#">
			<span class="title"><?=$chapter->title?></span>
			<span class="description"><?=$chapter->description?></span>
		</a>
	</li>
	<?endforeach?>
</ul>