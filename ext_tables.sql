CREATE TABLE tt_content (
	tx_uploadcare_widget text,
	tx_uploadcare_resize tinyint(1),
	tx_uploadcare_resize_width int(11),
	tx_uploadcare_resize_height int(11),
  tx_uploadcare_scale_crop tinyint(1),
  tx_uploadcare_scale_crop_width int(11),
  tx_uploadcare_scale_crop_height int(11),	
  tx_uploadcare_scale_crop_center tinyint(1),
  tx_uploadcare_flip tinyint(1),
  tx_uploadcare_grayscale tinyint(1),
  tx_uploadcare_invert tinyint(1),
  tx_uploadcare_mirror tinyint(1),
  tx_uploadcare_stretch tinyint(1)
);
