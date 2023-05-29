    <?php

    require_once('dompdf/autoload.inc.php');
    require_once('class.BancoDeDados.php');

    use Dompdf\Dompdf;

    class GeradorRelatorioPDF {
        private $bancoDeDados;

        public function __construct() {
            $this->bancoDeDados = new BancoDeDados();
        }

        public function gerarRelatorio() {
            $arrayNotas = $this->bancoDeDados->retornaArray('SELECT av.idavaliacao, av.idaluno, av.iddisciplina, av.nota, al.nmAluno, d.dsdisciplina FROM avaliacao av
                LEFT JOIN aluno al ON av.idaluno = al.idaluno
                LEFT JOIN disciplina d ON av.iddisciplina = d.iddisciplina');
            
            $html = '<h1>Relatório de Notas</h1>';
            $html .= '<table>';
            $html .= '<tr><th>ID Avaliação</th><th>ID Aluno</th><th>ID Disciplina</th><th>Nota</th><th>Nome Aluno</th><th>Nome Disciplina</th></tr>';
            
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

            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->set_option('defaultFont', 'Arial');
            $dompdf->render();
            
            $dompdf->stream('relatorio.pdf', ['Attachment' => false]);
        }
    }

    // Exemplo de uso:
    $gerador = new GeradorRelatorioPDF();
    $gerador->gerarRelatorio();



    ?>






