<?php

/*
 * Функция по чтению и анализу директории.
 * Функция принимать один параметр - путь до папки. По умолчанию - текущая директория.
 * Результат работы функции - массив директорий и файлов, содержащий их анализ.
 * Если директория переданная в функцию не существует или не может быть открыта - возвращает false.
 */

function getDirectoryStatus(string $path = '.')
{
	$separator = mb_substr($path, -1);
	$path  = (in_array($separator, ['/', '\\'])) ? $path : $path.DIRECTORY_SEPARATOR;

	if (!is_dir($path))
	{
		return false;
	}
	if (($dir = opendir($path)) == false)
	{
		return false;
	}

	$files = [
		'dirs' => [],
		'files' => [],
	];

	while (($file = readdir($dir)) !== false)
	{
		if (in_array($file, ['.', '..']))
		{
			continue;
		}

		$pathToFile = $path.$file; // путь до файла относительно рабочей директории
		if (is_dir($pathToFile))
		{
			$files['dirs'][$file] = getFileStatus($pathToFile);
		}
		elseif (is_file($pathToFile))
		{
			$files['files'][$file] = getFileStatus($pathToFile, false);
		}
	}

	closedir($dir);
	return $files;
}

function getFileStatus(string $path, bool $isDir = true): array
{
	$analysis = [
		'is_readable' => is_readable($path),
		'is_writable' => is_writable($path),
	];
	if (!$isDir)
	{
		$analysis['size'] = filesize($path);
	}

	return $analysis;
}

