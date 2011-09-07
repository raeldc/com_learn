<ul class="chapters">
	<?foreach($chapters as $chapter):?>
	<li<?=($chapter->id==$state->chapter) ? ' class="active"': '';?>>
		<a href="<?=@route('page='.$chapter->id.'-1')?>">
			<span class="title"><?=$chapter->title?></span>
			<span class="description"><?=$chapter->description?></span>
		</a>
	</li>
	<?endforeach?>
</ul>