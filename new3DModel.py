from poster.encode import multipart_encode               # "easy_install poster" to install poster module
from poster.streaminghttp import register_openers
import urllib2, json, base64
 
username="John"                         # your threecanDy username
password="TfjsnUF887"                   # your password
modelName="Supercar"                    # threecanDy 3D model name
description="This is my favorite car"   # 3D model description
category="3"                            # Category ID - see API browsable endpoint for details
tags="cars,sport cars,tuning"           # tags comma separated
path="./3Dmodels/car/"                  # path to your folder files 
picture="thumbnail.jpg"                 # thumbail of the 3D model	
file1="body.3ds"                        # 3D file
file2="wheels.obj"                      # Another 3D file
file3="textures.png"                    # unwrap texture file

register_openers()

data = {
    'name': modelName,
    'description': description,
    'category': category,
    'tags': tags,
    'picture': open(path+picture),
    'file1': open(path+file1),
    'file2': open(path+file2),
    'file3': open(path+file3)
}
 
datagen, headers = multipart_encode(data)

request = urllib2.Request("http://www.threecandy/api/newmodel/", datagen, headers)
base64string = base64.encodestring('%s:%s' % (username, password))[:-1]
request.add_header("Authorization", "Basic %s" % base64string)

print urllib2.urlopen(request).read()