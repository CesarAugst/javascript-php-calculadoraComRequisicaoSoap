function displaynum(n1) {
    Calculator.text1.value = Calculator.text1.value + n1;
}

var expressao = ['0', 'soma', '0'];
var posição = 0;

var el = document.getElementById("btn9");
el.addEventListener("click", () => {
    expressao[posicao] += valor;
    console.log('expressao: ' + expressao);
});
