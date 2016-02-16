    <div class="col-lg-offset-4 col-lg-8">
        <div class="panel panel-default post-info">
            <div class="panel-heading"><?php echo $post->title?></div>
            <div class="panel-body">
                <?php echo $post->text?>
            </div>
            <div class="panel-footer ">
                <?php var_dump(get_defined_vars())?>

                <?php foreach($comments as $comment){?>
                    <div class="comment">
                        <div class="col-xs-12">
                        User : <?php echo $comment->user?>
                            <span class="pull-right">Date : <?php echo $comment->create_time?><?php if($comment->editable) { ?><span data-user="<?php echo $comment->user?>" data-comment="<?php echo $comment->comment?>" data-comment_id="<?php echo $comment->comment_id?>"  class="glyphicon glyphicon-pencil edit-comment"></span><?php } ?></span>
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