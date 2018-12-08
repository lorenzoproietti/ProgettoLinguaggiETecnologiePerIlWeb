<!DOCTYPE html>
<html>
    <title>Flights</title>
    <head>
        <style>
                .table_price {
                    border-collapse: collapse;
                    border-left: 3px solid #F79361;
                    border-right: 3px solid #F79361;
                    border-bottom: 3px solid #F79361;
                    font-family: "Lucida Grande", sans-serif;
                }
                .table_price caption {
                    background: #F79361; 
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    padding: 10px;
                    box-shadow: 0 2px  4px 0 rgba(0,0,0,.3);
                    color: white;
                    font-family: "Roboto Slab",serif;
                    font-style: normal;
                    font-size: 26px;
                    text-align: center;
                    margin: 0;
                }
                .table_price td, .table_price th {
                    padding: 10px;
                }
                .table_price th {
                    text-align: left;
                    font-size: 18px;
                }
                .table_price tr:nth-child(2n) {
                    background: #E5E5E5;
                }
                .table_price td:last-of-type {
                    text-align: center;
                }
                .table_price a {
                    display: inline-block;
                    padding: 5px 10px;
                    background: #F79361;
                    box-shadow: 2px 2px 0 0 #a22800;
                    position: relative;
                }
                .table_price a:hover {
                    box-shadow: none;
                    top: 2px;
                    left: 2px;
                }
        </style>
    </head>
    <body>
        <?php
                $dbconn = pg_connect("host=localhost port=5432 dbname=ProgettoLTW user=postgres password=Lulic71.") or die('Could not connect: '.pg_last_error());
                if(!(isset($_POST['Check']))) {
                    header("Location: ../HomePageProva/index.html");
                }
                else {
                    $departureCity = $_POST['dC'];
                    $departureDate = $_POST['dD'];
                    $returnDate = $_POST['rD'];
                    $continentalArea = $_POST['cA'];
                    $temp1 = $_POST['t1'];
                    $temp2 = $_POST['t2'];
                    $q1 = "select v1.codice as codiceAereoPartenza, v1.compagnia as compagniaAereoPartenza, v1.partenza as cittaPartenzaAereoPartenza, v1.arrivo as cittaArrivoAereoArrivo, v1.giornopartenza as giornoPartenzaAereoPartenza, v1.giornoarrivo as giornoArrivoAereoPartenza, CAST(v1.prezzo AS int) as prezzoAndata, v2.codice as codiceAereoRitorno, v2.compagnia as compagniaAereoRitorno, v2.partenza as cittaPartenzaAereoRitorno, v2.arrivo as cittaArrivoAereoRitorno, v2.giornopartenza as giornoPartenzaAereoRitorno, v2.giornoarrivo as giornoArrivoAereoArrivo, CAST(v2.prezzo AS int) as prezzoRitorno
                           from voli v1 join citta on v1.arrivo = nome join voli v2 on v2.partenza = v1.arrivo and v2.arrivo = v1.partenza
                           where v1.partenza = '$departureCity' and continente = '$continentalArea'  and v1.giornopartenza = '$departureDate' and $temp1 <= all(select tem
                                                                                                                                                                from meteo
                                                                                                                                                                where citta = v1.arrivo and giorno >= v1.giornoPartenza and giorno <= v1.giornoArrivo)
                           and $temp2 >= all(select tem
                           from meteo
                           where citta = v1.arrivo and giorno >= v1.giornoPartenza and giorno <= v1.giornoArrivo) and v2.giornoArrivo = '$returnDate'";
                    $result = pg_query($q1) or die('Query failed: ' .pg_last_error());
                    echo "<table class=\"table_price\">
                            <caption>Flights Found</caption>
                            <tr>
                                <th>Departure Plane Code</th>
                                <th>Departure Airline</th>
                                <th>Departure City</th>
                                <th>Arrival City</th>
                                <th>Departure Date</th>
                                <th>Arrival Date</th>
                                <th>Price</th>
                                <th>Return Plane Code</th>
                                <th>Return Airline</th>
                                <th>Departure City</th>
                                <th>Arrival City</th>
                                <th>Departure Date</th>
                                <th>Arrival Date</th>
                                <th colspan=\"2\">Price</th>
                            </tr>";
                    while($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                        echo "<tr>\n";
                        foreach($line as $col_value) {
                            echo "<td>$col_value</td>";
                        }
                        echo "<td><a href=\"Pagamento/Pagamento.html\">Select</a></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                    pg_free_result($result);
                    pg_close($dbconn);
                }
        ?>
    </body>
</html>

