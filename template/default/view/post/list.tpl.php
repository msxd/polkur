<?php foreach($posts as $post){?>
    <div class="col-lg-offset-4 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $post->title?></div>
            <div class="panel-body">
                <?php echo $post->text?>
            </div>
            <div class="panel-footer ">
<!--                <div>-->
                <a class="btn btn-default  pull-right" href="<?php echo $post->view_link?>" role="button">View Comments</a>
<!--                </div>-->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php } ?>