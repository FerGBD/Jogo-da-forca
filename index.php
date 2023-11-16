<?php
$palavras =["estudar", "flamengo", "paralelepipedo", "gaivota", "charrete", "eletrodomestico", "abduzir", "reflorestamento", "esternocleidomastoideo", "bagunca", "aspirador"];

$palavraEscolhida = $palavras[array_rand($palavras)];

$palavraOculta = str_repeat("_", strlen($palavraEscolhida));

$maxTentativas = 6;
$tentativas = 0;
$boneco = "";
while ($tentativas < $maxTentativas){
    echo "\033c";

    echo "=========================\n";
    echo "      JOGO DA FORCA\n";
    echo "=========================\n";
    echo "Palavra oculta: $palavraOculta\n";
    echo "Tentativas restantes: " . ($maxTentativas - $tentativas) . "\n";
    echo "Boneco: \n";
    echo " _______\n";
    echo " |     |\n";
    echo " |     $boneco\n";
    echo " |    /|\\\n";
    echo " |    / \\\n";
    echo " |\n";
    echo "=========================\n";

    echo "Digite uma letra (ou 0 para encerrar): ";
    $letra = strtolower(trim(readline()));

    if ($letra == '0') {
        echo "Jogo encerrado pelo usuário.\n";
        exit;
    }

    if(strpos($palavraEscolhida, $letra) !== false){
        echo "Letra correta!\n";

        for($i = 0; $i < strlen($palavraEscolhida); $i++){
            if($palavraEscolhida[$i] == $letra){
                $palavraOculta[$i] = $letra;
            }
        }
    } else{
        echo "Letra errada. Tente Novamente.\n";
        $tentativas++;
        $boneco .= "|";
    }
    if($palavraOculta == $palavraEscolhida){
        echo "Parabens! Você adivinhou a palavra: $palavraEscolhida\n";
        exit;
    }
}
   if($tentativas == $maxTentativas){
    echo "Você perdeu! A palavra era: $palavraEscolhida\n";
    exit;
   }
?>