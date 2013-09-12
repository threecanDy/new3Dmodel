<?php
 
/* Check cURL installation in php.ini file */

$username="John";                         # your threecanDy username
$password="TfjsnUF887";                   # your password
$modelName="Supercar";                    # threecanDy 3D model name
$description="This is my favorite car";   # 3D model description
$category="3";                            # Category ID - see API browsable endpoint for details
$tags="cars,sport cars,tuning";           # tags comma separated
$path="./3Dmodels/car/";                  # path to your folder files 
$picture="thumbnail.jpg";                 # thumbail of the 3D model  
$file1="body.3ds";                        # 3D file
$file2="wheels.obj";                      # Another 3D file
$file3="textures.png";                    # unwrap texture file
 
$data = array(
    "name"        => $modelName,
    "description" => $description,
    "category"    => $category,
    "tags"        => $tags,
    "picture"     => "@".$path.$picture,
    "file1"       => "@".$path.$file1,
    "file2"       => "@".$path.$file2,
    "file3"       => "@".$path.$file3
);
 
$cInit = curl_init();
curl_setopt_array($cInit, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL            => "http://www.threecandy/api/newmodel/",
    CURLOPT_POST           => 1,
    CURLOPT_HTTPAUTH       => CURLAUTH_ANY
    CURLOPT_USERPWD        => "$username:$password",
    CURLOPT_POSTFIELDS     => $data
));
 
$response = curl_exec($cInit);
$resultStatus = curl_getinfo($cInit);
curl_close($cInit);

if($resultStatus['http_code'] == 200) {
    echo $response;
} else {
    echo 'Call Failed '.print_r($resultStatus);                         
}

?>