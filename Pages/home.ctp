<div class="container-site">
	<div class="rows">
				<?php
				if(!empty($search_news)) {

				  $i = 0;
				  foreach ($search_news as $news) {

					$i++;

					if($i > 3) {
					  break;
					}
					
					echo '<div class="col-md-4">';
						echo '<div class="box">';
										echo '<div class="title-news">'.cut($news['News']['title'], 15).'</div>';
										echo '<div class="desc-news">';
										echo $this->Text->truncate($news['News']['content'], 350, array('ellipsis' => '...', 'html' => true));
										echo '</div>';
										echo '<a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'" class="none-txt"><div class="button-news">'.$Lang->get('NEWS__READ_MORE').'</div></a>';
						echo '</div>';
					echo '</div>';
					}
				} else {
				  echo '<div class="alert alert-danger">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>';
				}
				?>
	</div>
</div>	
<div class="clear"></div>



<?= $Module->loadModules('home') ?>
 