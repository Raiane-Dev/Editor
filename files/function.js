var toggleMenu = document.querySelectorAll('.menuAside');
var asideMobile = document.querySelector('.aside');
var conteudo = document.querySelector('.conteudo');

for(var i = 0; i < toggleMenu.length; i++){
toggleMenu[i].addEventListener('click', menuAction);
}

function menuAction(){
    if(asideMobile.classList.contains('hide')){
        asideMobile.classList.remove('hide');
        conteudo.classList.add('mudou');
        document.querySelector('footer').style.display = "none";
    }else{
        asideMobile.classList.add('hide');
        conteudo.classList.remove('mudou');
        document.querySelector('footer').style.display = "block";
    }
}

$('select').change(function(){
    if($(this).val() == 'dinheiro'){
        $('.troco').show();
    }else{
        $('.troco').hide();
    }
});