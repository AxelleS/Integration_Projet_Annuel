<?php

class sitemapGenerator {

    public static function generateSitemap() {

        $dirPath = 'xml';
        $filePath = '../../sitemap.xml';
        $urlData = array();
        $urlPath = "/"."escaperoom"."/";
        //Take all room's URL
        $roomContent = new Room();
        $responseRoom = $roomContent->select();
        foreach($responseRoom->fetchAll() as $key=>$content) {
            array_push($urlData, $urlPath.$content['id']);
        }

        //Take all URL in the $urlData
        array_push($urlData, "/contact");
        array_push($urlData, "/se-connecter");
        array_push($urlData, "/s-inscrire");
        array_push($urlData, "/reserver");
        array_push($urlData, "/faq");

        // echo "coucou";
        // echo "<pre>";
        // print_r($urlData);
        // echo "</pre>";
        // die;
        

        // Generate <?xml version="1.0" encoding="utf-8"
        $xmlDoc = new DOMDocument('1.0', 'utf-8');
        // Generate <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        $urlset_node = $xmlDoc->createElementNS("http://www.sitemaps.org/schemas/sitemap/0.9", 'urlset');
        $xmlDoc->appendChild($urlset_node);

        foreach($urlData as $url){
            $url_node = $xmlDoc->createElement('url');
            $urlset_node->appendChild($url_node);
            $loc_node = $xmlDoc->createElement('loc', $url);
            $url_node->appendChild($loc_node);

            // Code XML du sitemap
            $sitemap_xml_code = $xmlDoc->saveXml();

            // Ecriture du code XML du sitemap dans un fichier
            file_put_contents($filePath, $sitemap_xml_code);
        }


        $xmlDoc->save($filePath);
    }

}

?>