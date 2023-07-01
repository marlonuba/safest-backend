<?php
    require_once "../classes/tabelaColetivaDAO.php";

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
    tabelaColetivaDAO::setConnection($conn);
    $tabelaColetivaDAO = new tabelaColetivaDAO();

    for($i=0;$i<count($combinacoes);$i++){

        if($combinacoes[$i] == "1111" || $combinacoes[$i] == "1112" ||$combinacoes[$i] == "1113" ||$combinacoes[$i] == "1114" ||$combinacoes[$i] == "1121" 
        ||$combinacoes[$i] == "1122" ||$combinacoes[$i] == "1123" ||$combinacoes[$i] == "1124" ||$combinacoes[$i] == "1131" ||$combinacoes[$i] == "1132" 
        ||$combinacoes[$i] == "1133" || $combinacoes[$i] == "2212" || $combinacoes[$i] == "2213" || $combinacoes[$i] == "2214" || $combinacoes[$i] == "2222"
        || $combinacoes[$i] == "2223" || $combinacoes[$i] == "2224" || $combinacoes[$i] == "2232" || $combinacoes[$i] == "2233" || $combinacoes[$i] == "2313"
        || $combinacoes[$i] == "2314" || $combinacoes[$i] == "2322" || $combinacoes[$i] == "2323" || $combinacoes[$i] == "2324" || $combinacoes[$i] == "2332"
        || $combinacoes[$i] == "2333" || $combinacoes[$i] == "2414" || $combinacoes[$i] == "2422" || $combinacoes[$i] == "2423" || $combinacoes[$i] == "2424"
        || $combinacoes[$i] == "2432" || $combinacoes[$i] == "2433" || $combinacoes[$i] == "3222" || $combinacoes[$i] == "3223" || $combinacoes[$i] == "3224"
        || $combinacoes[$i] == "3232" || $combinacoes[$i] == "3233" || $combinacoes[$i] == "3323" || $combinacoes[$i] == "3324" || $combinacoes[$i] == "3332"
        || $combinacoes[$i] == "3333" || $combinacoes[$i] == "3424" || $combinacoes[$i] == "3432" || $combinacoes[$i] == "3433" || $combinacoes[$i] == "4232" || $combinacoes[$i] == "4233"|| $combinacoes[$i] == "4333" ){
            $tabela_coletiva = new tabelaColetiva();
            $tabela_coletiva->setCombinacao($combinacoes[$i]);
            $tabela_coletiva->setConclusao("Nenhum");
            $tabela_coletiva->setAbreviacao("N");
            $tabelaColetivaDAO->salvar($tabela_coletiva);
        }
       else if($combinacoes[$i] == "2211" || $combinacoes[$i] == "2221" || $combinacoes[$i] == "2231" || $combinacoes[$i] == "2311" || $combinacoes[$i] == "2312"
        || $combinacoes[$i] == "2321" || $combinacoes[$i] == "2331" || $combinacoes[$i] == "2413" || $combinacoes[$i] == "3214" ){
        $tabela_coletiva = new tabelaColetiva();
        $tabela_coletiva->setCombinacao($combinacoes[$i]);
        $tabela_coletiva->setConclusao("Pequeno");
        $tabela_coletiva->setAbreviacao("P");
        $tabelaColetivaDAO->salvar($tabela_coletiva);
      }
      else if($combinacoes[$i] == "2411" || $combinacoes[$i] == "2412" || $combinacoes[$i] == "2421" || $combinacoes[$i] == "2431" || $combinacoes[$i] == "3212" || $combinacoes[$i] == "3213" || $combinacoes[$i] == "3214" || $combinacoes[$i] == "3322" || $combinacoes[$i] == "3422" || $combinacoes[$i] == "3423" || $combinacoes[$i] == "4224"){
        $tabela_coletiva = new tabelaColetiva();
        $tabela_coletiva->setCombinacao($combinacoes[$i]);
        $tabela_coletiva->setConclusao("Moderado");
        $tabela_coletiva->setAbreviacao("M");
        $tabelaColetivaDAO->salvar($tabela_coletiva);
      }
      else if($combinacoes[$i] == "3331" || $combinacoes[$i] == "3321" || $combinacoes[$i] == "3311" || $combinacoes[$i] == "3312" || $combinacoes[$i] == "3313"  
      || $combinacoes[$i] == "3314" || $combinacoes[$i] == "3431" || $combinacoes[$i] == "3421" || $combinacoes[$i] == "3411" || $combinacoes[$i] == "3412"
      || $combinacoes[$i] == "3413" || $combinacoes[$i] == "3414" || $combinacoes[$i] == "4231" || $combinacoes[$i] == "4232" || $combinacoes[$i] == "4222"
      || $combinacoes[$i] == "4221" || $combinacoes[$i] == "4214" || $combinacoes[$i] == "4213" || $combinacoes[$i] == "4212" || $combinacoes[$i] == "4211"
      || $combinacoes[$i] == "4332" || $combinacoes[$i] == "4324" || $combinacoes[$i] == "4323" || $combinacoes[$i] == "4322" || $combinacoes[$i] == "4314" || $combinacoes[$i] == "4313" || $combinacoes[$i] == "4312"){
       $tabela_coletiva = new tabelaColetiva();
       $tabela_coletiva->setCombinacao($combinacoes[$i]);
       $tabela_coletiva->setConclusao("Substancial");
       $tabela_coletiva->setAbreviacao("S");
       $tabelaColetivaDAO->salvar($tabela_coletiva);
    }
    else if($combinacoes[$i] == "4331" || $combinacoes[$i] == "4321" || $combinacoes[$i] == "4311" || $combinacoes[$i] == "4433" || $combinacoes[$i] == "4432"
    || $combinacoes[$i] == "4431" || $combinacoes[$i] == "4424"
    || $combinacoes[$i] == "4423" || $combinacoes[$i] == "4422" || $combinacoes[$i] == "4421" || $combinacoes[$i] == "4414" || $combinacoes[$i] == "4413" || $combinacoes[$i] == "4412" || $combinacoes[$i] == "4411"){
       $tabela_coletiva = new tabelaColetiva();
       $tabela_coletiva->setCombinacao($combinacoes[$i]);
       $tabela_coletiva->setConclusao("Extremo");
       $tabela_coletiva->setAbreviacao("E");
       $tabelaColetivaDAO->salvar($tabela_coletiva);
    }
  
    }
    var_dump($combinacoes);
?>