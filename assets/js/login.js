function login(){
$(window).ready( function(){

    $('formularioLogin').on('submit', function(e){

        e.preventDefault();

        let user = $('#xuser').val();
        let pass = $('#xpassword').val();

        $.post('config/controlador.php', {user: pass}, function(data){
            data = JSON.parse(data);
            if(data == 'true'){
                location.href = 'index.php';
            }
        });
    })
});

}


function loginOracle(){
    $(window).ready( function(){

        $('formularioLogin').on('submit', function(e){
    
            e.preventDefault();
    
            let user = $('#xuser').val();
            let pass = $('#xpass').val();
    
            var data = {
                user: fUser,
                pass: fPass
            };
            
            $.post('consultas.php',function(data){
                
                if(data == 'true'){
                    location.href = 'index.php';
                }
            });

        })
    });
    

}

function loginOracle2(){
    $(window).ready( function(){

        $('formularioLogin').on('submit', function(e){
    
            e.preventDefault();
    
            var user = document.getElementById("xuser").value;
            var pass = document.getElementById("xpass").value;
    
            
            

            $.ajax({
                type: "POST",
                url: "consultas.php",
                data: {user : pass},
                success : function(){
                    location.href = 'index.php';
                }
            });

        })
    });
    

}