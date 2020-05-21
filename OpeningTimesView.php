<?php

namespace Arden;

class OpeningTimesView extends View
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
        foreach($this->data as $key => $val) {
            if($key == 'days') {
                foreach($val as $day) {
                    echo '<table><tr><th>'. $day.' </th>'; 
                    foreach($this->data['opening_hours'] as $d => $hours) {
                        if($d == $day) {
                            echo '<td width="100px">'. $hours.'</td>';
                        }
                    }
                    echo '</tr></table>';
                }
            }

        }
    }
}