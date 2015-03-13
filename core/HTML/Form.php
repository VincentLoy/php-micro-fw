<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:27
 */

namespace Core\HTML;

/**
 * Class Form
 * @package Core\HTML
 * Quick form generator
 */
class Form {

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     * tag who will surround inputs
     */
    public $surround = 'p';

    /**
     * @param array $data
     */
    public function __construct($data = array()) {

        $this->data = $data;

    }

    /**
     * @param string $html
     * @return string
     */
    protected  function surround($html) {
        return "<{$this->surround}>".$html."</{$this->surround}>";
    }

    /**
     * @param $index
     * @return null
     */
    protected function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $name
     * @param array $classes
     * @param null $id
     * @param null $placeholder
     * @param bool $isRequired
     * @return string
     */
    public function input($name, $type = 'text',$classes = [], $id = null, $placeholder = null, $isRequired = false) {
        return $this->surround('<input type="'.$type.'" '
            .$this->setId($id).' '
            .$this->setClass($classes).' name="'
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
    public function submit($text = 'Envoyer', $classes = [], $id = null) {
        return $this->surround('<button type="submit" '
            .$this->setClass($classes).' '
            .$this->setId($id).'">'.$text.'</button>');
    }

    /**
     * @param $id String
     * @return null|string
     */
    protected function setId($id) {
        if($id === null) {
            return null;
        }
        return 'id="' . $id . '"';
    }

    /**
     * @param array $classes
     * @return null|string
     */
    protected function setClass($classes) {
        if(empty($classes)) {
            return null;
        }
        return 'class="'. implode(" ", $classes) .'"';
    }

    /**
     * @param string $text
     * @return null|string
     */
    protected function setPlaceholder($text) {
        if ($text === null ) {
            return null;
        }
        return 'placeholder="'.$text.'"';
    }

    /**
     * @param boolean $isRequired
     * @return null|string
     */
    protected function setRequired($isRequired) {
        if ($isRequired) {
            return "required";
        }
        return null;
    }



}