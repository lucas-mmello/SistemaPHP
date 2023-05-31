<?php

class Chart{
  public function criar($array)
  {
    $notas = [0];
    $disciplinas = ['Disciplinas'];
    foreach ($array as $a){
      array_push($notas, $a['nota']);
      array_push($disciplinas, $a['dsdisciplina']);
    }
    $chartData = [
      "type" => 'bar',
      "data" => [
        "labels" => $disciplinas,
        "datasets" => [
          [
            "label" => "Notas", 
            "data" => $notas,
            "backgroundColor" => ['rgba(0, 255, 255, 0.7)'],
            "barThickness"=> 30,
            "maxBarThickness"=> 50,
          ], 
        ],
      ],
      "options" => [
        "responsive" => true,
        "plugins" => [
          "legend" => [
            "position" => 'top',
          ],
          "title" => [
            "display" => true,
            "text" => 'Chart.js Bar Chart'
          ]
        ],
        "scales" => [
          "y" => [
            // "beginAtZero" => true,
            "ticks" => [
              "min" => 0,
              "max" => 10,
            ]
          ]
        ]
      ]
    ]; 
    $chartData = json_encode($chartData);
    $chartURL = "https://quickchart.io/chart?&c=".urlencode($chartData);
    $chartData = file_get_contents($chartURL); 
    $chart = 'data:image/png;base64, '.base64_encode($chartData);
    return '<div style="margin: 15px 0;text-align: center; "><img style="width:500px;" src="' .$chart . '"></div>';
  }
}
