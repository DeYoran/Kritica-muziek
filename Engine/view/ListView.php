<?php
namespace Engine\View;

use Engine\View\View;

class ListView implements View
{
    
    private $content;

    public function __construct(array $colums, array $rows)
    {
        $this->content = "";
        $this->content .= file_get_contents("./Engine/view/pages/listhead.php");
        $headings = "";
        foreach ($colums as $column){
            $headings .= "<td>$column</td>";
        }
        $this->content .= "<thead>".$headings."</thead>";
        foreach ($rows as $row){
            $this->content .= "<tr>";
            foreach ($row as $element){
                $this->content .= "<td>$element</td>";
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
