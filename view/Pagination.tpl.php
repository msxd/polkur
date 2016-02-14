<div class="col-sm-6 col-sm-push-3">
	<nav>
		<ul class="pagination">
			<?if($cnt>1)for($i = 0;$i<$cnt;$i++):?>
				<?$p = $i+1;?>
			<li <?=($i==$cur)?' class="active"':'';?>><a href="<?=($i!=$cur)?"?page={$p}":'#';?>"><?=$i+1;?> <span class="sr-only">(current)</span></a></li>
			<?endfor;?>
		</ul>
	</nav>
</div>
