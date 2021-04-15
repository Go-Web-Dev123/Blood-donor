function clicks(){
    var icon=document.getElementsByClassName('fa-name');
    var pass=document.getElementById('password');

    if(pass.type==='password'){
        pass.type='text';
        icon.style.color="blue";

    }else{
        pass.type='password';
        icon.style.color="black";
    }
}