<?php
/*Amazon*/

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

require ROOT . '/vendor/autoload.php';

$config = require APP . '/config/s3.php';

if(isset($_FILES['file']))
{
    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => $config['region'],
        'credentials' => $config['credentials']
    ]);
    try {
        $s3->putObject([
            'Bucket' => $config['bucket'],
            'Key'    => $name,
            'Body'   => file_get_contents($tmp_name),
            'ACL'    => $config['ACL'],
        ]);
    } catch (S3Exception $e) {
        echo "There was an error uploading the file.\n";
    }


}
?>
<a href="/" class="btn btn-primary">ГЛАВНАЯ</a>
<form action="download" enctype="multipart/form-data" method="post">
    <input type="file" name="file" >
    <input type="submit" value="download"  class="btn btn-primary">
</form>