<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Voici la page admin.</h1>
            
               <!-- <?php        
               setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
               ?>
               <select id="selectday" name="selectday" tabindex="13">
               <option value="0" selected disabled>choisir la date</option>
                    <?php
                        // $IncludeToday = date("G") < 17;
                        // for($i=($IncludeToday?0:1);$i<=7;$i++) {
                        // $TargetDate = strftime(strtotime(date("Y-m-d") . " +{$i} day"));
                        // print "<option value=\"" . date("Y-m-d", $TargetDate) . "\">" . strftime("%A %d %B %G", $TargetDate) . "</option>\n";
                        // }
                    ?>
               </select> -->
            </div>
            <div class="col-12">
            <h1> Reservtions : </h1>
            <?php
                // $today;

                $sql_request = "SELECT * FROM reservation ORDER BY date DESC LIMIT 30 ";
                $exec = $conn->prepare($sql_request); 
                $exec->execute();
                while( $donnees = $exec->fetch() )
                
                    {
	                    echo '<p> <strong>'. 'nom :'.$donnees['usernom'].'</strong>'.' '. 'nombre:'.' ' .$donnees['nombre_resa'].'<br>creneau :'.' ' . $donnees['creneaux'] .'h'.' '.  $donnees['date'] . '</p>';
                    }
            ?>
            
            </div>
        </div>
    </div>
    
</main>