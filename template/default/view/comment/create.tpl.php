<div class="col-lg-offset-4 col-lg-8">
    <form action="<?php echo $action?>" method="post" id="comment-form">
    <div class="panel panel-default post-info">
            <div class="panel-heading"><input type="text" class="form-control" name="user" placeholder="Name">
                <?php if(isset($errors['user'])) {?> <div class="alert alert-danger"><?php echo $errors['user']?></div> <?php } ?>
            </div>
            <div class="panel-body">
                <textarea class="form-control" rows="6" name="comment" placeholder="Comment"></textarea>
                <?php if(isset($errors['comment'])) {?> <div class="alert alert-danger"><?php echo $errors['comment']?></div> <?php } ?>
            </div>
            <div class="panel-footer ">
                <input type="submit" class="btn btn-success pull-right" value="Left a comment">
                <div class="clearfix"></div>
            </div>
        <input type="hidden" name="comment_id">
    </div>
    </form>

</div>