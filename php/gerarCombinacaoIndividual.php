<?php
    require_once "../classes/tabelaIndividualDAO.php";

    $combinacoes = [];

    for($i=1;$i<=4;$i++){
        $combinacao_cons = $i;

        for($j=1;$j<=4;$j++){
    
            $combinacao_prob = $combinacao_cons.$j;
    
            for($x=1;$x<=3;$x++){
                $combinacao_cons_ref = $combinacao_prob.$x;
                
                for($y=1;$y<=4;$y++){
                    $combinacao_prob_ref = $combinacao_cons_ref.$y;
                    array_push($combinacoes,$combinacao_prob_ref);
                    $combinacao_prob_ref = "";
                }
                $combinacao_cons_ref = "";
            }
            $combinacao_prob ="";
        }
    }

    $conn = new PDO("mysql:host=localhost;dbname=safest_v1", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /* linha de captura erro  */
    tabelaIndividualDAO::setConnection($conn);
    $tabelaIndividualDAO = new tabelaIndividualDAO();

    for($i=0;$i<count($combinacoes);$i++){

        if($combinacoes[$i] == "1111" || $combinacoes[$i] == "1112" ||$combinacoes[$i] == "1113" ||$combinacoes[$i] == "1114" ||$combinacoes[$i] == "1121" 
        ||$combinacoes[$i] == "1122" ||$combinacoes[$i] == "1123" ||$combinacoes[$i] == "1124" ||$combinacoes[$i] == "1113" ||$combinacoes[$i] == "1132" 
        ||$combinacoes[$i] == "1133" || $combinacoes[$i] == "2212" || $combinacoes[$i] == "2213" || $combinacoes[$i] == "2214" || $combinacoes[$i] == "2222"
        || $combinacoes[$i] == "2223" || $combinacoes[$i] == "2224" || $combinacoes[$i] == "2313" || $combinacoes[$i] == "2314" || $combinacoes[$i] == "2322"
        || $combinacoes[$i] == "2323" || $combinacoes[$i] == "2324" || $combinacoes[$i] == "2332" || $combinacoes[$i] == "2334" || $combinacoes[$i] == "2414"
        || $combinacoes[$i] == "2422" || $combinacoes[$i] == "2423" || $combinacoes[$i] == "2424" || $combinacoes[$i] == "2432" || $combinacoes[$i] == "2433"
        || $combinacoes[$i] == "3222" || $combinacoes[$i] == "3223" || $combinacoes[$i] == "3224" || $combinacoes[$i] == "3212" || $combinacoes[$i] == "3213"
        || $combinacoes[$i] == "3323" || $combinacoes[$i] == "3324" || $combinacoes[$i] == "3312" || $combinacoes[$i] == "3313" || $combinacoes[$i] == "3424"
        || $combinacoes[$i] == "3412" || $combinacoes[$i] == "3413" || $combinacoes[$i] == "4212" || $combinacoes[$i] == "4213" || $combinacoes[$i] == "4313"){
            $tabela_individual = new TabelaIndividual();
            $tabela_individual->setCombinacao($combinacoes[$i]);
            $tabela_individual->setConclusao("Nenhum");
            $tabela_individual->setAbreviacao("N");
            $tabelaIndividualDAO->salvar($tabela_individual);
        }
       else if($combinacoes[$i] == "2211" || $combinacoes[$i] == "2221" || $combinacoes[$i] == "2231" || $combinacoes[$i] == "2311" || $combinacoes[$i] == "2312"
        || $combinacoes[$i] == "2321" || $combinacoes[$i] == "2331" || $combinacoes[$i] == "2413" || $combinacoes[$i] == "3214" ){
        $tabela_individual = new TabelaIndividual();
        $tabela_individual->setCombinacao($combinacoes[$i]);
        $tabela_individual->setConclusao("Pequeno");
        $tabela_individual->setAbreviacao("P");
        $tabelaIndividualDAO->salvar($tabela_individual);
      }
      else if($combinacoes[$i] == "2411" || $combinacoes[$i] == "2412" || $combinacoes[$i] == "2421" || $combinacoes[$i] == "2431" || $combinacoes[$i] == "3211"
      || $combinacoes[$i] == "3212" || $combinacoes[$i] == "3213" || $combinacoes[$i] == "3221" || $combinacoes[$i] == "3231" || $combinacoes[$i] == "3311"
      || $combinacoes[$i] == "3312" || $combinacoes[$i] == "3313" || $combinacoes[$i] == "3314" || $combinacoes[$i] == "3321" || $combinacoes[$i] == "3322" 
      || $combinacoes[$i] == "3331" || $combinacoes[$i] == "3412" || $combinacoes[$i] == "3413" || $combinacoes[$i] == "3414" || $combinacoes[$i] == "3422"
      || $combinacoes[$i] == "3423" || $combinacoes[$i] == "4212" || $combinacoes[$i] == "4213" || $combinacoes[$i] == "4214" || $combinacoes[$i] == "4222"
      || $combinacoes[$i] == "4223" || $combinacoes[$i] == "4224" || $combinacoes[$i] == "4324" || $combinacoes[$i] == "4332" ){
        $tabela_individual = new TabelaIndividual();
        $tabela_individual->setCombinacao($combinacoes[$i]);
        $tabela_individual->setConclusao("Moderado");
        $tabela_individual->setAbreviacao("M");
        $tabelaIndividualDAO->salvar($tabela_individual);
      }
      else if($combinacoes[$i] == "3411" || $combinacoes[$i] == "3421" || $combinacoes[$i] == "3431" || $combinacoes[$i] == "4211" || $combinacoes[$i] == "4221"  
      || $combinacoes[$i] == "4231" || $combinacoes[$i] == "4312" || $combinacoes[$i] == "4313" || $combinacoes[$i] == "4314" || $combinacoes[$i] == "4322"
      || $combinacoes[$i] == "4323" || $combinacoes[$i] == "4413" || $combinacoes[$i] == "4414" || $combinacoes[$i] == "4422" || $combinacoes[$i] == "4423"
      || $combinacoes[$i] == "4424" || $combinacoes[$i] == "4432" || $combinacoes[$i] == "4434"){
       $tabela_individual = new TabelaIndividual();
       $tabela_individual->setCombinacao($combinacoes[$i]);
       $tabela_individual->setConclusao("Substancial");
       $tabela_individual->setAbreviacao("S");
       $tabelaIndividualDAO->salvar($tabela_individual);
    }
    else if($combinacoes[$i] == "4311" || $combinacoes[$i] == "4321" || $combinacoes[$i] == "4331" || $combinacoes[$i] == "4411" || $combinacoes[$i] == "4412"
    || $combinacoes[$i] == "4421" || $combinacoes[$i] == "4431"){
       $tabela_individual = new TabelaIndividual();
       $tabela_individual->setCombinacao($combinacoes[$i]);
       $tabela_individual->setConclusao("Extremo");
       $tabela_individual->setAbreviacao("E");
       $tabelaIndividualDAO->salvar($tabela_individual);
    }
  
    }
    var_dump($combinacoes);
?>