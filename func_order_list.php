/**
 * Função que ordena uma lista|array através da chave escolhida
 * @param array $array Array que deseja ordenar
 * @param string $chave Chave do valor será usado para ordenar a lista
 * @param string $tipo Tipo do valor que será ordenado. ['data' | 'numerico' | 'string']
 * @return array Array ordenado
 */
function order_by_value(array $array, string $chave, string $tipo) :array
{

    for ($j=1; $j < sizeof($array); $j++) {
        $valor = $array[$j];
        $i = $j-1;
        if($tipo === 'data'){
            while($i >= 0 && strtotime($array[$i][$chave]) > strtotime($valor[$chave])){
                $array[$i+1] = $array[$i];
                $i = $i-1;
            }
        } elseif ($tipo === 'numerico'){
            while($i >= 0 && $array[$i][$chave] > $valor[$chave]){
                $array[$i+1] = $array[$i];
                $i = $i-1;
            }
        } elseif ($tipo === 'string'){
            while($i >= 0 && strcmp($array[$i][$chave], $valor[$chave]) > 0){
                $array[$i+1] = $array[$i];
                $i = $i-1;
            }
        }

        $array[$i+1] = $valor;

    }

    return $array;
}
