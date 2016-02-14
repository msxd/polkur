<div class="container">


	<? foreach ($variables as $var): ?>
		<div class="row">
			<div class="col-sm-6" style="border:1px solid black;margin:10px 0;">

				<h2><?= $var->getVar('title'); ?></h2>


				<div class="col-sm-12">
					<p>Created by <?= $var->getVar('getUserName()'); ?> at <?= $var->getVar('create_time'); ?> </p>
				</div>
				<div class="col-sm-12">
					<?=$var->getVar('body');?>
				</div>

				<div class="pull-right"><a href="?get_post_id=<?=$var->getVar('id'); ?>"><?
						$count = $var->getCommentsCnt($var->getVar('id'));
						echo $count." comments";?></a></div>
			</div>
		</div>
	<? endforeach; ?>


</div>
