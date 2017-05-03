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
class vt_scss extends Shop_Config
{
    protected $_sThisTemplate  = 'vt_scss.tpl';

    public function getSassSrc($blReturnArray = true)
    {
        $aSrc = oxRegistry::getConfig()->getConfigParam('vtSassSrc');
        return ( $blReturnArray ) ? $aSrc : $this->_arrayToMultiline($aSrc);
    }
    public function getSassDest()
    {
        return oxRegistry::getConfig()->getConfigParam('vtSassDest');
    }

    public function save()
    {
        $cfg = oxRegistry::getConfig();
        $params = $cfg->getRequestParameter("params");
        //preg_split('/\r\n|[\r\n]/', $params['vtSassSrc'])
        $cfg->saveShopConfVar("arr","vtSassSrc", $this->_serializeConfVar("arr", "vtSassSrc", $params['vtSassSrc']),null,'module:oxid-scss');
        $cfg->saveShopConfVar("str","vtSassDest", $this->_serializeConfVar("str", "vtSassDest", $params['vtSassDest']),null,'module:oxid-scss');

    }

    public function compile()
    {
        $cfg = oxRegistry::getConfig();
        $scssphp = $cfg->getModulesDir().'/vt/oxid-scss/scssphp/scss.inc.php';
        if(file_exists($scssphp)) require $scssphp;
        else die("scssphp library kann nicht geladen werden");

        $aSrc = $this->getSassSrc();
        $basedir = $cfg->getConfigParam('sShopDir');

        $sDest = $this->getSassDest();
        $css = '';

        $scss = new Leafo\ScssPhp\Compiler();

        // output style
        $formatter = $cfg->getRequestParameter('formatter');
        $scss->setFormatter("Leafo\\ScssPhp\\Formatter\\$formatter");

        // processing files
        $scss->setImportPaths($basedir);
        foreach($aSrc as $file) $css .= $scss->compile('@import "'.$file.'"');

        $r = file_put_contents($basedir.$sDest,$css);
        if($r) $this->addTplParam("msg","Läuft, die Datei ist ".intval($r/1024)." kB groß");
        else  $this->addTplParam("msg","lief nicht. Gibts Schreibrechte für den Ordner?");
    }

}
