<?php

class sitemapGenerator {

    public static function generateSitemap() {

        $dirPath = 'xml';
        $filePath = '/files/sitemap.xml';
        $urlData = array();
        $urlPath = "escaperoom"."/";
        $domain = "https://".$_SERVER["SERVER_NAME"];
        //Take all room's URL
        $roomContent = new Room();
        $responseRoom = $roomContent->select();
        foreach($responseRoom->fetchAll() as $key=>$content) {
            array_push($urlData, $urlPath.$content['id']);
        }

        //Take all URL in the $urlData
        array_push($urlData, "contact");
        array_push($urlData, "se-connecter");
        array_push($urlData, "s-inscrire");
        array_push($urlData, "reserver");
        array_push($urlData, "faq");       

        // Generate <?xml version="1.0" encoding="utf-8"
        $xmlDoc = new DOMDocument('1.0', 'utf-8');
        // Generate <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        $urlset_node = $xmlDoc->createElementNS("http://www.sitemaps.org/schemas/sitemap/0.9", 'urlset');
        $xmlDoc->appendChild($urlset_node);

        foreach($urlData as $url){
            $url_node = $xmlDoc->createElement('url');
            $urlset_node->appendChild($url_node);
            $loc_node = $xmlDoc->createElement('loc', $domain.DIRNAME.$url);
            $url_node->appendChild($loc_node);

            // code xml
            $sitemap_xml_code = $xmlDoc->saveXml();

            // save in the sitemap.xml file
            file_put_contents($filePath, $sitemap_xml_code);
        }


        $xmlDoc->save($filePath);
    }

}

?>
