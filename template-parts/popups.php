<?php global $aecode_options; ?>
<!--Contact me-->
<div class="modal-wrapper">

  <div class="contact-form" id="home-form">
    <span class="contact-form__close">x</span>

    <div class="contact-form__info">
      <h2 class="contact-form__title">Контакты</h2>
      <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-adress"></span><?php echo ($aecode_options['adress-contact']) ? $aecode_options['adress-contact'] : ''; ?></p>
      <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-email"></span><?php echo ($aecode_options['mail-contact']) ? $aecode_options['mail-contact'] : ''; ?></p>
      <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-skype"></span><?php echo ($aecode_options['skype-contact']) ? $aecode_options['skype-contact'] : ''; ?></p>
      <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-phone"></span><?php echo ($aecode_options['phone-contact']) ? $aecode_options['phone-contact'] : ''; ?></p>
    </div>
		<?php if ( $aecode_options['home-contact-form'] ) : ?>
      <div class="contact-form__fields">
				<?php echo do_shortcode( $aecode_options['home-contact-form'] ); ?>
      </div>
		<?php endif; ?>
    <div class="bg-dots bg-dots-top">
      <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="bg-dots bg-dots-bottom">
      <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
  </div>
</div>
