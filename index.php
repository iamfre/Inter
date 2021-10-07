<?php

function image_resize($file)
{
	// Создаем новое изображение
	$src_img = ImageCreateFromJpeg($file);
	// Получение размера изображения
	$size = GetImageSize($file);
	$src_width = $size[0];
	$src_height = $size[1];

	// переменные с нужными размерами изображения
	$my_width = 200;
	$my_height = 100;

	// Создание нового потока GD изображения, сохранение и вывод изображения.
	$new_img = ImageCreateTrueColor($my_width, $my_height);
	ImageCopyResampled($new_img, $src_img, 0, 0, 0, 0, $my_width, $my_height, $src_width, $src_height);
	header('Content-Type: image/jpeg'); // для вывода изображения
	imagejpeg($new_img, "banner.jpg"); // сохранение нового изображения
	imagejpeg($new_img); // вывод изображения
	ImageDestroy($new_img); // освобождает память, уничтожая изображение (вроде, как с PHP 8.0 больше не имеет смысла)
}
image_resize("image.png");
