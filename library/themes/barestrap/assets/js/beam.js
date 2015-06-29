var beam = (function () {
    var load = function (url,divElementId) {
        var jsPlaceholder = document.createElement('script');
 		
        jsPlaceholder.type = 'text/javascript';
        jsPlaceholder.async = true;
        jsPlaceholder.src = url;
 
        if (divElementId === undefined)
        {
            document.getElementsByTagName('head')[0].appendChild(jsPlaceholder);
        }
        else
        {
            document.getElementById(divElementId).appendChild(jsPlaceholder);
        }
    };
 
    return function (url,divElementId) {
        setTimeout(function () { load(url,divElementId); }, 1);
    };
})();