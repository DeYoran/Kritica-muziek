<?php
namespace Engine\View;

use Engine\Model\Liedje;
use getID3;

class PlayView implements View
{
    private $liedje;
    private $content;
    
    public function __construct(Liedje $liedje)
    {
        include './library/getID3/getID3.php';
        $getID3 = new getID3;
        $this->liedje = $liedje;
        if($this->liedje->getPad() != null){
            $image = "data:image/gif;base64,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";
            var_dump($this->liedje->getPad());
            $file = file_get_contents($this->liedje->getPad());
            file_put_contents("./tmp/play.mp3", $file);
            $fileinfo = $getID3->analyze($this->liedje->getPad());
            if(isset($fileinfo['comments']['picture'][0])){
                $image='data:'.$fileinfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($fileinfo['comments']['picture'][0]['data']);
            }
            $this->content .= "<img src='$image' width='400' /><br />";
            $this->content .= file_get_contents('./engine/view/pages/player.php');
        }
        else{
            $lokatie = strtolower($this->liedje->getAllAlbums()[0]->getLokatie());
            $this->content = "<br><br><h1>Dit liedje kan niet worden afgespeeld, omdat er geen pad is gevonden.</h1> het liedje bevindt zich in de $lokatie";
        }
    }

    public function view()
    {
        echo $this->content;
    }

}
