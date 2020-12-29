<?php

require_once 'directory_status.php';
require_once '..\assert_equals.php';

// при первом запуске существует файл .gikeep, сохраняющий струтуру файлов для гита
$gitKeepFile = './Empty Folder/.gitkeep';
if (file_exists($gitKeepFile))
{
	unlink($gitKeepFile);
}

$result = false;

assertEquals($result, getDirectoryStatus('./DoesNotExist'), 'folder does not exist');

$result = [
	'dirs' => [],
	'files' => [],
];

assertEquals($result, getDirectoryStatus('./Empty Folder'), 'folder is empty');

$result = [
	'dirs' => [
		'Folder 1' => [
			'is_readable' => true,
			'is_writable' => true,
		],
		'Folder 2' => [
			'is_readable' => true,
			'is_writable' => false,
		],
	],
	'files' => [
		'file_1' => [
			'is_readable' => true,
			'is_writable' => true,
			'size' => 11,
		],
		'file_2' => [
			'is_readable' => true,
			'is_writable' => false,
			'size' => 0,
		],
	],
];

[$dirPerms, $filePerms] = [fileperms("./Test Folder/Folder 2"), fileperms("./Test Folder/file_2")];

// изменение режима доступа: папка и файл доступны только для чтения
chmod("./Test Folder/Folder 2", 0444);
chmod("./Test Folder/file_2", 0444);

assertEquals($result, getDirectoryStatus('./Test Folder'), 'folder without separator at the end of the path processed correctly');
assertEquals($result, getDirectoryStatus('./Test Folder/'), 'folder with separator at the end of the path processed correctly');

// возвращение исходного режима доступа для папки и файла
chmod("./Test Folder/Folder 2", $dirPerms);
chmod("./Test Folder/file_2", $filePerms);
