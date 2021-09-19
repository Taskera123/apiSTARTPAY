<!DOCTYPE html>
<html lang="pt-br">
    <head>        
        <meta charset="UTF-8">
        <title> Consumir API </title>
    </head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <title>Consumo API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <section class="hero is-info is-small">
      <div class="hero-body">
        <div class="container has-text-centered">
          <p class="title">
            Consumo do metodo nova transação
          </p>
          <p class="subtitle">
            Consumo de API com PHP
          </p>
        </div>
      </div>
    </section>
    <?php
        $server_key = 230;

        $host = 'https://hgateway.startpay.com.br/Transacoes/Nova.php';
        $user_name = 'x-uid';
                $ch = curl_init($host);
         $headers = array(
            'Token:40f721964d0f5334d1c0e7ac150613d2',
            'X-UID:' . $server_key,
            'Content-Type:application/json',
        );

        $fields = array();
        $fields['nome_cartao'] = "Anhicolas Olsen";
        $fields['cod_interno'] = '230';
        $fields['cpf'] = '86669109172';
        $fields['numero_cartao'] = "5155901222280001";
        $fields['vencimento'] = "04/25";
        $fields['descricao_tansacao'] = "Teste Homologação";
        $fields['valor_transacao'] = "0.11";
        $fields['parcelas'] = "1";
        $fields['cod_cliente'] = "123";
        $fields['cvv'] = "123";
        $fields['email'] = "anhicolas@hotmail.com";
        $fields['telefone'] = "(65)98113-0531";
        $fields['endereco_rua'] = "Rua 52";
        $fields["endereco_numero"] = "51";
        $fields["endereco_bairro"] = "Boa Esperanca";
        $fields["endereco_cidade"] = "Cuiaba";
        $fields["endereco_uf"] = "MT";
        $fields["endereco_cep"] = "78.068-430";


        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $response = json_decode(curl_exec($ch));
        if(curl_error($ch)){
            throw new Exception(curl_error($ch));
        }
        

        //var_dump($response); 
            
        curl_close($ch);
        
         
       $response = response; 
       

        ?>
        <div>
        <main class="principal painel">
           
                
            <input type="text" id="url" style="width:300px;" placeholder="Insira o número do cartão"
            oninput="validarTexto('numero_cartao')" onunfocus="validarTexto('numero_cartao')"  size="30"
                           onfocus="validarTexto('numero_cartao')" onchange="validarTexto('numero_cartao')" >
            <button onclick="fazerRequisicao();">Fazer requisição</button>
            <hr />
            <div id="resposta"></div>
    
         <script>
        function fazerRequisicao(){

            var url = document.getElementById('$response').value;

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", url, false);

            xhttp.send();
            document.getElementById("resposta").innerHTML = xhttp.responseText;
        }
        
        </script>
        </div>
    </body>
</html>