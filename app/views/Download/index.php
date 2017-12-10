<?php
/*Amazon*/
use Aws\S3\S3Client;
require ROOT . '/vendor/autoload.php';
$config = require APP . '/config/s3.php';
$s3 = S3Client::factory([
    'version' => 'latest',
    'key' => $config['key'],
    'secret' => $config['secret'],
    'region' => $config['region']
]);

if(isset($_FILES['file']))
{
    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $extension = strtolower(end(explode('.',$name)));
    d($file);

    $key = md5(uniqid());
    $tmp_file_name = "{$key}.{$extension}";
    $tmp_file_path = "files/{$tmp_file_name}";
//    move_uploaded_file($tmp_name,$tmp_file_path);

    try{
        $s3->putObject([
            'Bucket' => $config['bucket'],
            'Key' => $name,
            'Body' => fopen($file['tmp_name'],'rb'),
            'ACL' => 'public-read'
        ]);

//        unlink($tmp_file_path);

    }catch (\Aws\S3\Exception\S3Exception $e){
        dd($e);
    }

}
?>

<form action="download" enctype="multipart/form-data" method="post">
    <input type="file" name="file">
    <input type="submit" value="download">
</form>