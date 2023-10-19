var telefone = document.getElementById("telefone");
var cpf = document.getElementById("cpf");
var cep = document.getElementById("cep");

telefone.addEventListener('keyup', mask_tel);
cpf.addEventListener('keyup', mask_cpf);
cep.addEventListener('keyup', mask_cep);

function mask_tel(e) {

    let carac = e.target.value.replace(/\D/g, "");

    carac = carac.replace(/(\d\d)(\d)/, "($1) $2");
    carac = carac.replace(/(\d{5})(\d)/, "$1 - $2");

    e.target.value = carac;
}

function mask_cpf(e) {

    let carac = e.target.value.replace(/\D/g, "");

    carac = carac.replace(/(\d{3})(\d)/, "$1.$2");
    carac = carac.replace(/(\d{3})(\d)/, "$1.$2");
    carac = carac.replace(/(\d{3})(\d{1,2})/, "$1-$2");

    e.target.value = carac;
}

function mask_cep(e) {

    let carac = e.target.value.replace(/\D/g, "");

    carac = carac.replace(/(\d{5})(\d)/, "$1-$2");

    e.target.value = carac;

}