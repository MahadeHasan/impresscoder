<?php
$title = get_post_meta(get_the_ID(), 'hire_me_title', true);
$content = get_post_meta(get_the_ID(), 'hire_me_content', true);
if (empty($content)) return;
?>
<h3 class="mt-50 mb-30"><?php echo esc_attr($title) ?></h3>
<div class="text-lg"><?php echo wpautop($content) ?></div>