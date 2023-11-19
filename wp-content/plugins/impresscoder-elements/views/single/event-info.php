<?php 
$address = get_post_meta(get_the_ID(), 'address', true);
$phone = get_post_meta(get_the_ID(), 'phone', true);
$email = get_post_meta(get_the_ID(), 'email', true);
?>
<address><?php echo wp_kses_post($address) ?></address>