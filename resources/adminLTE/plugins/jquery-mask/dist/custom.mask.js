//.cpf_cnpj
//.celular
//.phone
//.cep

$('.celular').mask('(99) 99999-9999');
$('.phone').mask('(99) 9999-9999');
$('.cep').mask('99999-999');
$('.money').mask('000.000.000.000.000,00', {reverse: true});
$('.data').mask('00/00/0000');

var field = '.cpf_cnpj';

$(field).keydown(function(){
    try {
        $(field).unmask();
    } catch (e) {}

    var tamanho = $(field).val().length;

    if(tamanho < 11){
        $(field).mask("999.999.999-99");
    } else {
        $(field).mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
