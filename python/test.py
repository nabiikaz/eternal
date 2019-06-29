
import functions
import os
#create style ,javascript and images directories

if os.path.isdir("style") == False : 
        os.mkdir("style")

if os.path.isdir("javascript") == False : 
        os.mkdir("javascript")

if os.path.isdir("images") == False : 
        os.mkdir("images")

if os.path.isdir("other") == False : 
    os.mkdir("other")

url = raw_input("Enter the url of the file you wish to download and process\n")

filename = functions.download_file(url)

functions.get_fileslinks(functions.download_file,filename)

