<?php 

function createThumbnail($imagePath, $cropWidth = 100, $cropHeight = 100) {

	$imagick = new imagick($imagePath);
	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	// if ($width > $height) {
	// 	$imagick->thumbnailImage(0, $cropHeight);
	// }
	// else {
	// 	$imagick->thumbnailImage($cropWidth, 0);
	// }

	$imagick->thumbnailImage($cropWidth, $cropHeight);

	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	$centerX = round($width / 2);
	$centerY = round($height / 2);

	$cropWidthHalf = round($cropWidth / 2);
	$cropHeightHalf = round($cropHeight / 2);

	$startX = max(0, $centerX - $cropWidthHalf);
	$startY = max(0, $centerY - $cropHeightHalf);

	$imagick->cropImage($cropWidth, $cropHeight, $startX, $startY);

	return $imagick;


}


 ?>