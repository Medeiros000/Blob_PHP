<?php

namespace sistema\Nucleo;

use Exception;

class Helpers
{

    public static function redirecionar(string $url = null): void
    {
        header('HTTP/1.1 302 Found');

        $local = ($url ? self::url($url) : self::url());

        header("Location: {$local}");
        exit;
    }
    /**
     * Retorna com uma saudação de acordo com a hora do dia
     */
    public static function saudacao()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $hora = date('H');
        if ($hora >= 0 && $hora < 12) {
            return "Bom dia!";
        } elseif ($hora >= 12 && $hora < 18) {
            return "Boa tarde!";
        } else {
            return "Boa noite!";
        }
    }

    /**
     * Resume um texto
     * @param string $texto texto para resumir
     * @param int $limite quantidade de caracteres
     * @param string $continue opcional - o que deve ser exebido ao final do resumo
     * @return string texto resumido
     */
    public static function resumirTexto($texto, $limite, $continue = '...'): string
    {
        $textoLimpo = trim($texto);
        if (strlen($textoLimpo) <= $limite) {
            return $textoLimpo;
        }
        $resumirTexto = substr($textoLimpo, 0, strrpos(substr($textoLimpo, 0, $limite), ''));
        return $resumirTexto . $continue;
    }

    /**
     * Formata um valor
     * @param float $valor valor para formatar
     * @return string valor formatado
     */
    public static function formatarValor(float $valor = null): string
    {
        return number_format(($valor ?: 0), 2, ',', '.');
    }

    /**
     * Formata um número
     * @param string $numero número para formatar
     * @return string número formatado
     */
    public static function formatarNumero(string $numero = null): string
    {
        return number_format($numero ?: 0, 0, ',', '.');
    }

    /**
     * Retorna um elemento h1
     * @param string $texto texto para o h1
     * @return string h1
     */
    public static function contarTempo($data): string
    {
        $dataAtual = new \DateTime();
        $dataPassada = new \DateTime($data);
        $intervalo = $dataAtual->diff($dataPassada);
        $ano = $intervalo->y;
        $mes = $intervalo->m;
        $dia = $intervalo->d;
        $hora = $intervalo->h;
        $minuto = $intervalo->i;
        $segundo = $intervalo->s;

        $ano == 0 ? $fAno = '' : $fAno = ($ano == 1 ? 'Há ' . $ano . ' ano' : 'Há ' . $ano . ' anos');

        $eAno = ($ano == 0 ? '' : ', ');

        $fMes = $mes == 0 ? '' : $eAno . ($mes == 1 ? $mes . ' mês' : $mes . ' meses');

        $eMes = ($mes == 0 ? '' : ', ');

        $fDia = ($dia == 0 ? '' : $eMes . ($dia == 1 ? $dia . ' dia' : $dia . ' dias'));

        $eDia = ($dia == 0 ? '' : ', ');

        $fHora = ($hora == 0 ? '' : $eDia . ($hora == 1 ? $hora . ' hora' : $hora . ' horas'));

        $eHora = ($hora == 0 ? '' : ', ');

        $fMinuto = ($minuto == 0 ? '' : $eHora . ($minuto == 1 ? $minuto . ' minuto' : $minuto . ' minutos'));

        $eMinuto = ($minuto == 0 ? '' : ' e ');

        $fSegundo = ($segundo == 0 ? '' : $eMinuto . ($segundo == 1 ? $segundo . ' segundo' : $segundo . ' segundos'));


        return $fAno . $fMes . $fDia . $fHora . $fMinuto . $fSegundo;
    }


    public static function validarEmail(string $email): string
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Endereço de e-mail válido';
        } else {
            return 'Endereço de e-mail inválido';
        }
    }

    public static function validarUrl(string $url): bool
    {
        if (strlen($url) < 10) {
            return false;
        }
        if (!str_contains($url, '.')) {
            return false;
        }
        if (str_contains($url, 'http://') or str_contains($url, 'https://')) {
            return true;
        }
        return false;
    }

    public static function validarUrlComFiltro(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public static function url(string $url = null): string
    {
        $servidor = filter_var($_SERVER['SERVER_NAME']);
        $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

        if ($url == null) {
            return $ambiente;
        }
        if (str_starts_with($url, '/')) {
            return $ambiente . $url;
        }
        return $ambiente . '/' . $url;
    }

    public static function localhost(): bool
    {
        $servidor = filter_var($_SERVER['SERVER_NAME']);
        if ($servidor == 'localhost') {
            return true;
        }
        return false;
    }

    public static function db_local(): bool
    {
        $raiz = filter_var($_SERVER['DOCUMENT_ROOT']);
        if ($raiz == '/var/www/html') {
            return true;
        }
        return false;

    }

    public static function dataAtual(): string
    {
        $diaMes = date('d');
        $diaDaSemana = date('w');
        $mes = date('n');
        $ano = date('Y');

        $nomesDiasDaSemana = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'];
        $nomesDosMeses = [1 => 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

        $dataFormatada = $nomesDiasDaSemana[$diaDaSemana];
        $mesFormatado = $nomesDosMeses[$mes];
        return $dataFormatada . ', ' . $diaMes . ' de ' . $mesFormatado . ' de ' . $ano;
    }

    public static function slug($string): string
    {
        $mapa['a'] = 'AEIOUÁÉÍÓÚÃÕãõ';
        $mapa['b'] = 'aeiouaeiouaoao';

        $slug = strtr(utf8_decode($string), utf8_decode($mapa['a']), $mapa['b']);

        $slug = str_replace(' ', '_', $slug);


        $slug = utf8_decode($slug);
        $slug = strtolower($slug);
        // $slug = strtoupper($slug);
        $slug = ucfirst($slug);

        return '<section>' . $slug . '<hr></section>';
    }

    public static function saudacao2(): string
    {
        $hora = date('H');
        // switch ($hora) {
        //     case $hora >= 0 and $hora <= 5:
        //         $saudacao = 'Boa madrugada';
        //         break;
        //     case $hora > 5 and $hora < 12:
        //         $saudacao = 'Bom dia';
        //         break;
        //     case $hora >= 12 and $hora < 18:
        //         $saudacao = 'Boa Tarde';
        //         break;
        //     default:
        //         $saudacao = 'Boa noite';
        //         break;
        // }

        $saudacao = match (true) {
            $hora >= 0 && $hora <= 5 => 'Boa madrugada',
            $hora > 5 && $hora < 12 => 'Bom dia',
            $hora >= 12 && $hora < 18 => 'Boa tarde',
            default => 'Boa noite'
        };

        $horaLocal = date('H:i:s');
        return $saudacao . ', são ' . $horaLocal;
    }

    public static function limparNumero(string $numero): string
    {
        return preg_replace('/[^0-9]/', '', $numero);
    }
    public static function secH1(string $texto): string
    {
        return "<section><h1>{$texto}</h1></section>";
    }

    public static function validarCpf(string $cpf): bool
    {
        $cpf = self::limparNumero($cpf);
        if (mb_strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            throw new Exception('O CPF precisa ter 11 digitos');
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 100;
            if ($cpf[$c] != $d) {
                throw new Exception('CPF Inválido');
            }
        }
        return true;
    }

    public static function loadFilesDir(string $dir): array
    {
        $arquivos = [];
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) != false) {
                    if (preg_match('/.gif|.bmp|.png|.jpg|.jpeg/', $file)) {
                        $a = "{$dir}{$file}";
                        array_push($arquivos, $a);
                    }
                }
                closedir($dh);
            }
        }
        return $arquivos;
    }
}
