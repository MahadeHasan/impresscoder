<!-- Button trigger modal -->
<a type="button" id="citikidRegisterModalLink" class="visually-hidden" data-bs-toggle="modal" href="#citikidRegisterModal">
<?php esc_html_e('Launch register modal', 'impresscoder') ?>
</a>

<!-- Modal -->
<div class="modal fade" id="citikidRegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="citikidRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="citikidRegisterModalLabel"><?php esc_html_e('Create an Account', 'impresscoder') ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Close', 'impresscoder') ?>"></button>
      </div>
      <div class="modal-body">
        <?php do_action('control_listing_user_register') ?>
      </div>      
      <div class="modal-footer">
        <a class="btn btn-sm btn-link text-dark" data-bs-toggle="modal" href="#citikidLoginModal"><?php esc_html_e('Back to login', 'impresscoder') ?></a>
        <a  class="btn btn-sm btn-secondary" data-bs-dismiss="modal"  href="#"><?php esc_html_e('Close', 'impresscoder') ?></a>        
      </div>
    </div>
  </div>
</div>
