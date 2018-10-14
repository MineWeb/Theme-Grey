<div class="container">
	<div class="rows mt20">
		<div class="col-md-12">
			<div class="box pad-20">
				<div class="titre-article"><?= $news['News']['title'] ?></div>
				<div class="article-text">
					<?= $news['News']['content'] ?>
				</div>
				<div class="article-footer">
					<div class="pull-right"><i class="fa fa-user"></i> <?= $news['News']['author'] ?> <i class="fa fa-calendar pad-l"></i> <?= $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']); ?></div>
					<div class="pull-left like_s">
						<span id="f-like">
							<button id="<?= $news['News']['id'] ?>" type="button" class="like<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-o-up color-blue"></i></button>
						</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>				
	

	<div class="rows mt20">
		<div class="col-md-12 m-hfooter">
			<div class="box pad-20">	
				<div class="titre-article"><?= count($news['Comment']).' '.$Lang->get('NEWS__COMMENTS_TITLE') ?></div>
            <?php
            $i = 0;
            $count = $news['Comment'];
            if($count > 0) {

              foreach ($news['Comment'] as $comment) {
                $i++;
				echo '<div class="com-content">';
                echo '<div class="row comment';
                echo ($i == $count) ? ' last' : '';
                echo '" id="comment-'.$comment['id'].'" style="margin-right: 0px;margin-left: 0px;">';
                  echo '<div class="left">';
                      echo '<img src="'.$this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $comment['author'], '150')).'" class="avatar-com" alt="">';
				  echo '</div>';
				  echo '<div class="com_user">';
					echo '<div class="com_pseudo">'.$comment['author'].'</div>';
				  
                    echo '<div class="com">'.before_display($comment['content']).'</div>';
					echo '</div>';
                    if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['author']) {
                      echo '<p class="reply"><a id="'.$comment['id'].'" class="text-danger comment-delete" href="#"><i class="fa fa-times"></i> '.$Lang->get('GLOBAL__DELETE').'</a></p>';
                    }
                echo '</div>';
				echo '<div class="clear"></div>';
				echo '</div>';

              }

            }

            ?>
          </div>

          <?php if($Permissions->can('COMMENT_NEWS')) { ?>
            <div id="comment-form">
              <div id="form-comment-fade-out">
                <h4><?= $Lang->get('NEWS__COMMENT_TITLE') ?> :</h4>
                <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'news', 'action' => 'add_comment')) ?>" data-callback-function="addcomment" data-success-msg="false">
                  <input name="news_id" value="<?= $news['News']['id'] ?>" type="hidden">
                  <div class="form-group">
                      <textarea name="content" class="form-control" rows="3"></textarea>
                  </div>
                 <button type="submit" class="pull-right button-news button-article"><i class="fa fa-comment-o"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
				 <div class="clear"></div>
                </form>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
</div>
	
    <?= $Module->loadModules('news') ?>


<script>
    function addcomment(data) {
        var d = new Date();
        var comment = '';
        comment += '<div class="row comment">';
          comment += '<div class="left">';
              comment += '<img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $user['pseudo'], '150')) ?>" class="avatar-com" alt="">';
          comment += '</div>';
          comment += '<div class="com_user">';
            comment += '<div class="com_pseudo"><?= $user['pseudo'] ?></div>';
            comment += '<div class="com_date"><i class="fa fa-clock-o"></i> '+d.getHours()+'h'+d.getMinutes()+'</div>';
            comment += '<div class="com">'+data['content']+'</div>';
          comment += '</div>';
        comment += '</div>';
        $('.add-comment').hide().html(comment).fadeIn(1500);
        $('#form-comment-fade-out').slideUp(1500);
    }
     $(".comment-delete").click(function(e) {
       e.preventDefault();
        comment_delete(this);
    });

    function comment_delete(e) {
        var inputs = {};
        var id = $(e).attr("id");
        inputs["id"] = id;
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.post("<?= $this->Html->url(array('controller' => 'news', 'action' => 'ajax_comment_delete')) ?>", inputs, function(data) {
          if(data == 'true') {
            $('#comment-'+id).slideUp(500);
          } else {
            console.log(data);
          }
        });
    }
</script>
</div>