<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Table;


use Core\Table\Table;

/**
 * Class CategoryTable
 * @package App\Table
 */
class CategoryTable extends Table{

    /**
     * @var string
     * nom de la table dans la base de donnée
     */
    protected $table = "categories";

}