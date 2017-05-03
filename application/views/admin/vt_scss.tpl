[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="adminlinks_main">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post" onSubmit="copyLongDesc( 'oxlinks__oxurldesc' );">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="vt_scss">
    <input type="hidden" name="fnc" value="compile">
    <table border="0" style="width: 100%; max-width: 800px; margin: 0 auto; ">
        <colgroup><col width="25%"><col width="25%"><col width="25%"><col width="25%"></colgroup>
        <tr>
            <td valign="top"><h2>src:</h2></td>
            <td colspan="3"><textarea name="params[vtSassSrc]" id="" rows="10" style="width: 100%;">[{$oView->getSassSrc(false)}]</textarea></td>
        </tr>
        <tr>
            <td><h2>dest:</h2></td>
            <td colspan="3"><input type="text" name="params[vtSassDest]" style="width: 100%;" value="[{$oView->getSassDest()}]"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                <button type="submit" name="fnc" value="compile" style="width:60%; margin:0 2% 0 0; background: blue; float:left; color: white;">compile</button>
                <button type="submit" name="fnc" value="save" style="width:38%; margin: 0; background: green; color: white;">save</button>
            </td>
        </tr>
        [{if $msg}]
        <tr>
            <td cospan="4">[{$msg}]</td>
        </tr>
        [{/if}]
        <tr>
            <td>
                <h3>output</h3>
                <label><input type="radio" name="formatter" value="Expanded">&nbsp;Expanded</label><br/>
                <label><input type="radio" name="formatter" value="Nested">&nbsp;Nested</label><br/>
                <label><input type="radio" name="formatter" value="Compact">&nbsp;Compact</label><br/>
                <label><input type="radio" name="formatter" value="Compressed">&nbsp;Compressed</label><br/>
                <label><input type="radio" name="formatter" value="Crunched" checked>&nbsp;Crunched</label><br/>
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>
    </table>

</form>
[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
