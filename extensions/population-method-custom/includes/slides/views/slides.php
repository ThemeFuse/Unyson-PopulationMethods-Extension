<?php if (!defined('FW')) die('Forbidden');
/**
 * @var string $id
 * @var array  $option
 * @var array  $data
 * @var array  $thumb_size
 * @var array  $values
 * @var string $type
 * @var array  $slides_options
 * @var array  $multimedia_type
 * @var array  $attr
 */
?>
<div class="fw-option fw-option-type-<?php echo esc_attr($type); ?>" <?php echo fw_attr_to_html($attr); ?>
     data-option="<?php echo fw_htmlspecialchars(json_encode(array('option' => $option, 'data' => $data, 'id' => $id))) ?>">
	<ul class="thumbs-wrapper">
		<?php if (isset($values)): ?>
			<?php foreach ($values as $key => $value): ?>
				<?php if (in_array($value['multimedia']['selected'], $multimedia_type)): ?>
					<li data-order="<?php echo esc_attr($key) ?>">
						<div class="delete-btn"></div>
						<img src="<?php echo esc_attr($value['thumb']) ?>" height="<?php echo esc_attr($thumb_size['height']) ?>"
						     width="<?php echo esc_attr($thumb_size['width']) ?>"/>
						<?php echo fw()->backend->option_type('hidden')->render('thumb', array('value' => $value['thumb']), array(
							'id_prefix' => $data['id_prefix'] . $id . '-' . $key . '-',
							'name_prefix' => $data['name_prefix'] . '[' . $id . '][' . $key . ']',
						));?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
			<li class="sortable-false add-new-btn">
				<div>
					<p><?php _e('Add New', 'fw') ?></p>
				</div>
			</li>
		<?php endif; ?>
		<div class="fw-clear"></div>
	</ul>
	<div class="fw-slides-options">
		<div class="fw-slides-wrapper">
			<?php if (isset($values)): ?>
				<?php foreach ($values as $key => $value): ?>
					<?php if (in_array($value['multimedia']['selected'], $multimedia_type)): ?>

						<?php $options = fw()->backend->render_options($slides_options, $value, array(
							'id_prefix' => $data['id_prefix'] . $id . '-' . $key . '-',
							'name_prefix' => $data['name_prefix'] . '[' . $id . '][' . $key . ']',
						));?>
						<div class="fw-slide slide-<?php echo esc_attr($key) ?>" data-order="<?php echo esc_attr($key) ?>"
						     data-default-html="<?php echo fw_htmlspecialchars($options) ?>">
							<?php echo $options; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class='buttons-wrapper'>
			<button class='fw-add-slide button-primary button-large'><?php _e('Add Slide', 'fw') ?></button>
			<button
				class='fw-edit-slide edit-buttons button-primary button-large'><?php _e('Save Changes', 'fw') ?></button>
			<button class='fw-cancel-edit edit-buttons button'><?php _e('Cancel', 'fw') ?></button>
		</div>

	</div>
</div>
