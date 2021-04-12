<?php

namespace App;



class Permission extends \Spatie\Permission\Models\Permission
{

        public static function defaultPermission(){

        return[
            array('name'=>'Visualisar_cliente'),
            array('name'=>'armazenar_cliente'),
            array('name'=>'editar_cliente'),
            array('name'=>'deletar_cliente'),
            array('name'=>'visualizar_teams'),
            array('name'=>'visualizar_posts'),

        ];

    }

}