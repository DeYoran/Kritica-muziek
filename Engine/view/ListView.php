<?php
namespace Engine\View;

use Engine\View\View;

class ListView implements View
{
    
    private $content;

    public function __construct(array $colums, array $rows, $link, $target)
    {
        $this->content = "";
        $this->content .= file_get_contents("./Engine/view/pages/listhead.php");
        $headings = "";
        foreach ($colums as $column){
            $headings .= "<td>$column</td>";
        }
        $this->content .= "<thead>"
                .$headings;
        if($link){
            $this->content .= "<td></td><td></td>";
        }
        $this->content .= "</thead>";
        foreach ($rows as $row){
            $linkto = $row[0];
            array_shift($row);
            $this->content .= "<tr class='link'>";
            foreach ($row as $element){
                if(is_array($element))
                {
                    $this->content .= "<td>";
                    if($link){
                       $this->content .= "<a href='".$target.$linkto."'>";
                    }
                    foreach ($element as $value){
                        $this->content .= "$value<br />";
                    }
                    if($link){
                       $this->content .= "</a>";
                    }
                    $this->content .= "</td>";
                }
                else
                {
                    $this->content .= "<td>";
                    if($link){
                       $this->content .= "<a href='".$target.$linkto."'>";
                    }
                    $this->content .= $element;
                    if($link){
                       $this->content .= "</a>";
                    }
                    $this->content .= "</td>";
                }
            }
                if($link){
                    $this->content .= "<td><a href='delete/$_GET[url]/$linkto'>verwijder</a></td><td><a href='edit/$_GET[url]/$linkto'>wijzig</a></td>";
                }
            $this->content .= "</tr>";
        }
    }
    
    public function view()
    {
        $this->content .= file_get_contents("./Engine/view/pages/listfoot.php");
        $this->content .= "<a href='toevoegen/$_GET[url]'>toevoegen</a>";
        echo $this->content;
    }
}
