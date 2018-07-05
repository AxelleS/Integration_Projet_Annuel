<?php

class xmlGenerator
{
    private $dirPath;
    private $fileName;
    private $xmlDoc;
    private $channel;
    private $routes;

    public function __construct($fileName, $dirPath = "xml") {
        $this->routes = Access::getSlugsById();
        $this->fileName = $fileName.'.xml';
        $this->dirPath = CoreFile::testStaticDirectory($dirPath);
        $this->xmlDoc = new DOMDocument('1.0', 'utf-8');
        $this->getWebSiteData();
    }

    /**
     * Initialise les données du site internet en cours
     */
    public function getWebSiteData() {
        $this->channel = $this->xmlDoc->createElement('channel');
        $title = $this->xmlDoc->createElement('title', 'Play with my CMS');
        $link = $this->xmlDoc->createElement('link', $_SERVER['SERVER_NAME']);
        $description = $this->xmlDoc->createElement('description', 'Description');
        $webMaster = $this->xmlDoc->createElement('webMaster', '');
        $language = $this->xmlDoc->createElement('language', 'fr');
        $copyright = $this->xmlDoc->createElement('copyright', 'PlayWithMyCMS');
        $generator = $this->xmlDoc->createElement('generator', 'PlayWithMyCMS');
        $lastBuildDate = $this->xmlDoc->createElement('lastBuildDate', date('c'));
        $this->channel->appendChild($title);
        $this->channel->appendChild($link);
        $this->channel->appendChild($description);
        $this->channel->appendChild($webMaster);
        $this->channel->appendChild($language);
        $this->channel->appendChild($copyright);
        $this->channel->appendChild($generator);
        $this->channel->appendChild($lastBuildDate);
    }


    public function convertStringToXml($string) {
        return html_entity_decode($string);
    }

    public function setRoomContent($content) {
        $roomContent = new Room();
        if(isset($content) && !empty($content)){
            foreach($content as $room){
                $item = $this->xmlDoc->createElement('item');
                $title = $this->xmlDoc->createElement('title', $room['title']);
                $description = $this->xmlDoc->createElement('description', $room['description']);
                $url_video = $this->xmlDoc->createElement('url_video', $room['url_video']);
                $capacity = $this->xmlDoc->createElement('capacity', $room['capacity']);
                $is_pregnant = ($this->xmlDoc->createElement('is_pregnant', $room['is_pregnant']) === "1") ? "Oui" : "Non";
                $is_wheelchair = ($this->xmlDoc->createElement('is_wheelchair', $room['is_wheelchair']) === "1") ? "Oui" : "Non";
                $is_deaf = ($this->xmlDoc->createElement('is_deaf', $room['is_deaf']) === "1") ? "Oui" : "Non";
                $item->appendChild($title);
                $item->appendChild($description);
                $item->appendChild($url_video);
                $item->appendChild($capacity);
                $item->appendChild($is_pregnant);
                $item->appendChild($is_wheelchair);
                $item->appendChild($is_deaf);
                $this->channel->appendChild($item);
            }
        } else {
            $item = $this->xmlDoc->createElement('item');
            $title = $this->xmlDoc->createElement('title', 'Aucune room n\'est disponible pour le moment');
            $description = $this->xmlDoc->createElement('description', 'Aucune room n\'est disponible pour le moment');
            $item->appendChild($title);
            $item->appendChild($description);
            $this->channel->appendChild($item);
        }
        $this->xmlDoc->appendChild($this->channel);
    }

    public function __destruct() {
        $this->xmlDoc->save($this->dirPath['SERVER_PATH'].$this->fileName);
    }
}