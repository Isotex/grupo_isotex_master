//////////////////////////////////////////////////////////////////
// Add Dropcap button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.dropcap', {  
        init : function(ed, url) {  
            ed.addButton('dropcap', {  
                title : 'Add a dropcap',  
                image : url+'/images/button-dropcap.png',  
                onclick : function() {  
                     ed.selection.setContent('[dropcap style="style1, style2, style3, or style4"]D[/dropcap]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);  
})();


//////////////////////////////////////////////////////////////////
// Add Highlight button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.highlight', {  
        init : function(ed, url) {  
            ed.addButton('highlight', {  
                title : 'Add a highlight',  
                image : url+'/images/button-highlight.png',  
                onclick : function() {  
                     ed.selection.setContent('[highlight background="#333" color="#fff"]Hightlight Text[/highlight]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);  
})();


