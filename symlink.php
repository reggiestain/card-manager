<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/cards/storage/app/public';
$linkFolder   = $_SERVER['DOCUMENT_ROOT'].'/storage';
symlink($targetFolder, $linkFolder);
echo "success";
