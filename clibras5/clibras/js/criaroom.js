// grab the room from the URL
            var room = location.search && location.search.split('?')[1];
            // create our webrtc connection
            var webrtc = new SimpleWebRTC({
                // the id/element dom element that will hold "our" video
                localVideoEl: 'localVideo',
                // the id/element dom element that will hold remote videos
                remoteVideosEl: '',
                // immediately ask for camera access
                autoRequestMedia: true,
                debug: false,
                detectSpeakingEvents: true, 
                autoAdjustMic: false
            });
 

            
            function setRoom(name) {
                document.querySelector('form').remove();
                document.getElementById('title').innerText = name;
                document.getElementById('subTitle').innerText =  'Link para o Room ' + location.href;             
                $('body').addClass('active');
            }


            if (room) { // Se já possui um room definido entra aqui //
            	alert('entrou no IF');
                setRoom(room);
            
            } else { // Se nao possui um room definido entra aqui //
            	alert('entrou no ELSE');
            	$('form').submit(function () { // janelas remotas //
                	alert('entrou no ELSE2');
                    var val = $('#sessionInput').val().toLowerCase().replace(/\s/g, '-').replace(/[^A-Za-z0-9_\-]/g, '');
                    webrtc.createRoom(val, function (err, name) {
                        console.log('create room cb', arguments);
                        var newUrl = location.pathname + '?room=' + name;                        
                        alert('entrou no ELSE3');
                        if (!err) {
                            history.replaceState({foo: 'bar'}, null, newUrl);
                            setRoom(name);
                        } else {
                            console.log(err);
                        }
                    });
                    return false;
                });
            }    