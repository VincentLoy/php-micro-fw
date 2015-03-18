<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 18:13
 */

namespace Core\HTML;

/**
 * Class BootstrapForm
 * @package Core\HTML
 * Classe se chargant de générer des formulaires pour twitter bootstrap
 */
class BootstrapForm extends Form {

    /**
     * @param string $html
     * @return string
     */
    protected function surround($html) {
        return '<div class="form-group">'.$html.'</div>';
    }

    /**
     * @param $name - Doit etre le nom du champs dans la table
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

        if($type === 'textarea') {
            return $this->surround(
                '<label>'.$label.'</label>'.
                '<textarea '
                .$this->setId($id).' '
                .$this->setClass($classes).'
name=" '
                .$name .'" '
                .$this->setPlaceholder($placeholder).' '
                .$this->setRequired($isRequired).'>'
                .$this->getValue($name).'</textarea>');
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
     * @param $name
     * @param $label
     * @param $options
     */
    public function select($name, $label, $options) {
        $label = "<label>" . $label . "</label>";

        $input = '<select class="form-control" name="'.$name.'">';

        foreach ($options as $k => $v) {
            $attributes = '';
            if( $k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value ='$k' $attributes>$v</option>";
        }

        $input .= '</select>';

        return $this->surround($label . $input);
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