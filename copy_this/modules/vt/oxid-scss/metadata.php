<?php

/**
 * [vt] SCSS Compiler for OXID eShop
 * Copyright (C) 2017 Marat Bedoev
 * info:  m@marat.ws
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 *
 * author: Marat Bedoev
 */

$sMetadataVersion = '1.1';
$aModule = [
    'id'          => 'oxid-scss',
    'title'       => '[vt] SCSS Compiler',
    'description' => 'PHP SASS Compiler',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '0.0.1 (2017-05-02)',
    'author'      => 'Marat Bedoev',
    'email'       => 'm@µarat.ws',
    'url'         => '___URL___',
    'extend'      => ['oxutilsview'  => 'vt/oxid-scss/application/extend/oxutilsview_scss'],
    'files'       => ['vt_scss'      => 'vt/oxid-scss/application/controllers/admin/vt_scss.php'],
    'templates'   => ['vt_scss.tpl'  => 'vt/oxid-scss/application/views/admin/vt_scss.tpl'],
    'settings'    => [
        ['group' => 'vtSassMain', 'name' => 'vtSassSrc', 'type' => 'arr', 'value' => []],
        ['group' => 'vtSassMain', 'name' => 'vtSassDest', 'type' => 'str', 'value' => '']
    ]
];
