$(document).on('ready',function(){
   $('.post-info').on('click','span.edit-comment',function(e){

       target = e.target;

       user = $(target).data('user');
       comment_id = $(target).data('comment_id');
       comment = $(target).data('comment');


       $('#comment-form').find('input[name="user"]').val(user);
       $('#comment-form').find('input[name="comment_id"]').val(comment_id);
       $('#comment-form').find('textarea[name="comment"]').val(comment);

   })
});