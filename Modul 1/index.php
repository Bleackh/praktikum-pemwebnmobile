<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nama Keluarga</title>
    </head>
    <body>
        <h2>Nama-nama dalam Keluarga</h2>
        <?php
            $keluarga[0]="Yudianto";
            $keluarga[1]="Herlina";
            $keluarga[2]="Ahmad Faldhi Yudianto";
            $keluarga[3]="Aldha Ayu Wulandari";

            function jumlah_huruf($kata){
                $split = strlen($kata) -1;
                $jml_huruf = 0;
                for ($x = 0; $x <= $split; $x++) {
                    if ($kata[$x] == " ") {
                        $jml_huruf;
                    } else {
                        $jml_huruf++;
                    }
                }
            echo "<li>Jumlah Huruf : ". $jml_huruf ."</li>";
            }

            function konsonan_vokal($kata){
                $jml_kata = strlen ($kata) -1;
                $huruf_vokal = array ("a","i","u","e","o","A","I","U","E","O");
                $konsonan = 0;
                $vokal = 0;

                for ($x = 0; $x <= $jml_kata; $x++){
                    if(in_array($kata[$x], $huruf_vokal)) {
                        if ($kata == " ") {
                            $konsonan;
                        }else{
                            $konsonan++;
                        }
                    }else {
                        $vokal++; 
                    }
                }
                echo "<li>Jumlah Konsonan : ". $konsonan ."</li>";
                echo "<li>Jumlah Vokal : ". $vokal ."</li>";
            }
           
        ?>
        <ol type="A">
            <li>Ayah
                <ul>
                    <li>Nama : <?php echo $keluarga[0]; ?></li>
                    <li>Jumlah Kata : <?php echo str_word_count($keluarga[0]); ?></li>
                    <?php jumlah_huruf($keluarga[0])?>
                    <li>Kebalikan Nama : <?php echo strrev($keluarga[0]); ?></li>
                    <?php konsonan_vokal($keluarga[0])?>
                </ul>
            </li>
            <li>Ibu
                <ul>
                    <li>Nama : <?php echo $keluarga[1]; ?></li>
                    <li>Jumlah Kata : <?php echo str_word_count($keluarga[1]); ?></li>
                    <?php jumlah_huruf($keluarga[1])?>
                    <li>Kebalikan Nama : <?php echo strrev($keluarga[1]); ?></li>
                    <?php konsonan_vokal($keluarga[1])?>
                </ul>
            </li>
            <li>Anak Pertama
                <ul>
                    <li>Nama : <?php echo $keluarga[2]; ?></li>
                    <li>Jumlah Kata : <?php echo str_word_count($keluarga[2]); ?></li>
                    <?php jumlah_huruf($keluarga[2])?>
                    <li>Kebalikan Nama : <?php echo strrev($keluarga[2]); ?></li>
                    <?php konsonan_vokal($keluarga[2])?>
                </ul>
            </li>
            <li>Anak Kedua
                <ul>
                    <li>Nama : <?php echo $keluarga[3]; ?></li>
                    <li>Jumlah Kata : <?php echo str_word_count($keluarga[3]); ?></li>
                    <?php jumlah_huruf($keluarga[3])?>
                    <li>Kebalikan Nama : <?php echo strrev($keluarga[3]); ?></li>
                    <?php konsonan_vokal($keluarga[3])?>
                </ul>
            </li>
        </ol>
    </body>
</html>