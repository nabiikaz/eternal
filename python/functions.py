import re # Regular Expression (expression reguliere)
import urlparse
import httplib
import os


def download_file(url):
    #   site="www.eurosport.com"
    # URL absolu de la ressource a obtenir
    #   URL="https://www.eurosport.com/football/van-dijk-dismisses-talk-of-title-despite-reds-leading-the-way_sto7062094/story.shtml"

    site = urlparse.urlparse(url).netloc
    print "site"+site
    print "url"+url




    # filename of the local file in which we are going to save the remote file in :P)
    filename = get_filename(url)
    
    file_extension = os.path.splitext(filename)[1]

    if file_extension == ".css":
        filename = "style/"+filename
    elif file_extension == ".js":
        filename = "javascript/"+filename
    elif file_extension in [".png",".jpg"]:
        filename = "images/"+filename
    elif file_extension != ".html":
        filename = "other/"+filename



    
    # intialisation d'une connexion HTTP
    ConnexionHTTP = httplib.HTTPSConnection(site)
    # envoie d'une commande GET
    ConnexionHTTP.request("GET", url)
    # obtention de la ressource
    Reponse = ConnexionHTTP.getresponse()
    Content_Length=Reponse.length
    print "Taille reponse = ",Content_Length

    # Ouvrir un fichier en mode d'ecriture index.html
    Fichier_Pour_enregistrer_le_resultat=open(filename,"w")

    # Lecture du contenu de la ressource
    Partie_recu=Reponse.read(1024)

    # len(Partie_recu) == nombre de caracteres dans Partie_recu
    # Tanque le nombre de cracateres recus est different de 0
    while len(Partie_recu)!=0:
        # Ecrir la partie recu sur le fichier "index.html"
        Fichier_Pour_enregistrer_le_resultat.write(Partie_recu)

        # Continue de recevoir les donnees transmis par le serveur http
        Partie_recu=Reponse.read(1024)
        # Afficher la partie recu
        #print Partie_recu,
    # Alternativement Reponse.read() peut etre utiliser directement (au lieu de recevoir la reponse dans des morceaux de 1024octets) pour recevoir la ressource complete
    # Mais la concatenation de toute une ressource dans une seule sequence ralenti l'execution du programme  

    ConnexionHTTP.close()
    # Cloturer le fichier
    Fichier_Pour_enregistrer_le_resultat.close()

    return filename



# this function extracts links from the html file and apply a function to each one of them 
def get_fileslinks(function,filename="index.html"):
    file = open(filename)
    file_content = ""
    for line in file:
            file_content += line
    
    file.close()

    matches=re.findall('"[^"]+\.css"|"[^"]+\.js"|"[^"]+\.png"|"[^"]+\.jpg"',file_content,re.M) # re.M == recherche Multilignes
    
    # matches contiendra les chaines de caracteres correspondants a l'expression reguliere '"[^"]+\.css"|"[^"]+\.js"|"[^"]+\.png"'
    if len(matches)==0:
       print "this file has 0 links."
    else:
        for resultat in matches:
            if len(urlparse.urlparse(resultat.replace('"','')).netloc) != 0:
                function(resultat.replace('"',''))
                print "download of : " + resultat + " is Completed."
    


    
    






# this function returns the file name from url 
def get_filename(url):
    path = urlparse.urlparse(url).path
    filename = os.path.basename(path)
    #check if url has filename if not then just return index.html
    if len(filename) == 0 :
        return "index.html"
    else:
        return filename
    


#


# Download_file is a function that downloads a specified file from an url and save it into specified directory 


