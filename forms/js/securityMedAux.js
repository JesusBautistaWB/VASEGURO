
if((localStorage.getItem('sessionValue') == ""  || localStorage.getItem('nivel') != "6" )){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        }

