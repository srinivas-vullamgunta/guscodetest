<?php

namespace Arden;

class ProductsView extends View
{
    public function __construct($data = null)
    {
        if($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render opening times     
        echo "<table><tr><th>Name</th><th>Image</th></tr>";   
        foreach($this->data as $key => $val) {                   
            echo '<tr><td>'. $val['name'].'</td><td><img src=images/'.$val['image'].' width="100px"></img></td></tr>'; 
        }
        echo '</table>';
    }
}