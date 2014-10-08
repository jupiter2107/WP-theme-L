<?php
/* --------------------------------------------------
        comments.php
        Blog Theme "L"
-------------------------------------------------- */
?>

                <div id="comment">
                  <?php if( have_comments() ): ?>
                    <h3>Comment</h3>
                    <ol class="comment-list media-list">
                      <?php wp_list_comments('avator_size=40'); ?>
                    </ol>
                  <?php endif; ?>
                </div>
                <?php $args = array(
                  'title_reply'  => 'Leave a Reply',
                  'label_submit' => 'Submit a Comment',                  
                  );
                comment_form( $args ); ?>