<?php

class sitemapGenerator {
    private $dirPath;
    private $filePath;
    private $urlData = array();
    private $urlPath;

    public function __construct($fileName, $dirPath = "xml") {
        $this->filePath = '../../sitemap.xml';
        $this->receiveData();
    }

    public function receiveData() {
        //Take all room's URL
        $this->urlPath = "/"."escaperoom"."/";
        $roomContent = new Room();
        $responseRoom = $roomContent->select();
        foreach($responseRoom->fetchAll() as $key=>$content) {
            array_push($this->urlData, $this->urlPath.$content['id']);
        }

        //Take all URL in the $this->urlData
        array_push($this->urlData, "/contact");
        array_push($this->urlData, "/se-connecter");
        array_push($this->urlData, "/s-inscrire");
        array_push($this->urlData, "/reserver");
        array_push($this->urlData, "/faq");
        $this->generateSitemap();
    }

    public function generateSitemap() {
        // Génère <?xml version="1.0" encoding="utf-8"
        $xmlDoc = new DOMDocument('1.0', 'utf-8');
        // Génère <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        $urlset_node = $xmlDoc->createElementNS("http://www.sitemaps.org/schemas/sitemap/0.9", 'urlset');
        $xmlDoc->appendChild($urlset_node);

        foreach($this->urlData as $url){
            $url_node = $xmlDoc->createElement('url');
            $urlset_node->appendChild($url_node);
            $loc_node = $xmlDoc->createElement('loc', $url);
            $url_node->appendChild($loc_node);

            // Code XML du sitemap
            $sitemap_xml_code = $xmlDoc->saveXml();

            // Ecriture du code XML du sitemap dans un fichier
            file_put_contents($this->filePath, $sitemap_xml_code);
        }
    }
    

    public function __destruct() {
        $this->xmlDoc->save($this->filePath);
    }
}

?>