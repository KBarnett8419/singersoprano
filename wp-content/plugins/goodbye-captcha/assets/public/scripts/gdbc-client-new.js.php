<?php
/*
 * Copyright (C) 2018 Mihai Chelaru
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

defined( 'ABSPATH' ) || exit;

function gdbcRewriteNoCacheHeaders($arrHeaders)
{
	$arrHeaders['Cache-Control'] = 'no-store, no-cache, must-revalidate, max-age=0';
	$arrHeaders['Content-Type']  = 'application/javascript; charset=utf-8';
	
	return $arrHeaders;
}

add_filter('nocache_headers', 'gdbcRewriteNoCacheHeaders', 1);

nocache_headers();


if(null === ($settingsModuleInstance = GdbcModulesController::getPublicModuleInstance(GdbcModulesController::MODULE_SETTINGS))){
	exit;
}

$hiddenInputName = $settingsModuleInstance->getOption(GdbcSettingsAdminModule::OPTION_HIDDEN_INPUT_NAME);


?>

(function() {'use strict';
    if (!Array.isArray){Array.isArray = function(arg){return Object.prototype.toString.call(arg) === '[object Array]';};}
    if (!String.prototype.trim){String.prototype.trim = function () {return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');};}

    var WPBruiserClient = function(){
        var browserInfo = new Array();
        function init(){
            var w=window,d=document,e=0,f=0;e|=w.ActiveXObject?1:0;e|=w.opera?2:0;e|=w.chrome?4:0;
            e|='getBoxObjectFor' in d || 'mozInnerScreenX' in w?8:0;e|=('WebKitCSSMatrix' in w||'WebKitPoint' in w||'webkitStorageInfo' in w||'webkitURL' in w)?16:0;
            e|=(e&16&&({}.toString).toString().indexOf("\n")===-1)?32:0;f|='sandbox' in d.createElement('iframe')?1:0;f|='WebSocket' in w?2:0;
            f|=w.Worker?4:0;f|=w.applicationCache?8:0;f|=w.history && history.pushState?16:0;f|=d.documentElement.webkitRequestFullScreen?32:0;f|='FileReader' in w?64:0;

            var ua = navigator.userAgent.toLowerCase();
            var regex = /compatible; ([\w.+]+)[ \/]([\w.+]*)|([\w .+]+)[: \/]([\w.+]+)|([\w.+]+)/g;
            var match = regex.exec(ua);
            browserInfo = {screenWidth:screen.width,screenHeight:screen.height,engine:e,features:f};
            while (match !== null) {
                var prop = {};
                if (match[1]) {
                    prop.type = match[1];
                    prop.version = match[2];
                } else if (match[3]) {
                    prop.type = match[3];
                    prop.version = match[4];
                } else {
                    prop.type = match[5];
                }
                prop.type = (prop.type).trim().replace('.','').replace(' ','_');
                var value = prop.version ? prop.version : true;
                if (browserInfo[prop.type]) {
                    !Array.isArray(browserInfo[prop.type])?browserInfo[prop.type]=new Array(browserInfo[prop.type]):'';
                    browserInfo[prop.type].push(value);
                }
                else browserInfo[prop.type] = value;
                match = regex.exec(ua);
            }
        };

        var requestTokens = function(){for(var i = 0; i < document.forms.length; ++i){retrieveToken(document.forms[i]);}};

        function retrieveToken(formElement){

            var requestObj = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));

            var formFieldElm = formElement.querySelector('input[name="<?php echo $hiddenInputName; ?>"]');
            if(!requestObj || !formFieldElm) return;
            var ajaxData = {};

            ajaxData[<?php echo "'$hiddenInputName'"; ?>] = '<?php echo GdbcAjaxController::getAjaxNonce(); ?>';
            ajaxData['action']      = '<?php echo GdbcAjaxController::ACTION_RETRIEVE_TOKEN ?>';
            ajaxData['requestTime'] = (new Date()).getTime();
            ajaxData['browserInfo'] = JSON.stringify(browserInfo);

            requestObj.open('POST', '<?php echo MchGdbcWpUtils::getAjaxUrl() ?>', true);
            requestObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
            requestObj.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            requestObj.setRequestHeader('Accept',"application/json, text/javascript, */*; q=0.01");
            requestObj.send(serializeObject(ajaxData));

            requestObj.onreadystatechange = function () {
                if (4 === requestObj.readyState && 200 === requestObj.status){
                    try
                    {
                        var rs = JSON.parse(requestObj.responseText);
                        if(rs.data !== 'undefined')
                            for(var p in rs.data){
                                if(p=='token'){
                                    formFieldElm.value = rs.data[p];
                                }
                                else {
                                    var value = '', arrValues = rs.data[p].split('|');
                                    for (var i = 0; i < arrValues.length; ++i) {
                                        if (browserInfo.hasOwnProperty(arrValues[i]))
                                            value += browserInfo[arrValues[i]];
                                    }

                                    var elm = document.createElement("input");elm.name = p;elm.value=value;elm.type='hidden';formElement.appendChild(elm);

                                    if((' ' + formElement.className + ' ').indexOf(' mailpoet_form ') > -1){
                                        elm.name = 'data[' + p + ']';formFieldElm.name = 'data[' + formFieldElm.name + ']';
                                    }

                                }
                            }

                    }
                    catch(e){console.log(e.message);}
                }
            }
        }

        init();

        function serializeObject(obj) {
            var str = [];
            for(var p in obj)
                if (obj.hasOwnProperty(p)) {
                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                }
            return str.join("&");
        }
        return {requestTokens : requestTokens};
    }

    window.WPBruiserClient = new WPBruiserClient();window.WPBruiserClient.requestTokens();

})();