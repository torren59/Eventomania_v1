function navitemselect(id){

        let seleccionado = document.getElementById(id);
    seleccionado.style.backgroundColor= "#103900";
    seleccionado.style.color= "white";
    if(id=="admin-nav-btn1"){
        let noseleccionado = document.getElementById('admin-nav-btn2');
        noseleccionado.style.backgroundColor= "#06BA63";
    }
    else{
        let noseleccionado = document.getElementById('admin-nav-btn1');
        noseleccionado.style.backgroundColor= "#06BA63";
    }
    
    
}