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

    /**
     * @param $name
     * @param null $label
     * @param string $type
     * @param array $classes
     * @param null $id
     * @param null $placeholder
     * @param bool $isRequired
     * @return string
     */
    public function input($name, $label = null, $type = 'text',$classes = [], $id = null, $placeholder = null, $isRequired = false) {

        array_push($classes, "form-control");

        if($label === null) {
            $label = $name;
        }

        return $this->surround(
            '<label>'.$label.'</label>'.
            '<input type="'.$type.'" '
            .$this->setId($id).' '
            .$this->setClass($classes).' name=" '
            .$name .'" '
            .$this->setPlaceholder($placeholder).' '
            .$this->setRequired($isRequired).' value="'
            .$this->getValue($name).'"/>');
    }

    /**
     * @param string $text
     * @param array $classes
     * @param null $id
     * @return string
     */
    public function submit($text = 'Envoyer', $type = 'submit',$classes = [], $id = null) {

        array_push($classes, 'btn');

        return $this->surround('<button type="'.$type.'" '
            .$this->setClass($classes).' '
            .$this->setId($id).'">'.$text.'</button>');
    }

}