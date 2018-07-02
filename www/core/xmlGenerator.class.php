<?php

class xmlGenerator
{
    private $dirPath;
    private $fileName;
    private $xmlDoc;
    private $channel;
    private $routes;

    /**
     * GeneratorXML constructor.
     * @param string $fileName
     * @param string $dirPath
     */
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

    /**
     * @param $string
     * @return string
     * convert string to available XML String
     */
    public function convertStringToXml($string) {
        return html_entity_decode($string);
    }

    /**
     * @param array Blog $content
     * Générateur du fichier XML pour le contenu des Blogs
     */
    public function setRoomContent($content) {
        $roomContent = new Room();
        if(isset($content) && !empty($content)){
            foreach($content as $room){
                $item = $this->xmlDoc->createElement('item');
                $title = $this->xmlDoc->createElement('title', $room['title']);
                $description = $this->xmlDoc->createElement('description', $room['content']);
                $item->appendChild($title);
                $item->appendChild($description);
                $item->appendChild($datePub);
                $this->channel->appendChild($item);
            }
        } else {
            $item = $this->xmlDoc->createElement('item');
            $title = $this->xmlDoc->createElement('title', 'Aucun article publié pour le moment');
            $description = $this->xmlDoc->createElement('description', 'Aucun article publié pour le moment');
            $item->appendChild($title);
            $item->appendChild($description);
            $this->channel->appendChild($item);
        }
        $this->xmlDoc->appendChild($this->channel);
    }

    /**
     * Lorsqu'on a terminé avec notre objet, on save le XML
     */
    public function __destruct() {
        $this->xmlDoc->save($this->dirPath['SERVER_PATH'].$this->fileName);
    }
}