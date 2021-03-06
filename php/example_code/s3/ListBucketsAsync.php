<?php
/**
 * Copyright 2010-2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *
 * ABOUT THIS PHP SAMPLE: This sample is part of the SDK for PHP Developer Guide topic at
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/getting-started/basic-usage.html
 *
 */

require 'vendor/autoload.php';

use Aws\S3\S3Client;

/**
 * List your Amazon S3 buckets. Asynchronous Requests
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

//Create a S3Client
$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'us-east-2',
    'version' => 'latest'
]);

// Use an Aws\Sdk class to create the S3Client object.
$s3Client = $sdk->createS3();

//Listing all S3 Bucket
$CompleteSynchronously = $s3Client->listBucketsAsync();
// Block until the result is ready.
$CompleteSynchronously = $CompleteSynchronously->wait();

$promise = $s3Client->listBucketsAsync();
$promise
    ->then(function ($result) {
        echo 'Got a result: ' . var_export($result, true);
    })
    ->otherwise(function ($reason) {
        echo 'Encountered an error: ' . $reason->getMessage();
    });
}
 

//snippet-comment:[These are tags for the AWS doc team's sample catalog. Do not remove.]
//snippet-sourcedescription:[ListBucketsAsync.php demonstrates how to asynchronously list your Amazon S3 buckets.]
//snippet-keyword:[PHP]
//snippet-keyword:[AWS SDK for PHP v3]
//snippet-keyword:[Code Sample]
//snippet-keyword:[Amazon S3]
//snippet-service:[s3]
//snippet-sourcetype:[full-example]
//snippet-sourcedate:[2018-09-20]
//snippet-sourceauthor:[jschwarzwalder (AWS)]

