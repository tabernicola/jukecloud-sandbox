$(document).ready(function() {
    $("#player").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            title: "Bubble",
            m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a"
          });
        },
        swfPath: "/extern/jplayer/jquery.jplayer/",
        supplied: "m4a"
      });
    $('#library').jstree({
        "core": {
            "check_callback": true,
            "themes": {"stripes": true},
            "data" : {
                'url' : function (node) {
                    switch (node.type){
                        case 'root': return '/ajax/'+node.id+'/';
                        case 'artist': return '/ajax/'+node.id+'/';
                        case 'disk': return '/ajax/'+node.id+'/';
                        default: return '/ajax/types/'
                    }
                },
                "data" : function () {return null}
            }
        },
        "types": {
            "root": {
                "icon": "glyphicon glyphicon-home",
            },
            "default": {
                "icon": "glyphicon glyphicon-music",
            },
            "artist": {
                "icon": "glyphicon glyphicon-headphones",
            },
            "disk": {
                "icon": "glyphicon glyphicon-sound-stereo",
            }
        },
            
        "plugins": ["contextmenu", "dnd", "search", "state", "types", "wholerow"]
    });
    $('#dial').knob({
        fgColor: '#000000',
        thickness: .2,
        displayInput: false,
        height: 60,
        angleArc: 350,
        angleOffset: -175
    });
    
    /* $('#left-panel').resizable({
     handles: 'e',
     maxWidth: 600,
     minWidth: 150,
     resize: resizeCenter,
     });
     //$('#left-panel').draggable();
     $('#right-panel').resizable({}
     handles: 'w',
     maxWidth: 600,
     minWidth: 150,
     resize: resizeRCenter
     });*/
    $('.slider').slider({range: "min", max: 100, value: 50, slide: updateSlider, change: updateSlider});
});
function updateSlider() {
    console.log(1)
}

/*function resizeCenter(e,ui){
 $('#center-panel').css('margin-left','5px')
 $('#center-panel').animate({left: ui.size.width,width: $('#right-panel').offset().left - ui.size.width -5},0) ;
 }
 
 function resizeRCenter(e,ui){
 var newSize=$('#right-panel').offset().left -$('#left-panel').width()-30;
 console.log($('#left-panel').width());
 $('#center-panel').animate({width: newSize},0) ;
 //$('#center-panel').css('margin-left','5px');
 }*/