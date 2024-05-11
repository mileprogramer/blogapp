let alert = document.querySelector(".alert");
let closeBtn = document.querySelector(".btn-close-alert");

if(alert !== null){
    closeBtn.onclick = function(){
        alert.style.display = "none";
    }    
}

