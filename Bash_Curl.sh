#!/bin/bash

username="John"                         # your threecanDy username
password="TfjsnUF887"                   # your password
modelName="Supercar"                    # threecanDy 3D model name
description="This is my favorite car"   # 3D model description
category="3"                            # Category ID - see API browsable endpoint for details
tags="cars,sport cars,tuning"           # tags comma separated
path="./3Dmodels/car/"                  # path to your folder files 
picture="thumbnail.jpg"                 # thumbail of the 3D model
path_pict=${path}${picture}		
file1="body.3ds"                        # 3D file
file2="wheels.obj"                      # Another 3D file
file3="textures.png"                    # unwrap texture file
path_f1=${path}${file1}
path_f2=${path}${file2}
path_f3=${path}${file3}


curl -i -X POST http://www.threecandy/api/newmodel/ -H "Content-Type: multipart/form-data" -u ${username}:${password} -F "picture=@${path_pict}" -F "file1=@${path_f1}" -F "file2=@${path_f2}" -F "file3=@${path_f3}" -F "name=${modelName}" -F "category=${category}" -F "description=${description}" -F "tags=${tags}"