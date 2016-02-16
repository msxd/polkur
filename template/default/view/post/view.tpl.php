    <div class="col-lg-offset-4 col-lg-8">
        <div class="panel panel-default post-info">
            <div class="panel-heading"><?php echo $post->title?></div>
            <div class="panel-body">
                <?php echo $post->text?>
            </div>
            <div class="panel-footer ">
                <?php foreach($comments as $comment){?>
                    <div class="comment">
                        <div class="col-xs-12">
                        <?php echo $comment->user?>
                            <span class="pull-right"><?php echo $comment->create_time?></span>
                        </div>
                        <div class="col-xs-12 comment-content">
                        <?php echo $comment->comment?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php }?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>