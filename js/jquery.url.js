jQuery.url=function()
{var segments={};var parsed={};var options={url:window.location,strictMode:false,key:["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],q:{name:"queryKey",parser:/(?:^|&)([^&=]*)=?([^&]*)/g},parser:{strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/}};var parseUri=function()
{str=decodeURI(options.url);var m=options.parser[options.strictMode?"strict":"loose"].exec(str);var uri={};var i=14;while(i--){uri[options.key[i]]=m[i]||"";}
uri[options.q.name]={};uri[options.key[12]].replace(options.q.parser,function($0,$1,$2){if($1){uri[options.q.name][$1]=$2;}});return uri;};var key=function(key)
{if(!parsed.length)
{setUp();}
if(key=="base")
{if(parsed.port!==null&&parsed.port!=="")
{return parsed.protocol+"://"+parsed.host+":"+parsed.port+"/";}
else
{return parsed.protocol+"://"+parsed.host+"/";}}
return(parsed[key]==="")?null:parsed[key];};var param=function(item)
{if(!parsed.length)
{setUp();}
return(parsed.queryKey[item]===null)?null:parsed.queryKey[item];};var setUp=function()
{parsed=parseUri();getSegments();};var getSegments=function()
{var p=parsed.path;segments=[];segments=parsed.path.length==1?{}:(p.charAt(p.length- 1)=="/"?p.substring(1,p.length- 1):path=p.substring(1)).split("/");};return{setMode:function(mode)
{strictMode=mode=="strict"?true:false;return this;},setUrl:function(newUri)
{options.url=newUri===undefined?window.location:newUri;setUp();return this;},segment:function(pos)
{if(!parsed.length)
{setUp();}
if(pos===undefined)
{return segments.length;}
return(segments[pos]===""||segments[pos]===undefined)?null:segments[pos];},attr:key,param:param};}();