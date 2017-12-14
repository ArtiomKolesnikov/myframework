<?php
return [
    'credentials' => [
        'key' => getenv('S3_KEY'),
        'secret' => getenv('S3_SECRET'),
    ],
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'ACL'    => getenv('S3_ACL')
];