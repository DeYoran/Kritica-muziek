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
        $this->content .= "<thead>".$headings."</thead>";
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
            $this->content .= "</tr>";
        }
    }
    
    public function view()
    {
        $this->content .= file_get_contents("./Engine/view/pages/listfoot.php");
        echo $this->content;
    }
}
