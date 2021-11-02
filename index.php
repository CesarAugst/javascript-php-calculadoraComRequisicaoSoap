<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .fundo{
            background-image: linear-gradient(45deg, black,crimson);
            height: 100vh;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        .calculadora{
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            padding: 15px;
        }
        .botao{
            width: 50px;
            height: 50px;
            font-size: 25px;
            cursor: pointer;
            background-color: rgb(31,31,31);
            border: none;
            color: #fff;
            margin: 3px;
        }
        .botao:hover{
            background-color: black;
        }
        .resultado{
            background-color: #fff;
            width: 58px;
            height: 30px;
            margin: 5px;
            font-size: 25px;
            color: #000;
            text-align: right;
            padding: 5px;
        }
        .visor{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="fundo">
        <div class="calculadora">
            <h1>Calculadora</h1>            
            <div class="visor">
                <p id="resultado1" class="resultado"></p>
                <p id="resultadoSinal" class="resultado"></p>
                <p id="resultado2" class="resultado"></p>
            </div>
            <table>

                <tr>
                    <td><Button class="botao" onclick="clean()">C</Button></td>
                    <td><Button class="botao" onclick="back()"><</Button></td>
                    <td><Button class="botao" onclick="insertSinal('/')">/</Button></td>
                    <td><Button class="botao" onclick="insertSinal('*')">X</Button></td>
                </tr>
            
                <tr>
                    <td><Button class="botao" onclick="insertNum('7')">7</Button></td>
                    <td><Button class="botao" onclick="insertNum('8')">8</Button></td>
                    <td><Button class="botao" onclick="insertNum('9')">9</Button></td>
                    <td><Button class="botao" onclick="insertSinal('-')">-</Button></td>
                </tr>
            
                <tr>
                    <td><Button class="botao" onclick="insertNum('4')">4</Button></td>
                    <td><Button class="botao" onclick="insertNum('5')">5</Button></td>
                    <td><Button class="botao" onclick="insertNum('6')">6</Button></td>
                    <td><Button class="botao" onclick="insertSinal('+')">+</Button></td>
                </tr>
            
                <tr>
                    <td><Button class="botao" onclick="insertNum('1')">1</Button></td>
                    <td><Button class="botao" onclick="insertNum('2')">2</Button></td>
                    <td><Button class="botao" onclick="insertNum('3')">3</Button></td>
                    <td rowspan="2"><Button class="botao" style="height: 106px" onclick="calcular()">=</Button></td>
                </tr>
            
                <tr>
                    <td colspan="2"><Button class="botao" style="width: 106px" onclick="insertNum('0')">0</Button></td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        
        function insertNum(num){
            var sinal = document.getElementById('resultadoSinal').innerHTML;

            if(sinal == ''){
                var numero = document.getElementById('resultado1').innerHTML;
                document.getElementById('resultado1').innerHTML = numero + num;
            }else{
                var numero = document.getElementById('resultado2').innerHTML;
                document.getElementById('resultado2').innerHTML = numero + num;
            }
        }

        function insertSinal(sinal){
            document.getElementById('resultadoSinal').innerHTML = sinal;
        }

        function clean(){
            document.getElementById('resultado1').innerHTML = "";
            document.getElementById('resultadoSinal').innerHTML = "";
            document.getElementById('resultado2').innerHTML = "";
        }

        function back(){
            var sinal = document.getElementById('resultadoSinal').innerHTML;

            if(sinal == ''){
                var resultado = document.getElementById('resultado1').innerHTML;
                document.getElementById('resultado1').innerHTML = resultado.substring(0, resultado.length -1);
            }else{
                var resultado = document.getElementById('resultado2').innerHTML;
                document.getElementById('resultado2').innerHTML = resultado.substring(0, resultado.length -1);
            }
            
        }

        function calcular(){
            var num1 = document.getElementById('resultado1').innerHTML
            var sinal = document.getElementById('resultadoSinal').innerHTML
            var num2 = document.getElementById('resultado2').innerHTML

            var url = './server.php?numA=' + num1 + '&numB=' + num2 + '&operacao=' + sinal;
            fetch(url).then(response =>{
                return response.json();
            })
            .then(data =>{
                alert('O resultado é: ' + data);
                clean();
            })
        }
    </script>
</body>
</html>