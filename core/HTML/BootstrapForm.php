<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 18:13
 */

namespace Core\HTML;


class BootstrapForm extends Form {

    /**
     * @param string $html
     * @return string
     */
    protected function surround($html) {
        return '<div class="form-group">'.$html.'</div>';
    }

    public function input($name, $classes = [], $id = null, $placeholder = null, $isRequired = false) {

        array_push($classes, "form-control");

        return $this->surround(
            '<label>'.$name.'</label>'.
            '<input type="text" '
            .$this->setId($id).' '
            .$this->setClass($classes).' name="'
            .$name .'" '
            .$this->setPlaceholder($placeholder).' '
            .$this->setRequired($isRequired).' value="'
            .$this->getValue($name).'"/>');
    }

    /**
     * @param string $text
     * @return string
     */
    public function submit($text = 'Envoyer', $classes = [], $id = null) {

        array_push($classes, 'btn');

        return $this->surround('<button type="submit" class="'
            .$this->setClass($classes).' '
            .$this->setId($id).'">'.$text.'</button>');
    }

}