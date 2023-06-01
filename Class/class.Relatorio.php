    <?php

    require_once('dompdf/autoload.inc.php');
    require_once('class.BancoDeDados.php');
    require_once('class.chart.php');

    use Dompdf\Dompdf;
    use Dompdf\Options;

    class GeradorRelatorioPDF {
        private $bancoDeDados;

        public function __construct() {
            $this->bancoDeDados = new BancoDeDados();
        }

        public function gerarRelatorio() {
            if (!isset($_POST['idaluno'])) {
                echo '<script>alert("Aluno não selecionado!")</script>';
                echo '<script> window.location.href = "../pageRelatorio.php"; </script>';
            }
            $idalunoSelecionado = $_POST['idaluno'];
            $arrayNotas = $this->bancoDeDados->retornaArray('SELECT av.idavaliacao, av.idaluno, av.iddisciplina, av.nota, al.nmAluno, d.dsdisciplina FROM avaliacao av
                LEFT JOIN aluno al ON av.idaluno = al.idaluno
                LEFT JOIN disciplina d ON av.iddisciplina = d.iddisciplina
                WHERE av.idaluno =' . $idalunoSelecionado);
            if(empty($arrayNotas)){
                echo '<script>alert("Sem Notas!")</script>';
                echo '<script> window.location.href = "../pageRelatorio.php"; </script>';
            }
            else{
            
            $html = '<html><head>
            <title>Pdf do Relatório</title>
            <style>
            *{
                font-family: Arial, Helvetica, sans-serif;
            }
              h1,h2{
                text-align: center;
                margin-bottom: 2rem;
              }
              table {
                margin: 2px auto;
                border: 2px solid #555555;
                border-collapse: collapse;
              }
              th,
              td {
                padding: 10px 10px;
                text-align: left;
              }
              
              th {
                background-color: #ccc;
              }
              
              td {
                background-color: #e6e6e6;
              }

                    </style></head><body>';
            $html .= '<div style="width:250px height:250px"><img src="../images/logounidombosco.png"></div>';
            $html .= '<h1>Relatório de Notas</h1>';
            $html .= '<table>';
            $html .= '<tr><th>Código Avaliação</th><th>Código Aluno</th><th>Código Disciplina</th><th>Nota</th><th>Nome do Aluno</th><th>Nome da Disciplina</th></tr>';
            
            foreach ($arrayNotas as $nota) {
                $html .= '<tr>';
                $html .= '<td>'.$nota['idavaliacao'].'</td>';
                $html .= '<td>'.$nota['idaluno'].'</td>';
                $html .= '<td>'.$nota['iddisciplina'].'</td>';
                $html .= '<td>'.$nota['nota'].'</td>';
                $html .= '<td>'.$nota['nmAluno'].'</td>';
                $html .= '<td>'.$nota['dsdisciplina'].'</td>';
                $html .= '</tr>';
            }
            
            $html .= '</table>';
            $html .= '<h2>Gráfico das Notas</h2>';
            $chart = new Chart();
            $html .= $chart->criar($arrayNotas);
 
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->render();
            
            $dompdf->stream('relatorio.pdf', ['Attachment' => false]);
        }
    }
}

    // Exemplo de uso:
    $gerador = new GeradorRelatorioPDF();
    $gerador->gerarRelatorio();



    ?>






